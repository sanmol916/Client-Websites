/* ==========================================================================
   Dekor Home Decor — Global theme JS
   ========================================================================== */
(function () {
  'use strict';

  /* ---- Helpers ---------------------------------------------------------- */
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

  function formatMoney(cents) {
    const format = (window.Shopify && window.Shopify.moneyFormat) || '${{amount}}';
    const value = (cents / 100).toFixed(2);
    return format.replace(/\{\{\s*amount\s*\}\}/, value);
  }

  /* ---- Mobile menu drawer ---------------------------------------------- */
  function initMenuDrawer() {
    const toggle = $('[data-menu-toggle]');
    const drawer = $('[data-menu-drawer]');
    const overlay = $('[data-overlay]');
    if (!toggle || !drawer) return;

    const open = () => { drawer.classList.add('is-open'); overlay && overlay.classList.add('is-open'); document.body.style.overflow = 'hidden'; };
    const close = () => { drawer.classList.remove('is-open'); overlay && overlay.classList.remove('is-open'); document.body.style.overflow = ''; };

    toggle.addEventListener('click', open);
    $$('[data-menu-close]', drawer).forEach((b) => b.addEventListener('click', close));
    overlay && overlay.addEventListener('click', close);
    document.addEventListener('keydown', (e) => e.key === 'Escape' && close());
  }

  /* ---- Cart drawer ------------------------------------------------------ */
  const CartDrawer = {
    el: null,
    init() {
      this.el = $('[data-cart-drawer]');
      const overlay = $('[data-overlay]');
      $$('[data-cart-toggle]').forEach((t) => t.addEventListener('click', (e) => {
        if (this.el) { e.preventDefault(); this.open(); }
      }));
      if (this.el) {
        $$('[data-cart-close]', this.el).forEach((b) => b.addEventListener('click', () => this.close()));
      }
      overlay && overlay.addEventListener('click', () => this.close());
      document.addEventListener('cart:updated', () => this.refresh());
    },
    open() { if (!this.el) return; this.el.classList.add('is-open'); const o = $('[data-overlay]'); o && o.classList.add('is-open'); document.body.style.overflow = 'hidden'; },
    close() { if (!this.el) return; this.el.classList.remove('is-open'); const o = $('[data-overlay]'); o && o.classList.remove('is-open'); document.body.style.overflow = ''; },
    async refresh() {
      try {
        const res = await fetch('/?section_id=cart-drawer');
        const text = await res.text();
        const html = new DOMParser().parseFromString(text, 'text/html');
        const fresh = html.querySelector('[data-cart-drawer-inner]');
        const current = this.el && this.el.querySelector('[data-cart-drawer-inner]');
        if (fresh && current) current.innerHTML = fresh.innerHTML;
      } catch (e) { /* noop */ }
    }
  };

  async function updateCartCount() {
    try {
      const res = await fetch('/cart.js');
      const cart = await res.json();
      $$('[data-cart-count]').forEach((el) => { el.textContent = cart.item_count; el.hidden = cart.item_count === 0; });
    } catch (e) { /* noop */ }
  }

  /* ---- Add to cart (AJAX) ---------------------------------------------- */
  function initAddToCart() {
    document.addEventListener('submit', async (e) => {
      const form = e.target.closest('form[action*="/cart/add"]');
      if (!form || !form.hasAttribute('data-ajax-cart')) return;
      e.preventDefault();
      const btn = form.querySelector('[type="submit"]');
      const original = btn ? btn.textContent : '';
      if (btn) { btn.disabled = true; btn.textContent = '...'; }
      try {
        const res = await fetch('/cart/add.js', {
          method: 'POST',
          headers: { Accept: 'application/json' },
          body: new FormData(form)
        });
        if (!res.ok) throw new Error('add failed');
        await updateCartCount();
        document.dispatchEvent(new CustomEvent('cart:updated'));
        if ($('[data-cart-drawer]')) CartDrawer.open();
      } catch (err) {
        console.error(err);
      } finally {
        if (btn) { btn.disabled = false; btn.textContent = original; }
      }
    });
  }

  /* ---- Cart line item quantity / remove -------------------------------- */
  function initCartActions() {
    document.addEventListener('click', async (e) => {
      const change = e.target.closest('[data-cart-change]');
      if (!change) return;
      e.preventDefault();
      const line = change.getAttribute('data-line');
      const qty = change.getAttribute('data-cart-change');
      try {
        const res = await fetch('/cart/change.js', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
          body: JSON.stringify({ line: parseInt(line, 10), quantity: parseInt(qty, 10) })
        });
        await res.json();
        await updateCartCount();
        document.dispatchEvent(new CustomEvent('cart:updated'));
        if (document.body.classList.contains('template-cart')) window.location.reload();
      } catch (err) { console.error(err); }
    });
  }

  /* ---- Slideshow -------------------------------------------------------- */
  function initSlideshows() {
    $$('[data-slideshow]').forEach((slideshow) => {
      const track = slideshow.querySelector('[data-slideshow-track]');
      const slides = $$('[data-slide]', slideshow);
      const dots = $$('[data-slide-dot]', slideshow);
      if (slides.length <= 1) return;
      let index = 0;
      const autoplay = slideshow.getAttribute('data-autoplay') === 'true';
      const speed = parseInt(slideshow.getAttribute('data-speed') || '6', 10) * 1000;
      let timer;

      const go = (i) => {
        index = (i + slides.length) % slides.length;
        track.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((d, di) => d.classList.toggle('is-active', di === index));
      };
      dots.forEach((d, di) => d.addEventListener('click', () => { go(di); restart(); }));
      const restart = () => { if (!autoplay) return; clearInterval(timer); timer = setInterval(() => go(index + 1), speed); };
      restart();
    });
  }

  /* ---- Product page: variant selection --------------------------------- */
  function initProductForms() {
    $$('[data-product-form]').forEach((container) => {
      const dataEl = container.querySelector('[data-product-json]');
      if (!dataEl) return;
      let product;
      try { product = JSON.parse(dataEl.textContent); } catch (e) { return; }
      const selects = $$('[data-option-selector]', container);
      const idInput = container.querySelector('[data-variant-id]');
      const priceEl = container.querySelector('[data-product-price]');
      const submit = container.querySelector('[type="submit"]');

      const updateVariant = () => {
        const chosen = selects.map((s) => s.value);
        const variant = product.variants.find((v) =>
          v.options.every((opt, i) => opt === chosen[i])
        );
        if (!variant) return;
        if (idInput) idInput.value = variant.id;
        if (priceEl) {
          if (variant.compare_at_price > variant.price) {
            priceEl.innerHTML = `<span class="price__sale">${formatMoney(variant.price)}</span><span class="price__compare">${formatMoney(variant.compare_at_price)}</span>`;
          } else {
            priceEl.innerHTML = `<span>${formatMoney(variant.price)}</span>`;
          }
        }
        if (submit) {
          submit.disabled = !variant.available;
          submit.textContent = variant.available ? submit.getAttribute('data-add-label') : submit.getAttribute('data-soldout-label');
        }
        const url = new URL(window.location);
        url.searchParams.set('variant', variant.id);
        window.history.replaceState({}, '', url);
      };
      selects.forEach((s) => s.addEventListener('change', updateVariant));
    });
  }

  /* ---- Product gallery thumbs ------------------------------------------ */
  function initGallery() {
    $$('[data-gallery]').forEach((gallery) => {
      const main = gallery.querySelector('[data-gallery-main]');
      $$('[data-gallery-thumb]', gallery).forEach((thumb) => {
        thumb.addEventListener('click', () => {
          if (main) { main.src = thumb.getAttribute('data-full') || thumb.src; }
        });
      });
    });
  }

  /* ---- Quantity selector ------------------------------------------------ */
  function initQuantity() {
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-qty-change]');
      if (!btn) return;
      const wrap = btn.closest('.quantity-selector');
      const input = wrap && wrap.querySelector('input');
      if (!input) return;
      let val = parseInt(input.value, 10) || 1;
      val += parseInt(btn.getAttribute('data-qty-change'), 10);
      input.value = Math.max(1, val);
    });
  }

  /* ---- Scroll reveal ---------------------------------------------------- */
  function initReveal() {
    const els = $$('.reveal');
    if (!('IntersectionObserver' in window) || !els.length) { els.forEach((e) => e.classList.add('is-visible')); return; }
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) { entry.target.classList.add('is-visible'); io.unobserve(entry.target); }
      });
    }, { threshold: 0.12 });
    els.forEach((e) => io.observe(e));
  }

  /* ---- Predictive search stub ------------------------------------------ */
  function initSearchToggle() {
    const toggle = $('[data-search-toggle]');
    const modal = $('[data-search-modal]');
    if (!toggle || !modal) return;
    toggle.addEventListener('click', (e) => { e.preventDefault(); modal.classList.toggle('is-open'); const inp = modal.querySelector('input[type="search"]'); inp && inp.focus(); });
    $$('[data-search-close]', modal).forEach((b) => b.addEventListener('click', () => modal.classList.remove('is-open')));
  }

  /* ---- Init ------------------------------------------------------------- */
  document.addEventListener('DOMContentLoaded', () => {
    initMenuDrawer();
    CartDrawer.init();
    initAddToCart();
    initCartActions();
    initSlideshows();
    initProductForms();
    initGallery();
    initQuantity();
    initReveal();
    initSearchToggle();
    updateCartCount();
  });
})();
