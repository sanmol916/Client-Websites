# 🚀 Quick Installation Guide - Amar Legal WordPress Theme

This is a **step-by-step guide** to get your Amar Legal website up and running on WordPress in **under 30 minutes**.

---

## ✅ Pre-Installation Checklist

Before starting, make sure you have:

- [ ] WordPress installed (version 5.0 or higher)
- [ ] WordPress admin access
- [ ] Theme files downloaded
- [ ] Your logo file (PNG format, 200×80px recommended)
- [ ] Contact information (phone, email, address)
- [ ] Content ready (about text, services, etc.)

---

## 📦 Step-by-Step Installation

### STEP 1: Upload Theme to WordPress

#### Option A: Via WordPress Admin (Easiest)

1. **Create ZIP file**
   - Compress the `amar-legal-wordpress-theme` folder into a ZIP file
   - Make sure the ZIP contains the theme folder, not nested folders

2. **Upload to WordPress**
   ```
   WordPress Admin → Appearance → Themes → Add New → Upload Theme
   ```
   - Click **Choose File** and select your ZIP file
   - Click **Install Now**
   - Wait for installation to complete
   - Click **Activate**

#### Option B: Via FTP/File Manager

1. **Upload via FTP**
   - Connect to your server using FileZilla or similar FTP client
   - Navigate to: `/wp-content/themes/`
   - Upload the entire `amar-legal-wordpress-theme` folder
   - Go to WordPress Admin → Appearance → Themes
   - Find "Amar Legal" and click **Activate**

2. **Upload via cPanel**
   - Log in to cPanel
   - Open **File Manager**
   - Navigate to: `public_html/wp-content/themes/`
   - Upload the ZIP file
   - Right-click ZIP and select **Extract**
   - Activate theme in WordPress admin

---

### STEP 2: Create Essential Pages

Create these pages in WordPress:

1. **Homepage**
   ```
   Pages → Add New
   Title: Home
   Content: Leave blank (theme handles this)
   Click: Publish
   ```

2. **About Page**
   ```
   Pages → Add New
   Title: About
   Content: Add your about content
   Featured Image: Upload an image (optional)
   Click: Publish
   ```

3. **Services Page**
   ```
   Pages → Add New
   Title: Services
   Content: Add services information
   Click: Publish
   ```

4. **Contact Page**
   ```
   Pages → Add New
   Title: Contact
   Content: Can leave blank (homepage has contact section)
   Click: Publish
   ```

5. **Blog Page** (for posts)
   ```
   Pages → Add New
   Title: Blog
   Content: Leave blank
   Click: Publish
   ```

---

### STEP 3: Configure Homepage

1. Go to: **Settings → Reading**
2. Under "Your homepage displays":
   - Select: **A static page**
   - Homepage: **Home**
   - Posts page: **Blog**
3. Click **Save Changes**

---

### STEP 4: Create Navigation Menu

1. Go to: **Appearance → Menus**
2. Click **Create a new menu**
3. Menu Name: `Main Menu`
4. Click **Create Menu**
5. Add pages:
   - Check: Home, About, Services, Contact
   - Click **Add to Menu**
6. Arrange menu items by dragging
7. Under "Menu Settings":
   - Check: **Primary Menu**
8. Click **Save Menu**

---

### STEP 5: Customize Theme Settings

1. Go to: **Appearance → Customize**

2. **Site Identity**
   - Upload your **logo** (recommended: 200×80px PNG)
   - Set **Site Title**: Amar Legal
   - Set **Tagline**: Professional Legal Services
   - Upload **Site Icon** (favicon): 512×512px

3. **Theme Options** (new section)
   - **Hero Title**: `Amar Legal`
   - **Hero Description**: `Professional Legal Services You Can Trust`

4. **Contact Information** (new section)
   - **Phone Number**: Your phone number
   - **Email Address**: contact@amarlegal.in
   - **Office Address**: Your office address
   - **Office Hours**: Mon - Fri: 9:00 AM - 6:00 PM

5. **Social Media Links** (optional)
   - Facebook URL: (if you have one)
   - LinkedIn URL: (recommended for legal firms)
   - Twitter URL: (optional)
   - Instagram URL: (optional)

