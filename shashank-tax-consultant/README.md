# Shashank Tax Consultant — Demo Website

A premium, fully responsive single-page website built for **Shashank Tax Consultant**, led by **CMA Shashank Soni (ACMA)**, Telibagh, Lucknow.

## ✨ Highlights to show the client
- Professional finance aesthetic (deep navy + gold) with modern typography (Sora + Plus Jakarta Sans)
- Animated hero with floating trust badges and image placeholder
- Sticky glass navigation + mobile slide-in menu
- Animated stat counters (years, clients, compliance rate)
- Scroll-reveal animations throughout
- 9 detailed service cards (GST, Income Tax, Cost Audit, Accounting, Company/LLP, TDS/TCS, MSME & Startup, Payroll, Advisory)
- Why-Us, How-It-Works (dark section) and testimonials sections
- Contact form (opens email to the consultant) + full address, click-to-call & social links
- Floating call button
- SEO meta tags + social share tags
- 100% responsive (desktop, tablet, mobile)

## 🖼️ How to add the client's images
All images live in the `assets/` folder. Replace the labeled placeholders in `index.html` with real files — the layout stays intact until you do.

| Placeholder | Where it shows | Suggested size |
|-------------|----------------|----------------|
| `logo.svg` / `logo.png` | Header + footer logo (currently an "STC" mark) | 200×60 (transparent) |
| `hero.jpg` | Hero image (right side) | 800×900 (portrait) |
| `shashank.jpg` | About portrait | 700×800 |
| `client-1.jpg` … | Hero avatars + testimonials | 120×120 (square) |
| `favicon.svg` | Browser tab icon (included) | 64×64 |

To swap the logo, replace the `brand__logo` span with `<img src="assets/logo.svg" alt="Shashank Tax Consultant">`.
To swap an image placeholder, replace the `<div class="img-ph ...">` block with an `<img>` tag.

## 📝 Quick edits
- **Phone number:** search for `9415906648` in `index.html`
- **Email:** search for `cmashashanksoni@zohomail.in`
- **Address:** search for `Babu Vihar` in `index.html`
- **Social links:** Instagram & LinkedIn URLs in the top bar, contact and footer sections
- **Services & content:** in the Services section of `index.html`
- **Colors:** edit the `:root` variables at the top of `styles.css`

## 🚀 Run it
Just open `index.html` in any browser — no build step required.
