/* =========================================================
   RADIANT BEAUTY — Interactions
   ========================================================= */
(function () {
  'use strict';

  var header = document.getElementById('header');
  window.addEventListener('scroll', function () {
    header.classList.toggle('scrolled', window.scrollY > 20);
  });

  var hamburger = document.getElementById('hamburger');
  var nav = document.getElementById('nav');
  hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('active');
    nav.classList.toggle('open');
  });
  nav.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', function () {
      hamburger.classList.remove('active');
      nav.classList.remove('open');
    });
  });

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function (el, i) {
    el.style.transitionDelay = (i % 4) * 0.07 + 's';
    io.observe(el);
  });

  var form = document.getElementById('bookingForm');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var note = document.getElementById('formNote');
      if (note) note.hidden = false;
      form.querySelectorAll('input,select,textarea').forEach(function (f) {
        if (f.type !== 'submit') f.value = '';
      });
      setTimeout(function () { if (note) note.hidden = true; }, 6000);
    });
  }

  var date = document.getElementById('date');
  if (date) date.min = new Date().toISOString().split('T')[0];

  var y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();
})();
