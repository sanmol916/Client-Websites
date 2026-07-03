# WordPress Multisite Setup for Client Websites

## Overview
Set up WordPress Multisite to host multiple client websites like:
- `bhamavision.com/amarlegal`
- `bhamavision.com/client2`
- `bhamavision.com/client3`

Each client gets their own WordPress site with separate admin panel.

---

## Prerequisites

- [ ] WordPress installed on bhamavision.com
- [ ] Admin access to WordPress
- [ ] FTP or file manager access
- [ ] Backup of your current WordPress

---

## Step-by-Step Setup

### STEP 1: Backup Everything

Before starting, backup:
- WordPress files (via FTP)
- Database (via phpMyAdmin)
- Or use UpdraftPlus plugin

---

### STEP 2: Enable Multisite

1. **Edit wp-config.php**
   
   Add this BEFORE `/* That's all, stop editing! */`:
   
   ```php
   /* Multisite */
   define('WP_ALLOW_MULTISITE', true);
   ```

2. **Save and upload** the file

---

### STEP 3: Install Network

1. **Refresh WordPress admin** - you'll see new option

2. Go to: **Tools → Network Setup**

3. **Configure:**
   - Network Title: `Bhama Vision Client Sites`
   - Admin Email: Your email
   - Choose: **Sub-directories** (NOT subdomains!)
   
4. Click **Install**

5. **WordPress will show you code** - copy it!

---

### STEP 4: Update Configuration Files

#### A. Update wp-config.php

Add these lines BEFORE `/* That's all, stop editing! */`:

```php
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'bhamavision.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
```

**Note:** If WordPress is in a subdirectory (e.g., bhamavision.com/wordpress), adjust `PATH_CURRENT_SITE`:
```php
define('PATH_CURRENT_SITE', '/wordpress/');
```

#### B. Update .htaccess

Replace your .htaccess content with:

```apache
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
```

---

### STEP 5: Log Back In

1. **Log out** of WordPress
2. **Log back in** to wp-admin
3. You'll now see **"Network Admin"** in top left menu

---

### STEP 6: Network Configuration (Optional but Recommended)

1. Go to: **Network Admin → Settings**

2. **Configure:**
   - Registration: Disabled (or "Only site admins can add new sites")
   - New Site Settings: Default settings for new sites
   - Upload Settings: File upload limits

3. **Save Changes**

---

### STEP 7: Upload Themes (Network Level)

Themes must be uploaded to the network, then activated per site.

1. Go to: **Network Admin → Themes**

2. Click: **Add New → Upload Theme**

3. **Upload:** `amar-legal-wordpress-theme.zip`

4. Click: **Install Now**

5. **Network Enable** - Important! Click "Network Enable" link

6. Repeat for other themes

---

### STEP 8: Create First Client Site (Amar Legal)

1. Go to: **Network Admin → Sites → Add New**

2. **Fill in:**
   - **Site Address:** `amarlegal`
     (This creates: bhamavision.com/amarlegal)
   - **Site Title:** `Amar Legal`
   - **Admin Email:** client@amarlegal.in
   - **Language:** English

3. Click: **Add Site**

4. WordPress will create:
   - New database tables
   - New admin account (password sent to email)
   - Site dashboard

---

### STEP 9: Configure Client Site

1. **Switch to client site:**
   - Top menu: **My Sites → Amar Legal → Dashboard**

2. **Activate theme:**
   - Go to: **Appearance → Themes**
   - Find: "Amar Legal"
   - Click: **Activate**

3. **Configure as normal:**
   - Upload logo
   - Create pages
   - Add menu
   - Set contact info
   - Follow the QUICKSTART.md guide

---

### STEP 10: Create More Client Sites

Repeat Step 8-9 for each client:

```
Client 1: bhamavision.com/amarlegal
Client 2: bhamavision.com/client2
Client 3: bhamavision.com/makeover
Client 4: bhamavision.com/radianthair
```

Each gets their own WordPress site!

---

## Managing Multiple Sites

### Network Admin Dashboard

Access: **Network Admin** (top left menu)

**Key Sections:**

