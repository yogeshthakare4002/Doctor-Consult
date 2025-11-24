# AWS Route53 Subdomain Setup for Hostinger

Since `pharmeasy.in` is hosted on AWS, you need to add DNS records in AWS Route53 to point your subdomain to Hostinger's server.

## ✅ Good News

- **You DON'T need to change nameservers** - keep AWS nameservers
- **You DON'T need to activate nameservers** - they're already active on AWS
- **You just need to add DNS records** in Route53

## Step-by-Step: Add Subdomain DNS Record in AWS Route53

### Step 1: Get Hostinger Server IP Address

You need the IP address of your Hostinger server to point the subdomain to it.

**Method 1: From Hostinger hPanel**
1. Log into Hostinger hPanel: https://hpanel.hostinger.com
2. Go to **Domains** → **DNS Zone Editor** (or Advanced DNS)
3. Look for an A record - note the IP address
4. Or check your hosting account details for the server IP

**Method 2: From Existing Subdomain**
1. In Hostinger hPanel, check your staging subdomain DNS
2. Look at the A record for `stagingdoctorconsult.pharmeasy.in`
3. Note the IP address (likely something like `193.203.184.146`)

**Method 3: Contact Hostinger Support**
- Ask: "What is the server IP address for my hosting account?"
- They'll provide the IP you need

### Step 2: Log into AWS Route53

1. **Go to AWS Console:** https://console.aws.amazon.com
2. **Navigate to Route53:**
   - Search for "Route53" in the AWS services search bar
   - Or go to: Services → Networking & Content Delivery → Route 53

### Step 3: Find Your Hosted Zone

1. **Click "Hosted zones"** in the left sidebar
2. **Find and click on:** `pharmeasy.in`
3. This opens the DNS records for your domain

### Step 4: Create A Record for Subdomain

1. **Click "Create record"** button

2. **Configure the record:**
   ```
   Record name: online-doctor-consultation
   Record type: A - Routes traffic to an IPv4 address
   Value: [HOSTINGER_SERVER_IP]  (e.g., 193.203.184.146)
   TTL: 300 (or leave default)
   Routing policy: Simple routing
   ```

3. **Important:** 
   - Record name should be: `online-doctor-consultation` (NOT `online-doctor-consultation.pharmeasy.in`)
   - Route53 automatically appends the domain name
   - This creates: `online-doctor-consultation.pharmeasy.in`

4. **Click "Create records"**

### Step 5: Verify Record Created

After creating, you should see:
- **Name:** `online-doctor-consultation.pharmeasy.in`
- **Type:** `A`
- **Value:** `[HOSTINGER_SERVER_IP]`

## Alternative: Using CNAME Record

If you prefer CNAME (points to another domain name):

1. **Create CNAME record:**
   ```
   Record name: online-doctor-consultation
   Record type: CNAME - Routes traffic to another domain name
   Value: pharmeasy.in  (or your main domain's hostname)
   ```

**Note:** CNAME only works if your main domain already points to Hostinger. A record is usually better.

## Step 6: Wait for DNS Propagation

- DNS changes in Route53 typically propagate in **5-15 minutes**
- Can take up to 48 hours globally (but usually much faster)
- Route53 is generally faster than other DNS providers

**Check propagation:**
- https://www.whatsmydns.net/#A/online-doctor-consultation.pharmeasy.in
- Should show Hostinger server IP once propagated

## Step 7: Verify in Hostinger

1. **Log into Hostinger hPanel**
2. **Go to:** Domains → Subdomains
3. **Verify:** `online-doctor-consultation.pharmeasy.in` exists
4. **Check:** It points to correct directory: `/public_html/online-doctor-consultation`

## Complete Setup Checklist

- [ ] Get Hostinger server IP address
- [ ] Log into AWS Route53
- [ ] Find hosted zone for `pharmeasy.in`
- [ ] Create A record: `online-doctor-consultation` → [HOSTINGER_IP]
- [ ] Wait 5-15 minutes for DNS propagation
- [ ] Verify DNS record resolves correctly
- [ ] Verify subdomain exists in Hostinger hPanel
- [ ] Upload WordPress files to Hostinger
- [ ] Test access to subdomain

## Troubleshooting

### Problem: Can't Find Hosted Zone in Route53

**Solution:**
- Make sure you're in the correct AWS account
- Check if domain is in a different AWS region
- Verify you have Route53 permissions

### Problem: DNS Record Created But Not Working

**Possible causes:**
1. ⏰ Not enough time passed (wait 15-30 minutes)
2. ❌ Wrong IP address (verify Hostinger server IP)
3. ❌ Record name incorrect (should be `online-doctor-consultation` not full domain)
4. ❌ Subdomain not created in Hostinger

**Solutions:**
- Double-check the IP address is correct
- Verify record name doesn't include `.pharmeasy.in`
- Check subdomain exists in Hostinger
- Wait longer for propagation

### Problem: Don't Know Hostinger Server IP

**Solutions:**
1. Check existing subdomain DNS in Route53 (staging subdomain)
2. Contact Hostinger support
3. Check Hostinger hPanel → Account Details
4. Look at existing A records in Hostinger DNS Zone Editor

### Problem: Route53 Shows Different IP Than Expected

**Solution:**
- This is normal if you have multiple servers
- Use the IP that Hostinger provides for your specific hosting account
- The IP should match what's in Hostinger's DNS Zone Editor

## Example: Complete Route53 Record Configuration

Here's what your Route53 record should look like:

```
Hosted Zone: pharmeasy.in

Record Details:
┌─────────────────────────────────────────────────────────┐
│ Name: online-doctor-consultation.pharmeasy.in          │
│ Type: A                                                 │
│ Value: 193.203.184.146                                  │
│ TTL: 300                                                │
│ Routing Policy: Simple routing                          │
└─────────────────────────────────────────────────────────┘
```

**Note:** Replace `193.203.184.146` with your actual Hostinger server IP.

## Quick Reference: AWS Route53 Steps

1. **AWS Console** → Route53 → Hosted zones
2. **Select:** `pharmeasy.in`
3. **Create record:**
   - Name: `online-doctor-consultation`
   - Type: `A`
   - Value: `[HOSTINGER_IP]`
4. **Save** and wait 5-15 minutes
5. **Verify** DNS propagation
6. **Upload** WordPress files to Hostinger
7. **Test** subdomain access

## Summary

**Since pharmeasy.in is on AWS:**

✅ **Keep AWS nameservers** - no need to change them
✅ **Add DNS record in Route53** - A record pointing to Hostinger IP
✅ **Wait 5-15 minutes** - DNS propagation (much faster than nameserver changes)
✅ **Then proceed** - Upload WordPress files and complete installation

**This is much faster than changing nameservers!** DNS records in Route53 typically propagate in minutes, not hours.

## Next Steps After DNS Record is Added

1. ✅ Wait 5-15 minutes for DNS propagation
2. ✅ Verify DNS resolves: `nslookup online-doctor-consultation.pharmeasy.in`
3. ✅ Upload WordPress files to Hostinger
4. ✅ Complete WordPress installation
5. ✅ Set up database and import data

