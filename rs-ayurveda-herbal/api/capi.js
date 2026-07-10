/**
 * POST /api/capi
 * Meta Conversions API (server-side) forwarder.
 *
 * Reads secrets from Vercel Environment Variables (NEVER hardcoded):
 *   - META_PIXEL_ID   : your Meta Pixel / Dataset ID
 *   - META_CAPI_TOKEN : your Conversions API Access Token
 *
 * Hashes all PII with SHA-256 (Meta requirement). Uses the same event_id
 * that the browser Pixel sends, so Meta de-duplicates server + browser events.
 */
const crypto = require("crypto");

const GRAPH_VERSION = "v21.0";

function sha256(value) {
  if (value === undefined || value === null || value === "") return undefined;
  const normalized = String(value).trim().toLowerCase();
  if (!normalized) return undefined;
  return crypto.createHash("sha256").update(normalized).digest("hex");
}

// Phone: digits only (with country code), then hashed.
function sha256Phone(value) {
  if (!value) return undefined;
  const digits = String(value).replace(/[^0-9]/g, "");
  if (!digits) return undefined;
  return crypto.createHash("sha256").update(digits).digest("hex");
}

// Country: normalize to 2-letter ISO code (e.g. "India" -> "in"), then hash.
function sha256Country(value) {
  if (!value) return undefined;
  let c = String(value).trim().toLowerCase();
  if (c === "india" || c === "bharat" || c === "in") c = "in";
  return crypto.createHash("sha256").update(c).digest("hex");
}

function readBody(req) {
  if (!req.body) return {};
  if (typeof req.body === "string") {
    try { return JSON.parse(req.body); } catch (e) { return {}; }
  }
  return req.body;
}

module.exports = async (req, res) => {
  if (req.method !== "POST") {
    res.status(405).json({ ok: false, error: "Method not allowed" });
    return;
  }

  const PIXEL_ID = process.env.META_PIXEL_ID;
  const TOKEN = process.env.META_CAPI_TOKEN;

  // If not configured yet, fail softly so the site keeps working.
  if (!PIXEL_ID || !TOKEN) {
    res.status(200).json({ ok: false, reason: "not_configured" });
    return;
  }

  try {
    const body = readBody(req);
    const {
      eventName,
      eventId,
      eventSourceUrl,
      userData = {},
      customData = {},
      fbp,
      fbc,
      userAgent,
    } = body;

    if (!eventName) {
      res.status(400).json({ ok: false, error: "eventName required" });
      return;
    }

    const forwarded = (req.headers["x-forwarded-for"] || "").split(",")[0].trim();
    const ip = forwarded || (req.socket && req.socket.remoteAddress) || undefined;
    const ua = userAgent || req.headers["user-agent"] || undefined;

    const user_data = {
      em: userData.email ? [sha256(userData.email)] : undefined,
      ph: userData.phone ? [sha256Phone(userData.phone)] : undefined,
      fn: userData.firstName ? [sha256(userData.firstName)] : undefined,
      ln: userData.lastName ? [sha256(userData.lastName)] : undefined,
      zp: userData.zip ? [sha256(userData.zip)] : undefined,
      ct: userData.city ? [sha256(userData.city)] : undefined,
      st: userData.state ? [sha256(userData.state)] : undefined,
      country: userData.country ? [sha256Country(userData.country)] : undefined,
      client_ip_address: ip,
      client_user_agent: ua,
      fbp: fbp || undefined,
      fbc: fbc || undefined,
    };
    Object.keys(user_data).forEach((k) => user_data[k] === undefined && delete user_data[k]);

    const payload = {
      data: [
        {
          event_name: eventName,
          event_time: Math.floor(Date.now() / 1000),
          event_id: eventId,
          event_source_url: eventSourceUrl,
          action_source: "website",
          user_data,
          custom_data: customData,
        },
      ],
    };

    const url =
      "https://graph.facebook.com/" +
      GRAPH_VERSION +
      "/" +
      PIXEL_ID +
      "/events?access_token=" +
      encodeURIComponent(TOKEN);

    const fbRes = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
    const result = await fbRes.json();

    res.status(200).json({ ok: fbRes.ok, result });
  } catch (e) {
    res.status(200).json({ ok: false, error: String((e && e.message) || e) });
  }
};
