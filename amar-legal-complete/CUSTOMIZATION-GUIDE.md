# 🎨 Customization Guide - Amar Legal Website

## Quick Reference for Editing Your Website

---

## 📝 Editing Pages

### Edit Any Page:

1. **WordPress Admin → Pages → All Pages**
2. **Hover over page** → Click "Edit"
3. **Make changes** in the editor
4. **Click "Update"**

### Pages You Can Edit:

- **Home** - Uses front-page.php template (customize via Customizer)
- **About Us** - Full content editor
- **Our Services** - Full content editor
- **Contact Us** - Full content editor
- **Blog** - Displays blog posts automatically

---

## 🎨 Customize Appearance

### Via WordPress Customizer:

**Access:** Appearance → Customize

### 1. Site Identity
```
- Logo: Upload your logo (200x80px PNG)
- Site Title: "Amar Legal"
- Tagline: Your tagline
- Site Icon: Upload favicon (512x512px)
```

### 2. Theme Options
```
- Hero Title: Main homepage heading
- Hero Description: Homepage subtitle
```

### 3. Contact Information
```
- Phone Number: Your phone
- Email Address: Your email
- Office Address: Your address
- Office Hours: Business hours
```

### 4. Social Media Links (Optional)
```
- Facebook URL
- Twitter URL
- LinkedIn URL
- Instagram URL
```

### 5. Colors (Built-in)
```
- Background Color
- Link Color
```

**Click "Publish" to save all changes!**

---

## 🖼️ Adding Images

### Add Logo:

1. **Appearance → Customize → Site Identity**
2. **Click "Select Logo"**
3. **Upload Image** (200x80px recommended)
4. **Click "Select" → "Publish"**

### Add Featured Image to Page:

1. **Edit any page**
2. **Right sidebar → Featured Image**
3. **Click "Set featured image"**
4. **Upload or select image**
5. **Click "Set featured image"**
6. **Update page**

### Add Image to Content:

1. **Edit page content**
2. **Click "Add Media" button**
3. **Upload or select image**
4. **Click "Insert into page"**

---

## 📋 Managing Menus

### Edit Main Menu:

1. **Appearance → Menus**
2. **Select "Main Menu"**
3. **Add/Remove pages** from left panel
4. **Drag to reorder** menu items
5. **Click "Save Menu"**

### Create Submenu (Dropdown):

1. **In menu editor**
2. **Drag menu item** slightly to the right
3. **It becomes a sub-item**
4. **Save Menu**

---

## ✍️ Managing Blog Posts

### Add New Post:

1. **Posts → Add New**
2. **Enter title** and **content**
3. **Add featured image** (optional but recommended)
4. **Select category** (e.g., "Legal Advice", "Legal Tips")
5. **Click "Publish"**

### Edit Existing Post:

1. **Posts → All Posts**
2. **Hover over post** → Click "Edit"
3. **Make changes**
4. **Click "Update"**

---

## 🎨 Changing Colors

### Method 1: Via Code (style.css)

1. **Appearance → Theme Editor**
2. **Select: style.css**
3. **Find lines 23-28:**

```css
:root {
    --primary-color: #1a3c5e;        /* Navy Blue - Change this */
    --secondary-color: #c9a961;      /* Gold - Change this */
    --accent-color: #2c5f8d;         /* Medium Blue - Change this */
}
```

4. **Replace color codes** with your colors
5. **Click "Update File"**

### Color Picker:

