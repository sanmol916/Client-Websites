# Dekor Home Decor — Shopify Theme

A fully-editable **Shopify Online Store 2.0 theme** for a home decor / home decoration
store, inspired by the look and feel of dekorcompany.com. Every element (products,
images, text, colors, fonts, and layout sections) is editable directly in the Shopify
theme editor — no code changes required.

## How to use

1. Zip the contents of this folder so that the top-level folders (`assets`, `config`,
   `layout`, `locales`, `sections`, `snippets`, `templates`) sit at the **root** of the zip.
   ```bash
   cd dekor-home-decor-shopify-theme
   zip -r ../dekor-home-decor-shopify-theme.zip assets config layout locales sections snippets templates
   ```
2. In Shopify admin: **Online Store → Themes → Add theme → Upload zip file**.
3. Click **Customize** to add products, images, and edit any section.
4. Create collections (e.g. Wall Art, Mirrors, Showpieces, Table Lamps) and assign them
   in the "Collection list" and "Featured collection" sections.

## What's editable in the theme editor

- **Theme settings:** brand colors, fonts, page width, corner radius, product-card
  options, social links, cart type (drawer/page).
- **Homepage sections (drag-and-drop, add/remove blocks):** hero slideshow, icon
  features, collection list, featured collection, image banner, image with text,
  testimonials, newsletter, rich text.
- **Header & footer:** logo upload, navigation menus, footer blocks, social icons,
  announcement bar.

## Storefront templates included

Product, collection, list-collections, cart (drawer + page), search, blog, article,
contact, 404, password, gift card, and all customer account pages (login, register,
account, orders, addresses, password reset/activate).

## Structure

```
assets/      base.css, global.js
config/      settings_schema.json, settings_data.json
layout/      theme.liquid, password.liquid
locales/     en.default.json, en.default.schema.json
sections/    header, footer, hero, and all homepage + main-* sections
snippets/    icon, price, product-card, social-icons
templates/   JSON + liquid templates (incl. customers/)
```
