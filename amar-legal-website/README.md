# Amar Legal — Professional Website

A responsive, content-ready 5-page website for **Amar Legal**, a Mumbai-based law
firm. Clean, modern design with a navy-and-gold legal aesthetic, built with plain
HTML, CSS and JavaScript — no build step required.

## Pages
| Page | File | Highlights |
|------|------|-----------|
| Home | `index.html` | Hero with stats, firm philosophy, 6 practice areas, why-choose, quote, CTA |
| About | `about.html` | Story, mission & vision, values, why-choose |
| Practice Areas | `practice-areas.html` | 3 detailed sections + 6 service cards |
| Our Team | `team.html` | Leadership spotlight + 3 advocate profiles |
| Contact | `contact.html` | Enquiry form, contact info, office hours, map |

## Features
- Fully responsive (desktop, tablet, mobile) with a slide-in mobile menu
- Sticky header, scroll-reveal animations, smooth interactions
- **Bar Council of India disclaimer modal** (shown once per session) — required for Indian law firm sites
- Accessible markup, SEO meta tags, fast-loading (no heavy frameworks)
- All real content from amarlegal.in preserved and professionally expanded

## Previewing locally
Open `index.html` in any browser, or run a quick local server:
```bash
cd amar-legal-website
python3 -m http.server 8080
# visit http://localhost:8080
```

## Images
All images use fixed filenames and currently show labelled placeholders.
See **[IMAGE-LIST.md](IMAGE-LIST.md)** for the full list. Replace each file in
`images/` with a real photo using the **same filename** — nothing else to change.

## Customising content
- **Phone / email / address:** currently placeholders (`+91 00000 00000`,
  `contact@amarlegal.in`, "Mumbai, Maharashtra"). Search & replace across the
  `.html` files with the real details.
- **Team names:** replace `Adv. [Name]` in `team.html`.
- **Colours & fonts:** edit the `:root` variables at the top of `css/style.css`.

## Putting this on WordPress (Hostinger)
You have two straightforward options:

### Option 1 — Publish as-is with a static-hosting plugin (fastest)
1. Install a plugin such as **"Simply Static"** or upload the folder via **File
   Manager** to a subdirectory (e.g. `public_html/amarlegal/`).
2. Visit `bhamavision.com/amarlegal` (or the chosen path) — done.
   This keeps the exact design with zero rebuilding.

### Option 2 — Recreate in WordPress with a page builder (most editable)
1. Upload every image in `images/` to **Media Library** (same filenames).
2. Create 5 pages (Home, About, Practice Areas, Our Team, Contact).
3. Rebuild each section with your builder (Elementor, Gutenberg, etc.) using this
   site as the exact visual reference, pointing image blocks to the uploaded media.
4. Set **Home** as your static front page and build the menu.

> For a law firm that rarely changes content, **Option 1** is usually the best
> balance of polish and effort. Choose Option 2 if the client wants to self-edit
> text regularly.

## Compliance note
This site follows the informational, non-solicitation style required by the Bar
Council of India, including the acknowledgement modal. Add the firm's full
address and registration details before going live.
