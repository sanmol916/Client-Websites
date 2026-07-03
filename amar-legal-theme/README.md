# Amar Legal — WordPress Theme

A professional, responsive WordPress theme for the Amar Legal law firm — the exact
navy-and-gold design from the approved website, now fully WordPress-powered.

## The "black backend" problem is solved
When you **activate** this theme, it automatically:
- Creates all 5 pages — **Home, About Us, Practice Areas, Our Team, Contact**
- Assigns the correct design template to each page
- Sets **Home** as the static front page
- Builds and assigns the **Primary Menu**
- Enables pretty permalinks

So the moment you activate it, the full site is live and every page is visible and
editable in the WordPress admin. Nothing is blank.

## Installation (3 steps, ~3 minutes)

1. **Upload the theme**
   - WordPress Admin → **Appearance → Themes → Add New → Upload Theme**
   - Choose `amar-legal-theme.zip` → **Install Now**
2. **Activate**
   - Click **Activate**. The pages, menu and homepage are created automatically.
3. **Visit your site** — it's already complete.

> On Hostinger you can also upload the folder via **File Manager** to
> `wp-content/themes/` and activate from the Themes screen.

## Enter your real details (no code needed)
Go to **Appearance → Customize → "Amar Legal — Contact Details"** and fill in:
- Phone, Email, Office address
- Office hours (two lines)
- Google Maps embed URL (optional — shows a live map on Contact)

Also under **Customize → Site Identity** you can upload a **logo** and set the
site title (used across the header, footer and disclaimer).

## Replacing the images
All images live in the theme's `images/` folder as **labelled placeholders**.
Replace each with a real photo using the **same filename** (via SFTP/File Manager),
or upload to the Media Library and swap the template references. Full list and
recommended sizes are in **IMAGE-LIST.md**.

| Where | File |
|-------|------|
| Home hero | `hero-home.jpg` |
| About / firm image | `about-firm.jpg`, `office.jpg` |
| CTA background | `cta-consult.jpg` |
| Page banners | `banner-about.jpg`, `banner-practice.jpg`, `banner-team.jpg`, `banner-contact.jpg` |
| Practice sections | `practice-civil.jpg`, `practice-corporate.jpg`, `practice-family.jpg` |
| Team | `founder-portrait.jpg`, `attorney-1.jpg`, `attorney-2.jpg`, `attorney-3.jpg` |
| Contact map | `map.jpg` (or set a live map URL in Customizer) |

## Editing text
- **Page content templates** live in the theme files (`front-page.php`,
  `page-about.php`, etc.). Edit text directly there, or ask your developer.
- **Team names:** replace `Adv. [Name]` in `page-team.php`.
- **Contact details:** use the Customizer (above) — no file editing needed.

## Contact form
The Contact page form works out of the box and emails the site admin address
(**Settings → General → Administration Email Address**). For reliable delivery on
Hostinger, install the free **WP Mail SMTP** plugin and connect it to your mailbox.

## Files
```
amar-legal-theme/
├── style.css              Theme header + full design system
├── functions.php          Setup, Customizer, auto-provisioning, contact form
├── header.php / footer.php Shared header, footer, disclaimer modal
├── front-page.php         Home
├── page-about.php         About Us
├── page-practice-areas.php Practice Areas
├── page-team.php          Our Team
├── page-contact.php       Contact (with working form)
├── index.php / page.php / single.php  Fallbacks (blog, generic pages, posts)
├── js/main.js             Menu, scroll animations, disclaimer modal
├── images/                Named placeholder images
└── screenshot.png         Theme preview
```

## Compliance
Includes the **Bar Council of India disclaimer** (shown once per visit) and the
non-solicitation footer notice, matching the requirements for Indian law-firm
websites. Add the firm's full address and registration details before going live.

## Requirements
WordPress 5.5+ · PHP 7.4+ · License GPL-2.0
