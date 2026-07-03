IMAGES FOLDER
=============

This folder is for theme images and assets.

WHAT TO PLACE HERE:
-------------------
1. Logo files (logo.png, logo-white.png)
2. Default images for pages
3. Icons and graphics
4. Background images
5. Placeholder images

RECOMMENDED IMAGE SIZES:
------------------------
- Logo: 200 x 80px (PNG with transparent background)
- Featured Images: 1200 x 675px (16:9 ratio)
- Hero Images: 1920 x 800px
- Service Icons: Can use emoji or add icon images here

SCREENSHOT:
-----------
To add a theme screenshot (shows in WordPress admin):
- Create a file named: screenshot.png
- Place it in the ROOT theme folder (not in this folder)
- Recommended size: 1200 x 900px
- Format: PNG or JPG

IMAGE OPTIMIZATION:
-------------------
Before uploading images:
1. Resize to appropriate dimensions
2. Compress using TinyPNG or similar tools
3. Use WebP format for better performance
4. Add descriptive alt text in WordPress

NOTE:
-----
This folder is currently empty. Add your images here and reference
them in your theme files using:

<?php echo get_template_directory_uri(); ?>/assets/images/your-image.png