1. **Sites**
   - View all sites
   - Edit site settings
   - Delete sites
   - Visit site dashboards

2. **Users**
   - Manage all network users
   - Assign users to sites
   - Set user roles per site

3. **Themes**
   - Upload themes once
   - Network enable/disable
   - All sites can use enabled themes

4. **Plugins**
   - Upload plugins once
   - Network activate (all sites)
   - Or per-site activation

5. **Settings**
   - Network-wide settings
   - Registration settings
   - Upload limits

---

### Site Admin Dashboard

Each site has its own dashboard:

Access: **My Sites → [Site Name] → Dashboard**

**Per-Site Control:**
- Activate themes (from network-enabled themes)
- Create content (pages, posts)
- Manage menus
- Configure theme (Customizer)
- Install plugins (if allowed)

---

## Giving Clients Access

### Option 1: Full Admin Access

1. Go to: **Network Admin → Sites**
2. Click: **Edit** on client's site
3. Go to: **Users** tab
4. **Add existing user** or **Create new user**
5. Role: **Administrator** (full control of their site)

### Option 2: Limited Access

Give them **Editor** role:
- Can edit content
- Can't change theme
- Can't install plugins
- Can't manage users

---

## URL Structure

### Your Sites:
```
bhamavision.com                  → Main site
bhamavision.com/amarlegal        → Amar Legal site
bhamavision.com/client2          → Client 2 site
bhamavision.com/makeover         → Makeover Salon site
```

### Admin URLs:
```
bhamavision.com/wp-admin/               → Main site admin
bhamavision.com/amarlegal/wp-admin/     → Amar Legal admin
bhamavision.com/client2/wp-admin/       → Client 2 admin
```

### Network Admin:
```
bhamavision.com/wp-admin/network/       → Network Admin
```

---

## Converting Existing HTML Sites to WordPress

For your existing client sites (like amit-beauty-parlour), you can:

### Option 1: Create WordPress Site + Import Content

1. **Create site:** Network Admin → Sites → Add New
2. **Activate theme:** Custom theme or use Amar Legal theme
3. **Manually add content:** Copy text from HTML to WordPress pages
4. **Upload images:** Add to Media Library

### Option 2: Keep HTML, Add WordPress Gradually

1. Keep HTML in `/demos/clientname/`
2. Create WordPress version at `/clientname/`
3. Test WordPress version
4. Switch when ready

---

## File Structure

```
public_html/
├── wp-admin/
├── wp-content/
│   ├── themes/
│   │   ├── amar-legal-wordpress-theme/
│   │   ├── another-theme/
│   │   └── default-theme/
│   ├── plugins/
│   ├── uploads/           ← Shared uploads
│   └── blogs.dir/         ← Per-site uploads (if configured)
├── wp-includes/
├── wp-config.php          ← Updated with multisite config
├── .htaccess              ← Updated with multisite rules
└── index.php
```

---

## Common Issues & Solutions

### Issue 1: 404 Error After Creating Site

**Solution:**
- Go to: **Settings → Permalinks**
- Click: **Save Changes** (no need to change anything)
- This refreshes rewrite rules

### Issue 2: Can't Access Site Admin

**Solution:**
- Clear browser cache
- Try: bhamavision.com/sitename/wp-admin/
- Check .htaccess is correctly updated

### Issue 3: Theme Not Showing

**Solution:**
- Network Admin → Themes
- Ensure theme is **Network Enabled**
- Switch to site and activate

### Issue 4: Uploads Not Working

**Solution:**
- Check folder permissions: 755 for folders, 644 for files
- Check: Network Admin → Settings → Upload Settings
- Ensure upload directory is writable

### Issue 5: Plugins Not Installing

**Solution:**
- Network Admin → Settings
- Check if plugin installation is allowed
- Or install plugins at network level

---

## Plugins for Multisite

### Essential
- **UpdraftPlus** - Network-wide backups
- **Wordfence Security** - Network security
- **WP Mail SMTP** - Email configuration

