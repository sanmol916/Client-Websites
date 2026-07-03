#!/usr/bin/env python3
"""Generate named placeholder images for the Amar Legal website.
Each placeholder carries a subtle navy/gold legal aesthetic plus a label
so the client knows exactly which real photo to upload with the same name.
"""
from PIL import Image, ImageDraw, ImageFont
import os

OUT = os.path.join(os.path.dirname(__file__), "images")
os.makedirs(OUT, exist_ok=True)

NAVY = (13, 27, 42)
NAVY2 = (27, 58, 91)
GOLD = (201, 162, 75)
PAPER = (247, 248, 251)

def font(size, bold=True):
    paths = [
        "/usr/share/fonts/truetype/dejavu/DejaVuSerif-Bold.ttf" if bold else "/usr/share/fonts/truetype/dejavu/DejaVuSerif.ttf",
        "/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf" if bold else "/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf",
    ]
    for p in paths:
        if os.path.exists(p):
            return ImageFont.truetype(p, size)
    return ImageFont.load_default()

def gradient(w, h, c1, c2):
    base = Image.new("RGB", (w, h), c1)
    top = Image.new("RGB", (w, h), c2)
    mask = Image.new("L", (w, h))
    md = mask.load()
    for y in range(h):
        for x in range(0, w, 4):
            v = int(255 * ((x / w) * 0.6 + (y / h) * 0.4))
            for dx in range(4):
                if x + dx < w:
                    md[x + dx, y] = v
    base.paste(top, (0, 0), mask)
    return base

def centered(draw, box, text, fnt, fill):
    l, t, r, b = draw.textbbox((0, 0), text, font=fnt)
    tw, th = r - l, b - t
    x = box[0] + (box[2] - box[0] - tw) / 2 - l
    y = box[1] + (box[3] - box[1] - th) / 2 - t
    draw.text((x, y), text, font=fnt, fill=fill)

def make(name, w, h, label, kind="photo"):
    if kind == "photo":
        img = gradient(w, h, NAVY, NAVY2)
    else:
        img = Image.new("RGB", (w, h), PAPER)
    d = ImageDraw.Draw(img)

    # decorative border frame
    m = max(8, int(min(w, h) * 0.03))
    d.rectangle([m, m, w - m, h - m], outline=GOLD, width=max(2, int(min(w, h) * 0.006)))

    # scale-of-justice glyph (simple) centered above label
    cx = w // 2
    gy = int(h * 0.34)
    gsize = int(min(w, h) * 0.13)
    lc = GOLD
    d.line([(cx, gy - gsize), (cx, gy + gsize)], fill=lc, width=max(2, gsize // 12))
    d.line([(cx - gsize, gy - gsize // 2), (cx + gsize, gy - gsize // 2)], fill=lc, width=max(2, gsize // 12))
    for sx in (cx - gsize, cx + gsize):
        d.line([(sx, gy - gsize // 2), (sx - gsize // 2, gy + gsize // 3)], fill=lc, width=max(1, gsize // 16))
        d.line([(sx, gy - gsize // 2), (sx + gsize // 2, gy + gsize // 3)], fill=lc, width=max(1, gsize // 16))
        d.arc([sx - gsize // 2, gy + gsize // 6, sx + gsize // 2, gy + gsize // 2], 0, 180, fill=lc, width=max(1, gsize // 16))

    txt_fill = PAPER if kind == "photo" else NAVY
    sub_fill = GOLD

    centered(d, (0, int(h * 0.55), w, int(h * 0.68)), "AMAR LEGAL", font(max(14, int(h * 0.05))), sub_fill)
    centered(d, (0, int(h * 0.66), w, int(h * 0.80)), label, font(max(12, int(h * 0.045)), bold=False), txt_fill)
    centered(d, (0, int(h * 0.82), w, int(h * 0.92)), f"{w}x{h}  ·  replace: {name}", font(max(10, int(h * 0.028)), bold=False), (150, 158, 172) if kind != "photo" else (170, 180, 195))

    img.save(os.path.join(OUT, name), quality=88)
    print("created", name)

# name, width, height, label, kind
IMAGES = [
    ("hero-home.jpg", 1920, 1080, "Homepage Hero — office / skyline", "photo"),
    ("about-firm.jpg", 900, 1050, "Firm / chambers interior", "photo"),
    ("office.jpg", 900, 700, "Office environment", "photo"),
    ("cta-consult.jpg", 1920, 800, "Consultation / handshake background", "photo"),
    ("banner-about.jpg", 1920, 600, "About page banner", "photo"),
    ("banner-practice.jpg", 1920, 600, "Practice Areas banner", "photo"),
    ("banner-team.jpg", 1920, 600, "Team page banner", "photo"),
    ("banner-contact.jpg", 1920, 600, "Contact page banner", "photo"),
    ("practice-civil.jpg", 900, 700, "Civil litigation", "photo"),
    ("practice-corporate.jpg", 900, 700, "Corporate law", "photo"),
    ("practice-family.jpg", 900, 700, "Family law", "photo"),
    ("founder-portrait.jpg", 900, 1050, "Founder portrait", "photo"),
    ("attorney-1.jpg", 700, 800, "Advocate 1 portrait", "photo"),
    ("attorney-2.jpg", 700, 800, "Advocate 2 portrait", "photo"),
    ("attorney-3.jpg", 700, 800, "Advocate 3 portrait", "photo"),
    ("map.jpg", 1200, 480, "Google Map of office location", "light"),
    ("logo.png", 400, 160, "Firm logo (transparent PNG)", "light"),
]

for args in IMAGES:
    make(*args)

print("done")
