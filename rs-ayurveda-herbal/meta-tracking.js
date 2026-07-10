/* ============================================================
   Meta Pixel (browser) + Conversions API (server) tracking
   - Fires the browser Pixel event AND a server CAPI event with the
     SAME event_id, so Meta de-duplicates them (no double counting).
   - Pixel ID comes from /api/meta-config (env var META_PIXEL_ID).
   - The secret Access Token stays server-side only.
   Events: ViewContent, AddToCart, InitiateCheckout, Purchase, Contact
   ============================================================ */
(function () {
  var CONFIG_URL = "/api/meta-config";
  var CAPI_URL = "/api/capi";

  function getCookie(name) {
    var m = document.cookie.match("(^|;)\\s*" + name + "\\s*=\\s*([^;]+)");
    return m ? m.pop() : "";
  }

  // Build fbc from a fbclid URL param if the _fbc cookie is not set yet
  function fbcValue() {
    var cookie = getCookie("_fbc");
    if (cookie) return cookie;
    try {
      var fbclid = new URLSearchParams(location.search).get("fbclid");
      if (fbclid) return "fb.1." + Date.now() + "." + fbclid;
    } catch (e) {}
    return "";
  }

  function newEventId(name) {
    return (name || "evt") + "." + Date.now() + "." + Math.random().toString(36).slice(2, 10);
  }

  // Public API: window.rsTrack('Purchase', { userData:{...}, customData:{...} })
  window.rsTrack = function (eventName, opts) {
    opts = opts || {};
    var eventId = newEventId(eventName);
    var custom = opts.customData || {};

    // 1) Browser Pixel (with eventID for dedup)
    try {
      if (window.fbq) window.fbq("track", eventName, custom, { eventID: eventId });
    } catch (e) {}

    // 2) Server Conversions API (same event_id)
    try {
      var payload = {
        eventName: eventName,
        eventId: eventId,
        eventSourceUrl: location.href,
        userData: opts.userData || {},
        customData: custom,
        fbp: getCookie("_fbp"),
        fbc: fbcValue(),
        userAgent: navigator.userAgent,
      };
      fetch(CAPI_URL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
        keepalive: true,
      }).catch(function () {});
    } catch (e) {}

    return eventId;
  };

  // Load the Meta Pixel base code with the configured Pixel ID
  function loadPixel(pixelId) {
    if (!pixelId) return;
    /* eslint-disable */
    !(function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = "2.0";
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s);
    })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
    /* eslint-enable */
    window.fbq("init", pixelId);
    window.fbq("track", "PageView");
  }

  // Contact event on WhatsApp / phone-call clicks (works across all pages)
  document.addEventListener(
    "click",
    function (e) {
      var a = e.target && e.target.closest ? e.target.closest("a") : null;
      if (!a) return;
      var href = a.getAttribute("href") || "";
      if (href.indexOf("wa.me") > -1 || href.indexOf("whatsapp") > -1 || href.indexOf("tel:") === 0) {
        window.rsTrack("Contact", {
          customData: { method: href.indexOf("tel:") === 0 ? "phone" : "whatsapp" },
        });
      }
    },
    true
  );

  // Init: fetch Pixel ID, load pixel, fire ViewContent
  fetch(CONFIG_URL)
    .then(function (r) { return r.json(); })
    .then(function (cfg) {
      loadPixel(cfg && cfg.pixelId);
      window.rsTrack("ViewContent", { customData: { content_name: document.title } });
    })
    .catch(function () {
      // still send server-side ViewContent (server no-ops if unconfigured)
      window.rsTrack("ViewContent", { customData: { content_name: document.title } });
    });
})();