### Multisite-Specific
- **Multisite Enhancements** - Better UI for network admin
- **Network Plugin Auditor** - Manage plugin activation
- **Unconfirmed** - Manage new user registrations

---

## Database Structure

Multisite creates separate tables per site:

```
wp_posts              → Main site posts
wp_2_posts            → Site 2 posts (amarlegal)
wp_3_posts            → Site 3 posts (client2)

wp_options            → Main site options
wp_2_options          → Site 2 options
wp_3_options          → Site 3 options
```

Shared tables:
- wp_users (all users)
- wp_blogs (site list)
- wp_sitemeta (network settings)

---

## Migration Checklist

### Before Multisite:
- [ ] Backup database
- [ ] Backup files
- [ ] Document current setup
- [ ] Test on staging if possible

### During Setup:
- [ ] Enable multisite in wp-config.php
- [ ] Install network
- [ ] Update wp-config.php with network code
- [ ] Update .htaccess
- [ ] Test network admin access

### After Setup:
- [ ] Upload themes to network
- [ ] Create test site
- [ ] Test theme activation
- [ ] Test content creation
- [ ] Test permalinks
- [ ] Test uploads

### For Each Client:
- [ ] Create new site
- [ ] Activate theme
- [ ] Configure settings
- [ ] Add content
- [ ] Create menus
- [ ] Test functionality
- [ ] Give client access (if needed)

---

## Performance Tips

### 1. Use Object Caching
Install Redis or Memcached for better performance

### 2. Shared Plugins
Activate common plugins at network level

### 3. CDN for Uploads
Use CDN for wp-content/uploads

### 4. Database Optimization
Regular cleanup with WP-Optimize

### 5. Separate Domains (Advanced)
Map custom domains to subsites:
- amarlegal.com → bhamavision.com/amarlegal
- Requires: WordPress MU Domain Mapping plugin

---

## Security Considerations

### 1. Restrict Registration
Network Admin → Settings → Registration: Disabled

### 2. Limit Site Creation
Only network admin can create sites

### 3. Plugin Control
Control which plugins sites can use

### 4. User Management
Regularly audit network users

### 5. Updates
Keep WordPress, themes, and plugins updated

---

## Advanced: Custom Domain Mapping

To use custom domains for subsites:

### Example:
```
amarlegal.com → bhamavision.com/amarlegal
client2.com   → bhamavision.com/client2
```

### Setup:
1. Install: **WordPress MU Domain Mapping** plugin
2. Configure DNS for custom domains
3. Map domains in Network Admin
4. Update SSL certificates

---

## Cost Comparison

### Current Setup (Static HTML):
- ✅ Free
- ❌ Manual updates
- ❌ No CMS
- ❌ Client can't edit

### WordPress Multisite:
- ✅ One hosting account
- ✅ Multiple WordPress sites
- ✅ Clients can edit content
- ✅ Professional management
- 💰 Same hosting cost!

---

## Next Steps

1. **Backup** your current WordPress
2. **Enable multisite** (Step 2-4)
3. **Create test site** (Step 8)
4. **Upload themes** (Step 7)
5. **Migrate one client** as test
6. **Repeat** for all clients

---

## Need Help?

### Resources:
- [WordPress Multisite Documentation](https://wordpress.org/support/article/create-a-network/)
- [WordPress Codex](https://codex.wordpress.org/Create_A_Network)
- Your hosting provider support

### Common Questions:
- Can I disable multisite later? **Yes**, but complex
- Can I use different domains? **Yes**, with domain mapping
- Is it slower? **No**, performance is similar
- Can clients break other sites? **No**, isolated

---

## Summary

✅ **WordPress Multisite lets you:**
- Host multiple client sites
- Use subdirectories (bhamavision.com/clientname)
- Manage all sites from one dashboard
- Give clients their own admin access
- Use different themes per site
- Share plugins and updates

✅ **Perfect for:**
- Web design agencies
- Multiple client websites
- Demo sites
- Development/staging environments

✅ **Setup time:** 30-60 minutes

---

**Ready to set up WordPress Multisite?** Follow the steps above!

**Questions?** Check WordPress documentation or contact your hosting provider.
