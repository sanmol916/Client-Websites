# WordPress Multisite Setup on Hostinger - Complete Guide

## 🎯 Specifically for Hostinger Hosting

This guide is tailored for **Hostinger hosting** with WordPress already installed at bhamavision.com

---

## ✅ Prerequisites

Before starting, make sure you have:

- [ ] WordPress installed on bhamavision.com via Hostinger
- [ ] Access to **Hostinger hPanel** (hosting control panel)
- [ ] WordPress admin credentials
- [ ] At least 30 minutes of time

---

## 🔐 Step 1: Backup Your WordPress Site (5 minutes)

### Via Hostinger hPanel:

1. **Log in to Hostinger hPanel**
   - Go to: https://hpanel.hostinger.com

2. **Create Backup:**
   - Click on your website (bhamavision.com)
   - Go to: **"Backups"** section
   - Click: **"Create Backup"**
   - Wait for backup to complete (saves automatically)

### Or Install Backup Plugin:

1. **WordPress Admin → Plugins → Add New**
2. Search: **"UpdraftPlus"**
3. Install and Activate
4. Go to: **Settings → UpdraftPlus Backups**
5. Click: **"Backup Now"**
6. Check both: Database and Files
7. Click: **"Backup Now"**

✅ **Backup complete!** Now safe to proceed.

---

## 📂 Step 2: Access Your WordPress Files

### Option A: Via Hostinger File Manager (Easier)

1. **Log in to Hostinger hPanel**
2. Click on your website: **bhamavision.com**
3. Go to: **"File Manager"** (in Files section)
4. Navigate to: **public_html/** (or wherever WordPress is installed)

You'll see:
```
public_html/
├── wp-admin/
├── wp-content/
├── wp-includes/
├── wp-config.php       ← We'll edit this
├── .htaccess           ← We'll edit this
└── index.php
```

### Option B: Via FTP (Alternative)

1. **Get FTP credentials:**
   - Hostinger hPanel → Your website → FTP Accounts
   - Note: Hostname, Username, Password

2. **Use FileZilla or similar FTP client**
3. **Connect** and navigate to public_html/

---

## 🔧 Step 3: Edit wp-config.php (Enable Multisite)

### Via Hostinger File Manager:

1. **Open File Manager** (from Step 2)

2. **Find wp-config.php** in public_html/

3. **Right-click → Edit**

4. **Scroll down** to find this line:
   ```php
   /* That's all, stop editing! Happy publishing. */
   ```

5. **Add these lines BEFORE that line:**
   ```php
   /* Multisite Configuration */
   define('WP_ALLOW_MULTISITE', true);
   ```

6. **Click "Save and Close"**

**Your wp-config.php should now look like:**
```php
...other settings...

/* Multisite Configuration */
define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy publishing. */

require_once ABSPATH . 'wp-settings.php';
```

✅ **File saved!**

---

## 🌐 Step 4: Install WordPress Network

1. **Go to WordPress Admin**
   - URL: bhamavision.com/wp-admin

2. **Refresh the page** or log out and log back in

3. **You'll see a new menu item:**
   - Go to: **Tools → Network Setup**

4. **Configure Network:**
   - **Choose:** Sub-directories ✅ (NOT sub-domains!)
   - **Network Title:** Bhama Vision Client Sites
   - **Admin Email:** Your email
   
5. **Important Note from WordPress:**
   - You'll see a warning about permalinks - that's okay!
   - Click: **"Install"**

6. **WordPress will show you configuration code**
   - ⚠️ **DON'T CLOSE THIS PAGE!**
   - Keep it open, we'll copy the code in next steps

---

## 📝 Step 5: Update wp-config.php (Network Configuration)

### The page shows you code like this:

```php
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'bhamavision.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
```

### Add this to wp-config.php:

1. **Go back to File Manager**

2. **Edit wp-config.php** again

3. **Find the line you added earlier:**
   ```php
   define('WP_ALLOW_MULTISITE', true);
   ```

4. **Replace it with the code WordPress gave you:**
   ```php
   /* Multisite Configuration */
   define('MULTISITE', true);
   define('SUBDOMAIN_INSTALL', false);
   define('DOMAIN_CURRENT_SITE', 'bhamavision.com');
   define('PATH_CURRENT_SITE', '/');
   define('SITE_ID_CURRENT_SITE', 1);
   define('BLOG_ID_CURRENT_SITE', 1);
   ```

5. **Important for Hostinger:** Add this line too:
   ```php
   define('COOKIE_DOMAIN', '');
   ```

**Final wp-config.php looks like:**
```php
...other settings...

/* Multisite Configuration */
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'bhamavision.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('COOKIE_DOMAIN', '');

/* That's all, stop editing! Happy publishing. */

