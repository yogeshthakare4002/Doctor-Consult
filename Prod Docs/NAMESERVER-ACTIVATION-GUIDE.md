# Nameserver Activation Guide - Critical for Production

## ⚠️ IMPORTANT: Nameservers Must Be Active First

**If nameservers are not active, your production installation will NOT work.**

The domain `pharmeasy.in` and all subdomains (like `online-doctor-consultation.pharmeasy.in`) will not resolve until nameservers are properly configured and active.

## What This Means

**Current Status:** Nameservers not active
**Impact:** 
- ❌ Domain won't resolve
- ❌ Subdomain won't work
- ❌ WordPress installation can't be accessed via URL
- ❌ DNS errors will persist

## Step-by-Step: Activate Nameservers

### Step 1: Determine Where to Configure Nameservers

Nameservers are configured at your **domain registrar** (where you purchased `pharmeasy.in`).

Common registrars:
- GoDaddy
- Namecheap
- Google Domains
- Cloudflare
- Hostinger (if domain was purchased there)
- Others

### Step 2: Get Hostinger Nameservers

If you want to use Hostinger's nameservers:

1. **Log into Hostinger hPanel**
2. **Go to:** Domains → DNS Zone Editor (or Domain Settings)
3. **Look for nameserver information** - they typically look like:
   - `ns1.dns-parking.com`
   - `ns2.dns-parking.com`
   - Or Hostinger-specific nameservers

**OR**

1. **Contact Hostinger support** and ask for:
   - "What are the nameservers for my hosting account?"
   - "I need to point my domain pharmeasy.in to Hostinger"

### Step 3: Update Nameservers at Domain Registrar

1. **Log into your domain registrar** (where you bought pharmeasy.in)

2. **Find Domain Management / DNS Settings:**
   - GoDaddy: My Products → Domains → DNS
   - Namecheap: Domain List → Manage → Advanced DNS
   - Google Domains: DNS → Name servers
   - Cloudflare: DNS → Overview

3. **Update Nameservers:**
   - Change from current nameservers (or default)
   - To Hostinger nameservers (from Step 2)
   - Save changes

4. **Example:**
   ```
   Old Nameservers: (whatever they currently are)
   
   New Nameservers:
   ns1.dns-parking.com
   ns2.dns-parking.com
   ```

### Step 4: Wait for Nameserver Propagation

**Critical:** Nameserver changes can take **24-48 hours** to fully propagate globally.

- Some locations may see changes in 5-15 minutes
- Others may take up to 48 hours
- This is normal DNS propagation behavior

**Check propagation:**
- https://www.whatsmydns.net/#NS/pharmeasy.in
- Should show Hostinger nameservers once active

## Alternative: Use Current DNS Provider

If you prefer to keep your current DNS provider (e.g., Cloudflare, Route53):

1. **Keep current nameservers** (don't change them)
2. **Add DNS records** in your current DNS provider:
   - A record: `online-doctor-consultation` → [Hostinger Server IP]
   - Or CNAME record pointing to main domain
3. **No nameserver change needed** - just DNS records

## Order of Operations (Correct Sequence)

### ❌ WRONG Order (Won't Work):
1. Upload WordPress files
2. Try to access subdomain
3. Activate nameservers later
4. **Result:** DNS errors, site won't load

### ✅ CORRECT Order:

**Phase 1: DNS Setup (Do This First)**
1. ✅ Activate/configure nameservers
2. ✅ Wait for nameserver propagation (24-48 hours)
3. ✅ Verify nameservers are active
4. ✅ Add DNS records if needed (A/CNAME for subdomain)

**Phase 2: Server Setup (After DNS is Active)**
5. ✅ Upload WordPress files to Hostinger
6. ✅ Configure wp-config.php (already done)
7. ✅ Set up database (create tables)
8. ✅ Access WordPress installation via URL

**Phase 3: WordPress Setup**
9. ✅ Complete WordPress installation
10. ✅ Import data from staging
11. ✅ Activate theme
12. ✅ Test functionality

## How to Check if Nameservers Are Active

### Method 1: Online Tool
Visit: https://www.whatsmydns.net/#NS/pharmeasy.in

**What to look for:**
- If showing Hostinger nameservers → ✅ Active
- If showing old/different nameservers → ⚠️ Not yet propagated
- If showing "No nameservers found" → ❌ Not configured

### Method 2: Command Line
```bash
nslookup -type=NS pharmeasy.in
```

**Expected output:**
```
pharmeasy.in nameserver = ns1.dns-parking.com
pharmeasy.in nameserver = ns2.dns-parking.com
```

### Method 3: Check Domain Registrar
- Log into your domain registrar
- Check nameserver settings
- Verify they're saved and active

## Timeline Estimate

| Step | Time Required |
|------|---------------|
| Update nameservers at registrar | 5 minutes |
| Nameserver propagation | 24-48 hours |
| DNS record propagation (if needed) | 5-60 minutes |
| Upload WordPress files | 30-60 minutes |
| Database setup | 15-30 minutes |
| WordPress installation | 10 minutes |
| **Total (with DNS wait)** | **~2-3 days** |
| **Total (DNS already active)** | **~2 hours** |

## What You Can Do While Waiting

While waiting for nameserver propagation:

1. ✅ **Prepare WordPress files** - Ensure all files are ready
2. ✅ **Set up database** - Create custom tables in production database
3. ✅ **Test locally** - Verify everything works on localhost
4. ✅ **Prepare staging data** - Export data to import later
5. ✅ **Documentation** - Review deployment steps

## Troubleshooting

### Problem: Nameservers Updated But Not Working

**Possible causes:**
1. ⏰ Not enough time passed (wait 24-48 hours)
2. ❌ Wrong nameservers entered (double-check)
3. ❌ Changes not saved at registrar
4. ❌ DNS cache (clear browser/DNS cache)

**Solutions:**
- Wait longer (up to 48 hours)
- Verify nameservers are correct
- Clear DNS cache: `ipconfig /flushdns` (Windows) or `sudo dscacheutil -flushcache` (Mac)
- Try different network/DNS server

### Problem: Can't Find Nameservers in Hostinger

**Solution:**
- Contact Hostinger support
- Ask: "What nameservers should I use for pharmeasy.in?"
- They'll provide the correct nameservers

### Problem: Domain Registrar Doesn't Allow Nameserver Changes

**Solution:**
- Contact your domain registrar support
- They can help you update nameservers
- Some registrars require verification first

## Summary

**To answer your question directly:**

❌ **NO, the production installation will NOT run until nameservers are active.**

**You must:**
1. ✅ Activate/configure nameservers first
2. ✅ Wait for propagation (24-48 hours)
3. ✅ Then proceed with WordPress installation

**Current Status:**
- Nameservers: ❌ Not active
- Production site: ❌ Won't work
- Next step: ✅ Activate nameservers

**Once nameservers are active:**
- Domain will resolve
- Subdomain will work
- WordPress installation can proceed
- Site will be accessible

## Quick Action Items

1. [ ] Identify where pharmeasy.in domain is registered
2. [ ] Get Hostinger nameservers (from hPanel or support)
3. [ ] Update nameservers at domain registrar
4. [ ] Wait 24-48 hours for propagation
5. [ ] Verify nameservers are active
6. [ ] Then proceed with WordPress file upload
7. [ ] Complete WordPress installation

**Don't proceed with file uploads until nameservers are active - it won't work!**

