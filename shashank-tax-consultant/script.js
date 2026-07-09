/* ============================================================
   Shashank Tax Consultant — Interactions
   ============================================================ */
(function () {
    'use strict';

    /* ---- Sticky header shadow ---- */
    const header = document.getElementById('header');
    const onScroll = () => {
        if (window.scrollY > 20) header.classList.add('scrolled');
        else header.classList.remove('scrolled');
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---- Mobile navigation ---- */
    const navToggle = document.getElementById('navToggle');
    const nav = document.getElementById('nav');
    const closeNav = () => { nav.classList.remove('open'); navToggle.classList.remove('active'); document.body.style.overflow = ''; };

    navToggle.addEventListener('click', () => {
        const open = nav.classList.toggle('open');
        navToggle.classList.toggle('active', open);
        document.body.style.overflow = open ? 'hidden' : '';
    });
    nav.querySelectorAll('a').forEach((a) => a.addEventListener('click', closeNav));
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeNav(); });

    /* ---- Scroll reveal ---- */
    const revealEls = document.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    // slight stagger for grouped items
                    entry.target.style.transitionDelay = (entry.target.dataset.delay || (i % 4) * 60) + 'ms';
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach((el) => io.observe(el));
    } else {
        revealEls.forEach((el) => el.classList.add('is-visible'));
    }

    /* ---- Animated counters ---- */
    const counters = document.querySelectorAll('.stat__num[data-count]');
    const runCounter = (el) => {
        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.suffix || '';
        const duration = 1600;
        const start = performance.now();
        const step = (now) => {
            const p = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - p, 3); // easeOutCubic
            el.textContent = Math.floor(eased * target) + (p === 1 ? suffix : '');
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = target + suffix;
        };
        requestAnimationFrame(step);
    };
    if ('IntersectionObserver' in window) {
        const cio = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) { runCounter(entry.target); cio.unobserve(entry.target); }
            });
        }, { threshold: 0.5 });
        counters.forEach((c) => cio.observe(c));
    } else {
        counters.forEach((c) => { c.textContent = c.dataset.count + (c.dataset.suffix || ''); });
    }

    /* ---- Contact form (front-end handling) ---- */
    const form = document.getElementById('contactForm');
    const note = document.getElementById('formNote');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = form.name.value.trim();
            const phone = form.phone.value.trim();
            const email = form.email.value.trim();

            if (!name || !phone || !email) {
                note.hidden = false;
                note.className = 'form-note';
                note.style.background = 'rgba(214,69,69,0.12)';
                note.style.color = '#c0392b';
                note.textContent = 'Please fill in your name, phone, and email.';
                return;
            }

            // Compose a mailto fallback so the message reaches the consultant.
            const service = form.service.value || 'General Enquiry';
            const message = form.message.value.trim();
            const subject = encodeURIComponent(`New enquiry: ${service} — ${name}`);
            const body = encodeURIComponent(
                `Name: ${name}\nPhone: ${phone}\nEmail: ${email}\nService: ${service}\n\nMessage:\n${message}`
            );

            note.hidden = false;
            note.className = 'form-note success';
            note.style.background = '';
            note.style.color = '';
            note.textContent = 'Thank you! Opening your email client to send the message…';

            window.location.href = `mailto:cmashashanksoni@zohomail.in?subject=${subject}&body=${body}`;
            form.reset();
        });
    }

    /* ---- Footer year ---- */
    const yearEl = document.getElementById('year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
})();
