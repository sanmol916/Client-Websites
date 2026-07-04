# R.S Ayurveda Herbal — Product Website

A bold, fully responsive product website for **R.S Ayurveda Herbal — Man's Care**, featuring the **Horse Power Gold Max** range (Oil & Capsules).

Layout and advertising elements are modeled on the arayurveda.shop reference, adapted to a bold **black + red + gold** theme.

## ✨ Highlights to show the client
- Premium **black + red + gold** theme matching the product branding
- **Hero banner** ("Find Your BEST SELF NATURALLY") + breadcrumb, like the reference
- **Product detail layout** with image gallery + thumbnails
- **Two product variants**: Horse Power Gold Max **Oil** and **Capsules**, each with **multiple pack sizes** and live price/discount updates
- **Advertisement / urgency elements**: live-visitor counter, "sold in last 2 hours" badge, discount tags, animated Buy Now
- **"What's Different?"** benefit pills
- **Benefits** and **How To Use** sections with image placeholders (shows the process)
- **FAQ accordion**
- **Full Customer Reviews system**: average score, star-breakdown bars, and a working **"Write a Review"** form (saved in the visitor's browser via localStorage) with seed reviews included
- **No COD / No online payment gateway** — orders are placed via WhatsApp
- Order flow: **Buy Now → order form → WhatsApp confirm button**
  - Form fields: Name, Mobile No., Email, Address, Pin Code (all validated)
  - On submit, a WhatsApp chat opens to **9582771432** pre-filled with the full order (product + selected pack)
- Floating WhatsApp chat button, footer WhatsApp link + **mobile sticky Buy bar**
- Logo & all section image placeholders auto-swap when real images are added
- 100% responsive (desktop, tablet, mobile)

## 🖼️ How to add the client's images
All images live in the `assets/` folder. Drop in files with these exact names and they appear automatically — no code changes needed.

| File | Where it shows |
|------|----------------|
| `logo.png` | Header & footer logo (falls back to text if missing) |
| `hero.png` | Main hero banner image |
| `oil.png` | Horse Power Gold Max Oil product image |
| `capsule.png` | Horse Power Gold Max Capsules product image |
| `gallery-1.png`, `gallery-2.png` | Extra gallery thumbnails |
| `benefit-1.png` … `benefit-3.png` | Benefits section images |
| `step-1.png` … `step-3.png` | "How To Use" process images |

Until real images are added, each spot shows a labeled placeholder so the layout stays intact.

## 📝 Quick edits
- **WhatsApp number:** search for `919582771432` in `script.js`
- **Phone / email:** in the header and footer of `index.html`
- **Prices & product details:** in the Products section of `index.html` (also `data-price` on the Buy Now buttons)
- **Colors:** edit the `:root` variables at the top of `styles.css`

## 🚀 Run it
Just open `index.html` in any browser — no build step required.