require_once ABSPATH . 'wp-settings.php';
```

6. **Save the file**

✅ **wp-config.php updated!**

---

## 🔗 Step 6: Update .htaccess File

### Find .htaccess:

**Important:** .htaccess is a **hidden file** on Hostinger!

1. **In File Manager, click Settings** (top right)
2. **Check:** "Show Hidden Files"
3. **Click "Save"**

4. **Now you'll see .htaccess** in public_html/

### Edit .htaccess:

1. **Right-click .htaccess → Edit**

2. **WordPress showed you .htaccess code** - copy it!

3. **Replace EVERYTHING in .htaccess** with this code:

```apache
# BEGIN WordPress Multisite
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]

# add a trailing slash to /wp-admin
RewriteRule ^([_0-9a-zA-Z-]+/)?wp-admin$ $1wp-admin/ [R=301,L]

RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^ - [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*) $2 [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(.*\.php)$ $2 [L]
RewriteRule . index.php [L]
# END WordPress Multisite
```

4. **Save the file**

✅ **.htaccess updated!**

---

## 🔄 Step 7: Log Back In

1. **Close your browser** (to clear cache)

2. **Open new browser window**

3. **Go to:** bhamavision.com/wp-admin

4. **Log in** with your credentials

5. **Look at top-left menu** - you should now see:
   - **"My Sites"** menu
   - **"Network Admin"** option

🎉 **Success! Multisite is active!**

---

## ⚙️ Step 8: Configure Network Settings

1. **Go to:** Network Admin → Settings
   - Hover "My Sites" → Click "Network Admin" → Click "Dashboard"
   - Or go to: bhamavision.com/wp-admin/network/

2. **Configure:**
   - **Registration Settings:** "Registration is disabled" (recommended)
   - **New Site Settings:** Keep defaults
   - **Upload Settings:** 
     - Upload Space: 100 MB per site (or adjust)
     - File types: Keep default or customize

3. **Click "Save Changes"**

---

## 📤 Step 9: Upload Themes to Network

Themes must be uploaded at **network level** first.

### Upload Amar Legal Theme:

1. **Go to:** Network Admin → Themes
   - URL: bhamavision.com/wp-admin/network/themes.php

2. **Click:** "Add New" → "Upload Theme"

3. **Click:** "Choose File"

4. **Select:** `amar-legal-wordpress-theme.zip`

5. **Click:** "Install Now"

6. **Wait for upload** (Hostinger is fast!)

7. **Important:** Click **"Network Enable"** link
   - This makes the theme available to all sites

✅ **Theme uploaded and enabled!**

### Upload More Themes:

Repeat for any other client themes you have.

---

## 🌟 Step 10: Create Your First Client Site (Amar Legal)

### Create the Site:

1. **Go to:** Network Admin → Sites → Add New
   - URL: bhamavision.com/wp-admin/network/site-new.php

2. **Fill in details:**
   ```
   Site Address: amarlegal
   (Will create: bhamavision.com/amarlegal)
   
   Site Title: Amar Legal
   
   Admin Email: your-email@domain.com
   (Or client's email if giving them access)
   ```

3. **Click:** "Add Site"

4. **Success message appears!**
   - WordPress creates the site
   - Creates database tables
   - Sends email to admin email

✅ **Site created!** URL: bhamavision.com/amarlegal

---

## 🎨 Step 11: Configure Amar Legal Site

### Switch to the Site:

1. **Hover "My Sites"** (top-left)

2. **Find:** "Amar Legal"

3. **Click:** "Dashboard" under Amar Legal

Now you're in the **Amar Legal site admin** (not network admin)

### Activate Theme:

1. **Go to:** Appearance → Themes
   - You'll see all network-enabled themes

2. **Find:** "Amar Legal" theme

3. **Click:** "Activate"

### Configure Theme:

Follow the **QUICKSTART.md** guide:

1. **Upload Logo:**
   - Appearance → Customize → Site Identity → Logo

2. **Add Contact Info:**
   - Appearance → Customize → Contact Information
   - Phone, Email, Address, Hours

3. **Create Pages:**
   - Pages → Add New
   - Create: Home, About, Services, Contact

4. **Set Homepage:**
   - Settings → Reading
   - Select "A static page"
   - Homepage: Home

5. **Create Menu:**
   - Appearance → Menus
   - Add pages to menu
   - Assign to "Primary Menu"

6. **Customize Hero:**
   - Appearance → Customize → Theme Options
   - Hero Title, Hero Description

7. **Click "Publish"**

✅ **Amar Legal site configured!**

### View the Site:

Visit: **bhamavision.com/amarlegal**

🎉 **Your first client site is live!**

---

## ➕ Step 12: Add More Client Sites

Repeat Steps 10-11 for each client:

### Example: Add Second Client

1. **Network Admin → Sites → Add New**

2. **Details:**
   ```
   Site Address: makeover
   Site Title: Makeover Unisex Salon
   Admin Email: contact@makeover.com
   ```

3. **Activate theme** for that site

4. **Configure** following same steps

### Your Sites:
```
bhamavision.com              → Main site
bhamavision.com/amarlegal    → Amar Legal
bhamavision.com/makeover     → Makeover Salon
bhamavision.com/radiant      → Radiant Beauty
bhamavision.com/smuk         → Smuk Salon
```

---

## 🔐 Step 13: Give Clients Admin Access (Optional)

If you want clients to manage their own content:

1. **Go to:** Network Admin → Sites

2. **Find** client's site → Click "Edit"

3. **Go to:** "Users" tab

4. **Add User:**
   - Enter client's email
   - Role: **Administrator** (full access to their site)
   - Or: **Editor** (can edit content only)

5. **Click "Add User"**

6. **Client receives email** with login credentials

Now they can log in to:
- bhamavision.com/amarlegal/wp-admin/
- And manage only their site!

---

## ⚡ Hostinger-Specific Tips

### 1. Enable Caching:

Hostinger has built-in caching:

1. **Hostinger hPanel → Website**
2. **Advanced → Cache**
3. **Enable:** LiteSpeed Cache
4. Improves performance for all sites!

### 2. SSL Certificate:

Ensure SSL is enabled for all subsites:

1. **Hostinger hPanel → Website**
2. **SSL → Manage**
3. Should show: "Active" for bhamavision.com
4. Test: https://bhamavision.com/amarlegal

### 3. Email Configuration:

For contact forms to work properly:

**Option A:** Use Hostinger's SMTP:
1. Install: **WP Mail SMTP** plugin
2. Mailer: "Other SMTP"
3. SMTP Settings:
   ```
   SMTP Host: smtp.hostinger.com
   SMTP Port: 465
   Encryption: SSL
   Username: your@bhamavision.com
   Password: your email password
   ```

**Option B:** Use Gmail SMTP (easier):
1. Use Gmail credentials in WP Mail SMTP
2. Enable "Less secure app access" in Gmail

### 4. File Permissions:

Hostinger default permissions should work, but if you have upload issues:

```
Folders: 755
Files: 644
```

Check in File Manager → Right-click → Change Permissions

### 5. PHP Version:

Ensure PHP 7.4 or higher:

1. **Hostinger hPanel → Website**
2. **Advanced → PHP Configuration**
3. **PHP Version:** Select 8.0 or 8.1 (recommended)

### 6. Database Access:

To view your database:

1. **Hostinger hPanel → Website**
2. **Databases → phpMyAdmin**
3. You'll see multisite tables:
   ```
   wp_posts          → Main site
   wp_2_posts        → Site 2 (amarlegal)
   wp_3_posts        → Site 3
   ```

---

## 🔍 Troubleshooting on Hostinger

### Issue 1: "Permalinks must be enabled" warning

**Solution:**
- Don't worry about this warning
- Continue with installation
- After setup, go to each site:
  - Settings → Permalinks
  - Click "Save Changes"

### Issue 2: Can't see .htaccess file

**Solution:**
1. File Manager → Settings (top right)
2. Check "Show Hidden Files"
3. Save and refresh

### Issue 3: 500 Internal Server Error after editing .htaccess

**Solution:**
1. Restore from backup
2. Check .htaccess syntax
3. Or restore Hostinger's default .htaccess:
   ```apache
   # BEGIN WordPress
   RewriteEngine On
   RewriteBase /
   RewriteRule ^index\.php$ - [L]
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule . /index.php [L]
   # END WordPress
   ```
4. Then try multisite .htaccess again

### Issue 4: Subsite shows 404 error

**Solution:**
1. Go to the subsite admin
2. Settings → Permalinks
3. Click "Save Changes" (don't change anything)
4. This refreshes rewrite rules
5. Visit subsite again

### Issue 5: Images not uploading

**Solution:**
1. Network Admin → Settings
2. Check "Upload Settings" → "Max upload file size"
3. Or check Hostinger PHP limits:
   - hPanel → PHP Configuration
   - upload_max_filesize: 64M
   - post_max_size: 64M

### Issue 6: Can't access Network Admin

**Solution:**
1. Clear browser cache
2. Log out and log back in
3. Go directly to: bhamavision.com/wp-admin/network/
4. Check wp-config.php has correct multisite settings

### Issue 7: Slow performance

**Solution:**
1. Enable LiteSpeed Cache (see Hostinger Tips above)
2. Install caching plugin: **LiteSpeed Cache** (works great on Hostinger)
3. Optimize images before uploading
4. Use lazy loading for images

---

## 📊 Site Structure After Setup

```
Hostinger Hosting (bhamavision.com)
├── public_html/
│   ├── wp-config.php          ← Modified for multisite
│   ├── .htaccess              ← Modified for multisite
│   ├── wp-content/
│   │   ├── themes/
│   │   │   ├── amar-legal-wordpress-theme/
│   │   │   └── other-themes/
│   │   ├── plugins/
│   │   └── uploads/           ← Shared or per-site uploads
│   └── wp-admin/

WordPress Network
├── Main Site (bhamavision.com)
├── Amar Legal (bhamavision.com/amarlegal)
├── Client 2 (bhamavision.com/makeover)
└── Client 3 (bhamavision.com/radiant)
```

---

## 🎯 Hostinger Dashboard Quick Reference

### Key Locations in Hostinger hPanel:

```
Your Website Section:
├── File Manager          → Edit wp-config.php, .htaccess
├── Backups              → Create/restore backups
├── SSL                  → Manage SSL certificates
├── Databases            → phpMyAdmin access
├── PHP Configuration    → PHP version, limits
└── Cache                → Enable LiteSpeed Cache

Website Builder:
└── Not needed (you're using WordPress)

Emails:
└── Email Accounts       → Create email accounts
```

---

## ✅ Final Checklist

After completing setup, verify:

- [ ] Multisite installed (can see "Network Admin")
- [ ] Amar Legal site created (bhamavision.com/amarlegal)
- [ ] Theme uploaded and network-enabled
- [ ] Theme activated on Amar Legal site
- [ ] Logo uploaded
- [ ] Contact info added
- [ ] Homepage set
- [ ] Menu created
- [ ] Site is accessible (no 404 errors)
- [ ] SSL working (https://)
- [ ] Contact form sends emails
- [ ] Mobile view works
- [ ] LiteSpeed Cache enabled
- [ ] Backup created

---

## 🚀 Next Steps

1. **Test the Amar Legal site thoroughly**
   - Visit: bhamavision.com/amarlegal
   - Test all features
   - Check mobile view

2. **Create more client sites**
   - Repeat Steps 10-11 for each client

3. **Migrate existing HTML sites** (optional)
   - Keep HTML in separate folder for now
   - Gradually move content to WordPress

4. **Set up regular backups**
   - Hostinger hPanel → Enable automatic backups
   - Or use UpdraftPlus plugin for scheduled backups

5. **Monitor performance**
   - Use Hostinger analytics
   - Install Google Analytics (optional)

---

## 💰 Hostinger Resources

### Performance:
- Hostinger uses **LiteSpeed servers** - very fast!
- Enable LiteSpeed Cache for best performance
- Your plan should handle 10-20 client sites easily

### Support:
If you get stuck:
1. **Hostinger Support:** Live chat 24/7
   - hPanel → Help → Chat
2. **WordPress Forums:** wordpress.org/support/
3. **Theme Documentation:** Check README.md files

### Hosting Plan:
- **Check your limits:** hPanel → Your plan details
- Most Hostinger plans support multisite
- Business/Premium plans recommended for multiple clients

---

## 📋 Quick Commands

### Access Points:

```
Main WordPress Admin:
https://bhamavision.com/wp-admin/

Network Admin:
https://bhamavision.com/wp-admin/network/

Amar Legal Site Admin:
https://bhamavision.com/amarlegal/wp-admin/

Amar Legal Site (public):
https://bhamavision.com/amarlegal/

Hostinger hPanel:
https://hpanel.hostinger.com/

Hostinger File Manager:
hPanel → Website → File Manager → public_html/
```

---

## ⚠️ Important Reminders

1. **Always backup before making changes**
2. **Test on one site before rolling out to all**
3. **Don't delete wp-config.php or .htaccess without backup**
4. **Keep WordPress, themes, and plugins updated**
5. **Use strong passwords for all admin accounts**
6. **Enable two-factor authentication** (use plugin like Wordfence)

---

## 🎉 Summary

**You now have:**
- ✅ WordPress Multisite running on Hostinger
- ✅ Multiple client sites at bhamavision.com/clientname
- ✅ Network Admin to manage all sites
- ✅ Professional setup for your clients
- ✅ Same URL structure as before
- ✅ Easy to add more clients

**Setup Time:** 1-2 hours  
**Difficulty:** Medium (but we've made it easy!)  
**Result:** Professional multi-client WordPress network

---

## 🔗 Related Documentation

- **WORDPRESS-MULTISITE-SETUP.md** - General multisite guide
- **QUICKSTART.md** - Theme setup (15 min)
- **INSTALLATION.md** - Theme installation details
- **README.md** - Theme features and customization

---

**Questions?** 
- Contact Hostinger support (24/7 chat)
- Check WordPress.org documentation
- Review the documentation files in your repository

---

**Ready to launch!** 🚀

Follow these steps and you'll have your professional WordPress multisite running on Hostinger hosting multiple client websites!