Use a color picker tool to get hex codes:
- Google: "color picker"
- Get hex code (e.g., #FF5733)
- Replace in CSS

---

## 📱 Editing Homepage Sections

### Hero Section:

**Via Customizer:**
- Appearance → Customize → Theme Options
- Change Hero Title and Description
- Publish

### About Section:

**Edit Text:**
- Edit file: `front-page.php`
- Or install "Advanced Custom Fields" plugin for easier editing

### Services Section:

**To Change Services:**
1. **Appearance → Theme Editor**
2. **Select: front-page.php**
3. **Find the services section** (around line 70)
4. **Edit service titles and descriptions**

**Example:**
```php
<div class="service-card">
    <div class="service-icon">⚖️</div>
    <h3>Your Service Name</h3>
    <p>Your service description.</p>
</div>
```

### Contact Section:

**Contact Info:**
- Appearance → Customize → Contact Information
- Update phone, email, address, hours

**Contact Form:**
- Built into theme
- Or install "Contact Form 7" for advanced features

---

## 🔧 Advanced Customizations

### Change Fonts:

**Edit style.css** (lines 16-17):
```css
--font-primary: 'Georgia', 'Times New Roman', serif;
--font-secondary: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
```

**To use Google Fonts:**
1. Visit: https://fonts.google.com
2. Select font
3. Copy embed code
4. Add to `header.php` before `</head>`
5. Update CSS variables

### Change Layout:

**Edit template files:**
- `header.php` - Header and navigation
- `footer.php` - Footer content
- `front-page.php` - Homepage layout
- `page.php` - Default page layout

### Add New Section to Homepage:

1. **Edit: front-page.php**
2. **Find:** `</section>` (end of last section)
3. **Add new section code:**

```php
<section class="my-new-section section-padding">
    <div class="container text-center">
        <h2 class="section-title">Section Title</h2>
        <p class="section-subtitle">Section description</p>
        <!-- Your content here -->
    </div>
</section>
```

4. **Save file**

---

## 🖼️ Widget Areas

### Add Widgets to Footer:

1. **Appearance → Widgets**
2. **Find:**
   - Footer Widget Area 1
   - Footer Widget Area 2
   - Footer Widget Area 3
3. **Drag widgets** from left into areas
4. **Configure widget** settings
5. **Save**

**Available Widgets:**
- Text
- Recent Posts
- Categories
- Tag Cloud
- Custom HTML
- Navigation Menu
- Search

---

## 📧 Contact Form Customization

### Built-in Form:

Form is in `front-page.php` - edit fields there

### Use Contact Form 7 (Recommended):

1. **Install Contact Form 7** plugin
2. **Create form:** Contact → Add New
3. **Copy shortcode:** `[contact-form-7 id="123"]`
4. **Edit front-page.php**
5. **Replace form HTML** with shortcode
6. **More customizable!**

---

## 🎯 SEO Optimization

### Install Yoast SEO:

1. **Plugins → Add New**
2. **Search: "Yoast SEO"**
3. **Install and Activate**
4. **Edit any page/post**
5. **Scroll to Yoast SEO section**
6. **Optimize:**
   - Focus keyphrase
   - SEO title
   - Meta description
   - Readability

---

## 📱 Testing Changes

### After Making Changes:

1. **Clear cache:**
   - Browser: Ctrl + Shift + R (hard refresh)
   - WordPress: Clear cache plugin if installed

2. **Test on devices:**
   - Desktop
   - Tablet (resize browser)
   - Mobile (resize browser or use phone)

3. **Check:**
   - All links work
   - Images load
   - Forms submit
   - Menu functions
   - Mobile menu works

---

## 💾 Backup Before Changes

### Always Backup Before Major Changes:

**Via Plugin:**
1. **Install UpdraftPlus** (free backup plugin)
2. **Settings → UpdraftPlus Backups**
3. **Click "Backup Now"**
4. **Check: Database + Files**

**Via Hosting:**
- Check your hosting control panel
- Most have automatic backups
- Create manual backup before changes

---

## 🆘 Undo Changes

### If Something Breaks:

**Method 1: Restore from Backup**
- UpdraftPlus → Restore tab
- Select backup
- Click "Restore"

**Method 2: Revert File**
- Appearance → Theme Editor
- Find file you edited
- Copy original code back
- Or re-upload original file via FTP

**Method 3: Reinstall Theme**
- Deactivate theme
- Delete theme
- Re-upload original ZIP
- Activate
- Re-import content

---

## 📚 Common Customizations

### Change Phone Number:

1. **Appearance → Customize → Contact Information**
2. **Update Phone Number**
3. **Publish**

### Change Email:

1. **Appearance → Customize → Contact Information**
2. **Update Email Address**
3. **Publish**

### Change Office Hours:

1. **Appearance → Customize → Contact Information**
2. **Update Office Hours**
3. **Publish**

### Add Social Media:

1. **Appearance → Customize → Social Media Links**
2. **Enter full URLs** (e.g., https://facebook.com/yourpage)
3. **Publish**

### Change Hero Image:

1. **Pages → Home → Edit**
2. **Set Featured Image**
3. **Update**

Or edit CSS in style.css for hero section background

---

## ✅ Maintenance Checklist

### Weekly:
- [ ] Check for WordPress updates
- [ ] Update plugins
- [ ] Update theme (if updates available)
- [ ] Test contact form

### Monthly:
- [ ] Create backup
- [ ] Review and update content
- [ ] Check for broken links
- [ ] Review analytics (if installed)
- [ ] Add new blog post

### As Needed:
- [ ] Respond to contact form submissions
- [ ] Update practice areas
- [ ] Add new pages
- [ ] Update office hours
- [ ] Change seasonal content

---

## 🎓 Learning Resources

### WordPress Basics:
- https://wordpress.org/support/
- https://wordpress.tv/
- YouTube: "WordPress for beginners"

### CSS/Design:
- https://www.w3schools.com/css/
- YouTube: "CSS tutorials"

### Plugins:
- https://wordpress.org/plugins/
- Read plugin documentation

---

## 💡 Pro Tips

1. **Make small changes** - Test each change before making more
2. **Use child theme** - For advanced CSS changes (prevents update overwrites)
3. **Document changes** - Keep notes on what you changed
4. **Test everything** - Always test on mobile and desktop
5. **Keep backups** - Regular backups save headaches
6. **Ask for help** - WordPress community is helpful
7. **Use staging** - Test major changes on staging site first (if available)

---

## ✅ You're Ready!

You now know how to:
- ✅ Edit pages and posts
- ✅ Customize theme settings
- ✅ Change colors and fonts
- ✅ Manage menus
- ✅ Add images
- ✅ Modify homepage sections
- ✅ Backup and restore

**Happy customizing!** 🎨

---

**Questions?** Check README.md or WordPress support forums.