6. **Colors** (optional - can keep defaults)
   - Background Color: White (#ffffff)
   - Link Color: Navy (#1a3c5e)

7. Click **Publish** to save all changes

---

### STEP 6: Add Content to Homepage

The homepage is automatically generated using `front-page.php`, but you can:

1. **Edit About Section**
   - Open `front-page.php` in theme editor
   - Find the About section
   - Update text as needed

2. **Edit Services**
   - Find the Services section in `front-page.php`
   - Update service titles and descriptions
   - Change icons (emojis can be replaced)

3. **Or Keep Defaults**
   - The theme comes with sample content for Amar Legal
   - You can keep it and customize later

---

### STEP 7: Test Contact Form

1. Visit your homepage
2. Scroll to the **Contact** section
3. Fill out and submit the test form
4. Check if email arrives at your admin email
5. **If email doesn't arrive:**
   - Install **WP Mail SMTP** plugin
   - Configure email settings
   - Test again

---

### STEP 8: Final Checks

- [ ] Visit homepage - does it look correct?
- [ ] Test mobile view (resize browser or use phone)
- [ ] Click all menu items - do they work?
- [ ] Test contact form - does it send email?
- [ ] Check mobile menu (hamburger icon)
- [ ] Scroll page - does "back to top" button appear?
- [ ] Test smooth scrolling (click hero buttons)

---

## ⚡ Quick Configuration Reference

### Minimum Required:

```
✅ Upload and activate theme
✅ Create Home page and set as front page
✅ Create main menu
✅ Add contact information in Customizer
✅ Upload logo
```

### Recommended:

```
✅ Add About, Services, Contact pages
✅ Configure social media links
✅ Add blog posts
✅ Install essential plugins (Yoast SEO, Contact Form 7)
✅ Test on mobile devices
```

---

## 🔧 Common Installation Issues

### ❌ Theme doesn't appear after upload

**Solution:**
1. Check folder structure - should be: `themes/amar-legal-wordpress-theme/style.css`
2. Not: `themes/amar-legal-wordpress-theme/amar-legal-wordpress-theme/style.css`
3. Re-upload if nested incorrectly

### ❌ White screen after activation

**Solution:**
1. Deactivate theme via FTP: rename theme folder temporarily
2. Check PHP error logs
3. Ensure PHP version is 7.4 or higher
4. Contact hosting support

### ❌ Menu doesn't show

**Solution:**
1. Go to Appearance → Menus
2. Ensure menu is assigned to "Primary Menu" location
3. Save menu

### ❌ Contact form not sending

**Solution:**
1. Install **WP Mail SMTP** plugin
2. Configure SMTP settings
3. Test email functionality

### ❌ Images not responsive

**Solution:**
1. Clear browser cache
2. Hard refresh (Ctrl + F5)
3. Check if CSS is loading

---

## 📱 Testing Your Website

### Desktop Testing
- Chrome, Firefox, Safari, Edge
- Screen sizes: 1920px, 1440px, 1024px

### Mobile Testing
- iPhone (Safari)
- Android (Chrome)
- iPad (Safari)
- Test landscape and portrait

### Test These Features:
- [ ] Mobile menu (hamburger)
- [ ] Contact form submission
- [ ] Smooth scrolling
- [ ] Back to top button
- [ ] All links work
- [ ] Images load properly
- [ ] Text is readable

---

## 🎯 Next Steps After Installation

1. **Add Content**
   - Write detailed About page
   - Add all your services
   - Create blog posts

2. **Install Plugins**
   - Yoast SEO (for search optimization)
   - Contact Form 7 (better forms)
   - WP Super Cache (speed)
   - UpdraftPlus (backups)

3. **Optimize**
   - Compress images
   - Set up caching
   - Submit sitemap to Google

4. **Security**
   - Install Wordfence
   - Use strong passwords
   - Enable two-factor authentication
   - Keep WordPress updated

5. **Marketing**
   - Set up Google Analytics
   - Create Google My Business listing
   - Submit to legal directories
   - Start blogging regularly

---

## 📞 Need Help?

If you encounter any issues during installation:

1. Check the main **README.md** file
2. Visit WordPress support forums
3. Contact your hosting provider
4. Hire a WordPress developer if needed

---

## ✅ Installation Complete!

Congratulations! Your Amar Legal website is now live. 🎉

**What's Next?**
- Add more content
- Customize colors and fonts
- Install recommended plugins
- Promote your website

---

**Installation Time:** ~20-30 minutes  
**Difficulty Level:** Beginner-friendly  
**Support:** See README.md for support options
