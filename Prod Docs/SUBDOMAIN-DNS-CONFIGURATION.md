# Subdomain DNS Configuration Guide

This guide explains whether you need to add DNS records for subdomains depending on where `pharmeasy.in` is hosted.

## Understanding Your Setup

There are two possible scenarios:

### Scenario 1: pharmeasy.in is Hosted on Hostinger ✅ (Most Likely)

If `pharmeasy.in` is using Hostinger's nameservers, you **DO NOT** need to add DNS records elsewhere.

**How to check:**
1. Go to your domain registrar (where you bought pharmeasy.in)
2. Check the nameservers - they should be something like:
   - `ns1.dns-parking.com`
   - `ns2.dns-parking.com`
   - Or Hostinger-specific nameservers

**If nameservers point to Hostinger:**
- ✅ Subdomains created in Hostinger hPanel work automatically
- ✅ No DNS records needed elsewhere
- ✅ Just create subdomain in Hostinger → Domains → Subdomains
- ✅ DNS propagates automatically (5-60 minutes)

### Scenario 2: pharmeasy.in is Hosted Elsewhere ⚠️ (Requires DNS Records)

If `pharmeasy.in` uses nameservers from another provider (GoDaddy, Cloudflare, AWS Route53, etc.), you **MUST** add DNS records there.

**How to check:**
1. Check nameservers at your domain registrar
2. If they're NOT Hostinger nameservers, you need to add DNS records

**If nameservers are elsewhere:**
- ⚠️ You need to add DNS records in your DNS provider
- ⚠️ Subdomain created in Hostinger won't work until DNS records are added
- ⚠️ This is why you're getting DNS errors

## How to Add DNS Records (If Needed)

### Step 1: Get Hostinger Server IP Address

1. **Log into Hostinger hPanel**
2. **Go to:** Domains → DNS Zone Editor (or Advanced DNS)
3. **Find the A record** for your main domain or subdomain
4. **Note the IP address** (e.g., `193.203.184.146`)

OR

1. **Contact Hostinger support** to get the server IP address
2. **Or check your hosting account details** for the server IP

### Step 2: Add DNS Record in Your DNS Provider

Go to where `pharmeasy.in` DNS is managed (your DNS provider) and add:

#### Option A: A Record (Recommended)

```
Type: A
Name: online-doctor-consultation
Value: [HOSTINGER_SERVER_IP]  (e.g., 193.203.184.146)
TTL: 3600 (or Auto)
```

This creates: `online-doctor-consultation.pharmeasy.in` → points to Hostinger server

#### Option B: CNAME Record (Alternative)

```
Type: CNAME
Name: online-doctor-consultation
Value: pharmeasy.in  (or your main domain's A record hostname)
TTL: 3600 (or Auto)
```

**Note:** CNAME only works if your main domain already points to Hostinger

### Step 3: Wait for DNS Propagation

- DNS changes can take **5 minutes to 48 hours** to propagate
- Check propagation: https://www.whatsmydns.net/#A/online-doctor-consultation.pharmeasy.in
- Use: `nslookup online-doctor-consultation.pharmeasy.in` in terminal

## Common DNS Providers - Where to Add Records

### If Using Cloudflare:
1. Log into Cloudflare dashboard
2. Select `pharmeasy.in` domain
3. Go to **DNS** → **Records**
4. Click **Add record**
5. Add A or CNAME record as shown above

### If Using GoDaddy:
1. Log into GoDaddy Domain Manager
2. Select `pharmeasy.in`
3. Go to **DNS** or **DNS Management**
4. Click **Add** or **Add Record**
5. Add A or CNAME record

### If Using AWS Route53:
1. Log into AWS Console
2. Go to Route53 → Hosted Zones
3. Select `pharmeasy.in`
4. Click **Create Record**
5. Add A or CNAME record

### If Using Namecheap:
1. Log into Namecheap account
2. Go to **Domain List** → select `pharmeasy.in`
3. Click **Advanced DNS**
4. Add A or CNAME record

## Verification Steps

### 1. Check Current Nameservers

```bash
# In terminal/command prompt
nslookup -type=NS pharmeasy.in
```

Or use online tool: https://www.whatsmydns.net/#NS/pharmeasy.in

### 2. Check if Subdomain Resolves

```bash
# In terminal/command prompt
nslookup online-doctor-consultation.pharmeasy.in
```

Or use: https://www.whatsmydns.net/#A/online-doctor-consultation.pharmeasy.in

**Expected result:** Should show Hostinger server IP address

### 3. Check Subdomain in Hostinger

1. Log into Hostinger hPanel
2. Go to **Domains** → **Subdomains**
3. Verify `online-doctor-consultation.pharmeasy.in` exists
4. Verify it points to correct directory

## Troubleshooting

### Problem: DNS Error (NXDOMAIN)

**Cause:** DNS record not found or not propagated

**Solution:**
1. Verify DNS record exists in your DNS provider
2. Wait for DNS propagation (up to 48 hours)
3. Check record is correct (A record with correct IP)

### Problem: Subdomain Created in Hostinger But Not Working

**Possible causes:**
1. ❌ Nameservers not pointing to Hostinger → Add DNS records
2. ❌ DNS record missing in DNS provider → Add A/CNAME record
3. ❌ DNS not propagated yet → Wait 5-60 minutes
4. ❌ Wrong IP address in DNS record → Verify Hostinger server IP

### Problem: How to Find Hostinger Server IP

**Methods:**
1. Check Hostinger hPanel → Account Details
2. Check existing A records in Hostinger DNS Zone Editor
3. Contact Hostinger support
4. Check your hosting package details

## Quick Decision Tree

```
Is pharmeasy.in using Hostinger nameservers?
│
├─ YES → ✅ No DNS records needed
│         Just create subdomain in Hostinger
│         Wait for DNS propagation (5-60 min)
│
└─ NO → ⚠️ Add DNS records in your DNS provider
        Add A record: online-doctor-consultation → [HOSTINGER_IP]
        Wait for DNS propagation (5 min - 48 hours)
```

## Summary

**Answer to your question:**

- **If pharmeasy.in uses Hostinger nameservers:** ❌ **NO**, you don't need to add DNS records elsewhere. Just create the subdomain in Hostinger.

- **If pharmeasy.in uses other nameservers:** ✅ **YES**, you must add DNS records (A or CNAME) in your DNS provider to point the subdomain to Hostinger's server.

**To find out which scenario applies:**
1. Check nameservers for pharmeasy.in
2. If they're Hostinger → No action needed
3. If they're elsewhere → Add DNS records there

## Next Steps

1. **Check nameservers** for pharmeasy.in
2. **If not Hostinger:** Add DNS A record in your DNS provider
3. **Create subdomain** in Hostinger (if not already done)
4. **Upload WordPress files** to the subdomain directory
5. **Wait for DNS propagation**
6. **Test access** to the subdomain

