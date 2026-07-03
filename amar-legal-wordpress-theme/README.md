# Amar Legal - WordPress Theme

A professional, responsive WordPress theme designed specifically for **Amar Legal** - a modern legal firm website with clean design and mobile-first approach.

![Version](https://img.shields.io/badge/version-1.0.0-blue)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue)
![License](https://img.shields.io/badge/license-GPL--2.0-green)

---

## 🎯 Features

### Design & Layout
- ✅ **Fully Responsive** - Mobile, tablet, and desktop optimized
- ✅ **Professional Legal Design** - Tailored for law firms and legal practices
- ✅ **Modern UI/UX** - Clean, elegant interface with smooth animations
- ✅ **Mobile-First Approach** - Optimized for mobile devices
- ✅ **Cross-Browser Compatible** - Works on all modern browsers

### WordPress Features
- ✅ **Custom Homepage Template** - Dedicated front-page design
- ✅ **Multiple Page Templates** - Page, Single Post, Search, 404
- ✅ **Widget Areas** - 3 footer widget areas + sidebar
- ✅ **Custom Menus** - Primary and footer navigation
- ✅ **Theme Customizer Integration** - Easy customization without code
- ✅ **Custom Logo Support** - Upload your own logo
- ✅ **Featured Images** - Full support for post thumbnails
- ✅ **Gutenberg Compatible** - Works with WordPress block editor

### Functionality
- ✅ **Built-in Contact Form** - No plugin required (or use Contact Form 7)
- ✅ **Smooth Scrolling** - For anchor links
- ✅ **Mobile Menu** - Hamburger menu for mobile devices
- ✅ **Back to Top Button** - Smooth scroll to top
- ✅ **Sticky Header** - Fixed navigation on scroll
- ✅ **Scroll Animations** - Elements fade in on scroll
- ✅ **SEO Friendly** - Semantic HTML5 markup
- ✅ **Accessibility Ready** - WCAG compliant features

---

## 📋 Requirements

- **WordPress:** 5.0 or higher
- **PHP:** 7.4 or higher
- **MySQL:** 5.6 or higher

---

## 📦 Installation

### Method 1: WordPress Admin Panel (Recommended)

1. **Download the theme**
   - Download the `amar-legal-wordpress-theme` folder
   - Create a ZIP file of the entire folder

2. **Upload to WordPress**
   - Log in to your WordPress admin panel
   - Go to **Appearance → Themes**
   - Click **Add New** → **Upload Theme**
   - Choose the ZIP file and click **Install Now**
   - Click **Activate** after installation

### Method 2: FTP/File Manager

1. **Download the theme files**
   - Download the `amar-legal-wordpress-theme` folder

2. **Upload via FTP**
   - Connect to your server via FTP
   - Navigate to `/wp-content/themes/`
   - Upload the entire `amar-legal-wordpress-theme` folder
   - Go to **Appearance → Themes** in WordPress admin
   - Find and activate the theme

### Method 3: cPanel File Manager

1. **Create a ZIP file** of the theme folder
2. Log in to your **cPanel**
3. Go to **File Manager**
4. Navigate to `/public_html/wp-content/themes/`
5. Click **Upload** and upload the ZIP file
6. Right-click the ZIP file and select **Extract**
7. Go to WordPress admin → **Appearance → Themes**
8. Activate the theme

---

## ⚙️ Configuration

### Step 1: Set Up Menus

1. Go to **Appearance → Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add pages to your menu:
   - Home
   - About
   - Services
   - Contact
4. Assign the menu to **Primary Menu** location
5. Click **Save Menu**

### Step 2: Customize Theme Settings

1. Go to **Appearance → Customize**
2. Configure the following sections:

#### **Site Identity**
- Upload your logo
- Set site title and tagline
- Upload site icon (favicon)

#### **Theme Options**
- **Hero Title:** Main heading on homepage (default: "Amar Legal")
- **Hero Description:** Subtitle text on homepage

#### **Contact Information**
- **Phone Number:** Your office phone
- **Email Address:** Contact email
- **Office Address:** Physical address
- **Office Hours:** Business hours (e.g., "Mon - Fri: 9:00 AM - 6:00 PM")

#### **Social Media Links** (Optional)
- Facebook URL
- Twitter URL
- LinkedIn URL
- Instagram URL

3. Click **Publish** to save changes

### Step 3: Create Pages

Create the following pages:

1. **Home** (Set as front page)
   - Go to **Pages → Add New**
   - Title: "Home"
   - Leave content empty (uses front-page.php template)
   - Publish

2. **About**
   - Add your about content
   - Add featured image (optional)
   - Publish

3. **Services**
   - Add your services information
   - Publish

4. **Contact**
   - Can use the built-in contact section on homepage
   - Or create a separate contact page
   - Publish

### Step 4: Set Homepage

1. Go to **Settings → Reading**
2. Select **A static page** for homepage displays
3. Choose **Home** as the homepage
4. Choose **Blog** page (create one if needed) for posts page
5. Click **Save Changes**

---

## 🎨 Customization

### Colors

The theme uses CSS custom properties. To change colors, edit `style.css`:

```css
:root {
    --primary-color: #1a3c5e;        /* Deep Navy Blue */
    --secondary-color: #c9a961;      /* Gold Accent */
    --accent-color: #2c5f8d;         /* Medium Blue */
    --text-dark: #1f2937;
    --text-light: #6b7280;
}
```

### Typography

Default fonts:
- **Headings:** Georgia (serif)
- **Body:** System fonts (sans-serif)

To change fonts, edit the `--font-primary` and `--font-secondary` variables in `style.css`.

### Logo

**Recommended size:** 200px × 80px (PNG with transparent background)

Upload via: **Appearance → Customize → Site Identity → Logo**

### Homepage Sections

The homepage includes these sections:
1. **Hero Section** - Main banner with call-to-action
2. **About Section** - Company information
3. **Services Section** - Practice areas (6 cards)
4. **Why Choose Us** - Features and benefits (4 items)
5. **Contact Section** - Contact info + contact form

To edit sections, modify `front-page.php`.

---

## 📧 Contact Form Setup

### Option 1: Built-in Form (Default)

The theme includes a basic contact form that sends emails to the WordPress admin email.

**To customize:**
- Edit recipient email in **Settings → General → Email Address**
- Form submissions will be sent to this email

### Option 2: Contact Form 7 (Recommended for Advanced Features)

1. Install **Contact Form 7** plugin
2. Create a new form
3. Edit `front-page.php` and replace the form HTML with:
   ```php
   <?php echo do_shortcode('[contact-form-7 id="123" title="Contact form"]'); ?>
   ```

---

## 🔧 Troubleshooting

### Theme not appearing in WordPress

**Solution:**
- Ensure the folder name is `amar-legal-wordpress-theme`
- Verify `style.css` has the theme header comment
- Check file permissions (755 for folders, 644 for files)

### Menu not showing

**Solution:**
- Go to **Appearance → Menus**
- Assign menu to "Primary Menu" location
- Ensure menu has items added

### Mobile menu not working

**Solution:**
- Clear browser cache
- Ensure JavaScript is enabled
- Check browser console for errors
- Re-upload `js/scripts.js` if needed

### Contact form not sending emails

**Solution:**
- Check WordPress email settings
- Install **WP Mail SMTP** plugin for reliable email delivery
- Verify server supports PHP `mail()` function
- Check spam folder

### Images not displaying

**Solution:**
- Add featured images to pages/posts
- Verify image upload permissions
- Regenerate thumbnails using plugin

---

## 🎯 Best Practices

### SEO
1. Install **Yoast SEO** or **Rank Math** plugin
2. Add meta descriptions to pages
3. Use proper heading hierarchy (H1 → H6)
4. Add alt text to images

### Performance
1. Install a caching plugin (e.g., **WP Super Cache**)
2. Optimize images before uploading
3. Use a CDN for assets
4. Enable GZIP compression

### Security
1. Keep WordPress and theme updated
2. Use strong passwords
3. Install security plugin (e.g., **Wordfence**)
4. Regular backups with **UpdraftPlus**

### Content
1. Write clear, professional content
2. Use high-quality images (minimum 1200px wide)
3. Keep content updated
4. Add blog posts regularly

---

## 📱 Responsive Breakpoints

- **Mobile:** < 480px
- **Tablet:** 481px - 768px
- **Desktop:** 769px - 1200px
- **Large Desktop:** > 1200px

---

## 🔌 Recommended Plugins

### Essential
- **Contact Form 7** - Advanced contact forms
- **Yoast SEO** - Search engine optimization
- **UpdraftPlus** - Backup and restore

### Optional
- **WP Super Cache** - Performance optimization
- **Wordfence Security** - Security protection
- **WP Mail SMTP** - Reliable email delivery
- **Regenerate Thumbnails** - Fix image sizes
- **Classic Editor** - If you prefer classic editor

---

## 📂 File Structure

```
amar-legal-wordpress-theme/
├── style.css              # Main stylesheet (required)
├── functions.php          # Theme functions (required)
├── index.php              # Blog/archive template (required)
├── header.php             # Header template
├── footer.php             # Footer template
├── front-page.php         # Homepage template
├── page.php               # Page template
├── single.php             # Single post template
├── search.php             # Search results template
├── 404.php                # 404 error page template
├── js/
│   └── scripts.js         # Theme JavaScript
├── assets/
│   └── images/            # Theme images (placeholder)
└── README.md              # This file
```

---

## 🆘 Support & Documentation

### Getting Help

1. **Check this README** for common solutions
2. **WordPress Codex:** https://codex.wordpress.org/
3. **Theme Support Forum:** (Add your support URL)
4. **Email Support:** (Add your support email)

### Useful Resources

- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [WordPress Support Forum](https://wordpress.org/support/)
- [W3C HTML Validator](https://validator.w3.org/)
- [CSS Validator](https://jigsaw.w3.org/css-validator/)

---

## 📄 License

This theme is licensed under the **GNU General Public License v2.0 or later**.

**License URI:** http://www.gnu.org/licenses/gpl-2.0.html

---

## 📝 Changelog

### Version 1.0.0 (2026-07-03)
- ✨ Initial release
- ✅ Responsive design
- ✅ Custom homepage template
- ✅ Built-in contact form
- ✅ Mobile menu
- ✅ Theme customizer options
- ✅ Widget areas
- ✅ SEO friendly markup
- ✅ Accessibility features

---

## 👨‍💻 Credits

**Theme Design & Development:** Custom theme for Amar Legal
**Icons:** Emoji icons (Unicode standard)
**WordPress Version:** 5.0+
**PHP Version:** 7.4+

---

## 🎉 Thank You!

Thank you for choosing **Amar Legal WordPress Theme**. We hope it serves your legal practice well!

For questions or support, please refer to the support section above.

---

**Developed with ❤️ for Amar Legal**
