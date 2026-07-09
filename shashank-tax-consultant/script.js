/* ============================================================
   Shashank Tax Consultant — Interactions
   ============================================================ */
(function () {
    'use strict';

    const WHATSAPP = '919415906648';

    /* ---- Sticky header shadow ---- */
    const header = document.getElementById('header');
    if (header) {
        const onScroll = () => {
            if (window.scrollY > 20) header.classList.add('scrolled');
            else header.classList.remove('scrolled');
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* ---- Mobile navigation ---- */
    const navToggle = document.getElementById('navToggle');
    const nav = document.getElementById('nav');
    if (navToggle && nav) {
        const closeNav = () => { nav.classList.remove('open'); navToggle.classList.remove('active'); document.body.style.overflow = ''; };
        navToggle.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            navToggle.classList.toggle('active', open);
            document.body.style.overflow = open ? 'hidden' : '';
        });
        nav.querySelectorAll('a').forEach((a) => a.addEventListener('click', closeNav));
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeNav(); });
    }

    /* ---- Floating action buttons (speed dial) ---- */
    const fab = document.getElementById('fab');
    const fabToggle = document.getElementById('fabToggle');
    if (fab && fabToggle) {
        const toggleFab = (force) => {
            const open = fab.classList.toggle('open', force);
            fabToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        };
        // Open by default on larger screens; collapsed on mobile so it never covers content.
        toggleFab(window.innerWidth > 768);
        fabToggle.addEventListener('click', () => toggleFab());
        // Collapse the menu after tapping an action on mobile.
        fab.querySelectorAll('.fab__btn').forEach((b) => b.addEventListener('click', () => {
            if (window.innerWidth <= 768) toggleFab(false);
        }));
    }

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

    /* ---- Slot booking widget (booking.html) ---- */
    const dateGrid = document.getElementById('dateGrid');
    const slotGrid = document.getElementById('slotGrid');
    if (dateGrid && slotGrid) {
        const DOW = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const MON = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const TIMES = ['10:00 AM', '11:00 AM', '12:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM', '06:00 PM'];

        const state = { date: null, dateLabel: '', time: null };
        const slotText = document.getElementById('selectedSlotText');

        const updateSummary = () => {
            if (state.dateLabel && state.time) {
                slotText.innerHTML = '<strong>' + state.dateLabel + '</strong> at <strong>' + state.time + '</strong>';
            } else if (state.dateLabel) {
                slotText.innerHTML = '<strong>' + state.dateLabel + '</strong> — please pick a time';
            } else {
                slotText.textContent = 'No slot selected yet';
            }
        };

        // Build the next 12 available days (skipping Sundays).
        const today = new Date();
        let added = 0, offset = 0;
        while (added < 12 && offset < 30) {
            const d = new Date(today);
            d.setDate(today.getDate() + offset);
            offset++;
            if (d.getDay() === 0) continue; // skip Sunday
            const label = DOW[d.getDay()] + ', ' + d.getDate() + ' ' + MON[d.getMonth()];
            const chip = document.createElement('button');
            chip.type = 'button';
            chip.className = 'date-chip';
            chip.dataset.label = label;
            chip.innerHTML =
                '<span class="date-chip__dow">' + DOW[d.getDay()] + '</span>' +
                '<span class="date-chip__day">' + d.getDate() + '</span>' +
                '<span class="date-chip__mon">' + MON[d.getMonth()] + '</span>';
            chip.addEventListener('click', () => {
                dateGrid.querySelectorAll('.date-chip').forEach((c) => c.classList.remove('selected'));
                chip.classList.add('selected');
                state.date = d;
                state.dateLabel = label;
                updateSummary();
            });
            dateGrid.appendChild(chip);
            added++;
        }

        // Time slots
        TIMES.forEach((t) => {
            const chip = document.createElement('button');
            chip.type = 'button';
            chip.className = 'slot-chip';
            chip.textContent = t;
            chip.addEventListener('click', () => {
                slotGrid.querySelectorAll('.slot-chip').forEach((c) => c.classList.remove('selected'));
                chip.classList.add('selected');
                state.time = t;
                updateSummary();
            });
            slotGrid.appendChild(chip);
        });

        const bookForm = document.getElementById('bookingForm');
        const bookNote = document.getElementById('bookNote');
        const emailBtn = document.getElementById('bookEmailBtn');

        const showNote = (msg, ok) => {
            bookNote.hidden = false;
            bookNote.className = 'form-note' + (ok ? ' success' : '');
            bookNote.style.background = ok ? '' : 'rgba(214,69,69,0.15)';
            bookNote.style.color = ok ? '' : '#ffb4b4';
            bookNote.textContent = msg;
        };

        const collect = () => {
            const name = document.getElementById('bName').value.trim();
            const phone = document.getElementById('bPhone').value.trim();
            const topic = document.getElementById('bTopic').value.trim();
            if (!name || !phone) { showNote('Please enter your name and phone number.', false); return null; }
            if (!state.dateLabel || !state.time) { showNote('Please select a date and time slot above.', false); return null; }
            return { name, phone, topic };
        };

        const buildMessage = (d) =>
            'New consultation booking request:\n\n' +
            'Name: ' + d.name + '\n' +
            'Phone: ' + d.phone + '\n' +
            'Preferred slot: ' + state.dateLabel + ' at ' + state.time + '\n' +
            'Topic: ' + (d.topic || 'General consultation');

        if (bookForm) {
            bookForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const d = collect();
                if (!d) return;
                showNote('Opening WhatsApp with your booking details…', true);
                window.open('https://wa.me/' + WHATSAPP + '?text=' + encodeURIComponent(buildMessage(d)), '_blank');
            });
        }
        if (emailBtn) {
            emailBtn.addEventListener('click', () => {
                const d = collect();
                if (!d) return;
                const subject = encodeURIComponent('Consultation booking — ' + d.name + ' (' + state.dateLabel + ', ' + state.time + ')');
                showNote('Opening your email client with your booking details…', true);
                window.location.href = 'mailto:cmashashanksoni@zohomail.in?subject=' + subject + '&body=' + encodeURIComponent(buildMessage(d));
            });
        }
    }

    /* ---- Footer year ---- */
    const yearEl = document.getElementById('year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
})();
