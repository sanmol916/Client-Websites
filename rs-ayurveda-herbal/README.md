# R.S Ayurveda Herbal — Product Website

A bold, fully responsive product website for **R.S Ayurveda Herbal — Man's Care**, featuring the **Horse Power Gold Max** range (Oil & Capsules).

## ✨ Highlights to show the client
- Premium **black + red + gold** theme matching the product branding
- Bold Oswald headings with a striking hero section
- **Two product variants**: Horse Power Gold Max **Oil** (₹699) and **Capsules** (₹899)
- Benefits, "How to Order" steps, and contact sections
- **No COD / No online payment gateway** — orders are placed via WhatsApp
- Order flow: **Buy Now → order form → WhatsApp confirm button**
  - Form fields: Name, Mobile No., Email, Address, Pin Code (all validated)
  - On submit, a WhatsApp chat opens to **9582771432** pre-filled with the full order
- Floating WhatsApp chat button + footer WhatsApp link
- Logo & product image placeholders that auto-swap when real images are added
- 100% responsive (desktop, tablet, mobile)

## 🖼️ How to add the client's images
All images live in the `assets/` folder. Drop in files with these exact names and they appear automatically — no code changes needed.

| File | Where it shows |
|------|----------------|
| `logo.png` | Header & footer logo (falls back to text if missing) |
| `hero.png` | Main hero product image |
| `oil.png` | Horse Power Gold Max Oil product image |
| `capsule.png` | Horse Power Gold Max Capsules product image |

Until real images are added, each spot shows a labeled placeholder so the layout stays intact.

## 📝 Quick edits
- **WhatsApp number:** search for `919582771432` in `script.js`
- **Phone / email:** in the header and footer of `index.html`
- **Prices & product details:** in the Products section of `index.html` (also `data-price` on the Buy Now buttons)
- **Colors:** edit the `:root` variables at the top of `styles.css`

## 🚀 Run it
Just open `index.html` in any browser — no build step required.
