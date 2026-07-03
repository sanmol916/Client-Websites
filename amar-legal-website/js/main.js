/* Amar Legal — site interactions */
(function () {
  "use strict";

  // Mobile nav toggle
  var toggle = document.querySelector(".nav__toggle");
  var links = document.querySelector(".nav__links");
  if (toggle && links) {
    toggle.addEventListener("click", function () {
      var open = links.classList.toggle("open");
      toggle.classList.toggle("open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
    links.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        links.classList.remove("open");
        toggle.classList.remove("open");
      });
    });
  }

  // Header shadow on scroll
  var header = document.querySelector(".site-header");
  if (header) {
    var onScroll = function () {
      header.classList.toggle("scrolled", window.scrollY > 10);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  // Scroll reveal
  var reveal = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && reveal.length) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -60px 0px" }
    );
    reveal.forEach(function (el, i) {
      el.style.transitionDelay = (i % 4) * 80 + "ms";
      io.observe(el);
    });
  } else {
    reveal.forEach(function (el) { el.classList.add("in"); });
  }

  // Disclaimer modal (Bar Council of India style acknowledgement)
  var modal = document.getElementById("disclaimer");
  if (modal) {
    var KEY = "amarlegal_disclaimer_ack";
    var accept = modal.querySelector("[data-accept]");
    var openModal = function () { modal.classList.add("show"); document.body.style.overflow = "hidden"; };
    var closeModal = function () { modal.classList.remove("show"); document.body.style.overflow = ""; };
    try {
      if (!sessionStorage.getItem(KEY)) { openModal(); }
    } catch (err) { openModal(); }
    if (accept) {
      accept.addEventListener("click", function () {
        try { sessionStorage.setItem(KEY, "1"); } catch (err) {}
        closeModal();
      });
    }
  }

  // Contact form (front-end demo handler)
  var form = document.getElementById("contactForm");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var note = form.querySelector(".form-note");
      if (note) {
        note.textContent = "Thank you for reaching out. Our team will respond within one business day.";
        note.style.color = "#1b7a3d";
      }
      form.reset();
    });
  }

  // Footer year
  var yr = document.getElementById("year");
  if (yr) { yr.textContent = new Date().getFullYear(); }
})();
