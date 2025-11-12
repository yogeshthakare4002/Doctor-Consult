<?php
/**
 * Footer Template
 * PharmEasy footer for the doctor consultation theme
 */

// Footer navigation links configuration
$footer_company = array(
    array('label' => 'About Us', 'url' => '/about-us'),
    array('label' => 'Careers', 'url' => '/careers'),
    array('label' => 'Blog', 'url' => '/blog'),
    array('label' => 'Partner with PharmEasy', 'url' => '/partner'),
);

$footer_services = array(
    array('label' => 'Order Medicine', 'url' => '/online-medicine-order'),
    array('label' => 'Healthcare Products', 'url' => '/health-care'),
    array('label' => 'Lab Tests', 'url' => '/diagnostics'),
);

$footer_categories = array(
    array('label' => 'Must Haves', 'url' => '/categories/must-haves'),
    array('label' => 'Sports Nutrition', 'url' => '/categories/sports-nutrition'),
    array('label' => 'Elderly Care', 'url' => '/categories/elderly-care'),
    array('label' => 'Heart Care', 'url' => '/categories/heart-care'),
    array('label' => 'Personal Care', 'url' => '/categories/personal-care'),
    array('label' => 'Healthcare Devices', 'url' => '/categories/healthcare-devices'),
    array('label' => 'Health Food and Drinks', 'url' => '/categories/health-food'),
    array('label' => 'Skin Care', 'url' => '/categories/skin-care'),
    array('label' => 'Mother and Baby Care', 'url' => '/categories/mother-baby-care'),
    array('label' => 'Accessories & Wearables', 'url' => '/categories/accessories'),
    array('label' => 'Vitamins & Supplements', 'url' => '/categories/vitamins-supplements'),
    array('label' => 'Ayurvedic Care', 'url' => '/categories/ayurvedic-care'),
    array('label' => 'Sexual Wellness', 'url' => '/categories/sexual-wellness'),
    array('label' => 'Diabetic Care', 'url' => '/categories/diabetic-care'),
    array('label' => 'Health Condition', 'url' => '/categories/health-condition'),
    array('label' => 'Homeopathy Care', 'url' => '/categories/homeopathy-care'),
);

$footer_help = array(
    array('label' => 'Browse All Medicines', 'url' => '/all-medicines'),
    array('label' => 'Browse All Molecules', 'url' => '/all-molecules'),
    array('label' => 'Browse All Cities & Areas', 'url' => '/all-cities'),
    array('label' => 'FAQs', 'url' => '/faqs'),
);

$footer_policy = array(
    array('label' => 'Editorial Policy', 'url' => '/legal/editorial-policy'),
    array('label' => 'Privacy Policy', 'url' => '/legal/privacy-policy'),
    array('label' => 'Vulnerability Disclosure Policy', 'url' => '/legal/vulnerability-disclosure'),
    array('label' => 'Terms and Conditions', 'url' => '/legal/terms-and-conditions'),
    array('label' => 'Customer Support Policy', 'url' => '/legal/customer-support-policy'),
    array('label' => 'Return Policy', 'url' => '/legal/return-policy'),
    array('label' => 'Smartbuy Policy', 'url' => '/legal/smartbuy-policy'),
);

$social_links = array(
    array('name' => 'Instagram', 'url' => '#', 'icon' => 'instagram'),
    array('name' => 'Facebook', 'url' => '#', 'icon' => 'facebook'),
    array('name' => 'YouTube', 'url' => '#', 'icon' => 'youtube'),
    array('name' => 'Twitter', 'url' => '#', 'icon' => 'twitter'),
);

$payment_partners = array(
    array('name' => 'Google Pay', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/gpay.svg'),
    array('name' => 'Paytm', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/paytm.svg'),
    array('name' => 'Amazon Pay', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/amazon-pay.svg'),
    array('name' => 'PhonePe', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/phonepe.svg'),
    array('name' => 'Mobikwik', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/mobikwik.svg'),
    array('name' => 'Airtel Money', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/airtel-money.svg'),
    array('name' => 'Ola Money', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/ola-money.svg'),
    array('name' => 'Maestro', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/maestro.svg'),
    array('name' => 'Mastercard', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/mastercard.svg'),
    array('name' => 'Visa', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/visa.svg'),
    array('name' => 'Rupay', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/rupay.svg'),
    array('name' => 'Diners', 'src' => 'https://assets.pharmeasy.in/web-assets/_next/icons/diners.svg'),
);
?>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-desktop">
            <!-- Top Section - Footer Links -->
            <div class="footer-top">
                <!-- Column 1: Company & Our Services -->
                <div class="footer-column">
                    <div class="footer-section">
                        <h3 class="footer-heading">Company</h3>
                        <ul class="footer-links">
                            <?php foreach ($footer_company as $link) : ?>
                            <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="footer-section">
                        <h3 class="footer-heading">Our Services</h3>
                        <ul class="footer-links">
                            <?php foreach ($footer_services as $link) : ?>
                            <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Column 2: Featured Categories -->
                <div class="footer-column">
                    <div class="footer-section">
                        <h3 class="footer-heading">Featured Categories</h3>
                        <ul class="footer-links">
                            <?php foreach ($footer_categories as $link) : ?>
                            <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Column 3: Need Help & Policy Info -->
                <div class="footer-column">
                    <div class="footer-section">
                        <h3 class="footer-heading">Need Help</h3>
                        <ul class="footer-links">
                            <?php foreach ($footer_help as $link) : ?>
                            <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="footer-section">
                        <h3 class="footer-heading">Policy Info</h3>
                        <ul class="footer-links">
                            <?php foreach ($footer_policy as $link) : ?>
                            <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Column 4: Follow Us -->
                <div class="footer-column">
                    <div class="footer-section">
                        <h3 class="footer-heading">FOLLOW US</h3>
                        <div class="social-links">
                            <?php foreach ($social_links as $social) : ?>
                            <a href="<?php echo esc_url($social['url']); ?>" class="social-icon" aria-label="<?php echo esc_attr($social['name']); ?>">
                                <?php if ($social['icon'] === 'instagram') : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                <?php elseif ($social['icon'] === 'facebook') : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                <?php elseif ($social['icon'] === 'youtube') : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                <?php elseif ($social['icon'] === 'twitter') : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section - Payment Partners & Copyright -->
            <div class="footer-bottom">
                <div class="payment-partners">
                    <h3 class="footer-heading">Our Payment Partners</h3>
                    <div class="payment-logos">
                        <?php foreach ($payment_partners as $partner) : ?>
                        <div class="payment-logo">
                            <img src="<?php echo esc_url($partner['src']); ?>" 
                                 alt="<?php echo esc_attr($partner['name']); ?>" 
                                 loading="lazy"
                                 width="40"
                                 height="24">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="footer-copyright">
                    <p>&copy; <?php echo date('Y'); ?> PharmEasy. All Rights Reserved</p>
                </div>
            </div>
        </div>

        <div class="footer-mobile">
            <?php
            $mobile_sections = array(
                'Company' => $footer_company,
                'Our Services' => $footer_services,
                'Featured Categories' => $footer_categories,
                'Need Help' => $footer_help,
                'Policy Info' => $footer_policy,
            );
            ?>

            <div class="mobile-accordion">
                <?php foreach ($mobile_sections as $section_title => $links) : ?>
                <details class="mobile-footer-section">
                    <summary><?php echo esc_html($section_title); ?></summary>
                    <ul class="mobile-footer-links">
                        <?php foreach ($links as $link) : ?>
                        <li><a href="<?php echo esc_url(home_url($link['url'])); ?>"><?php echo esc_html($link['label']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </details>
                <?php endforeach; ?>
            </div>

            <div class="mobile-download">
                <h3 class="mobile-heading">Download the App for Free</h3>
                <div class="store-badges">
                    <a class="store-badge" href="https://play.google.com/store/apps/details?id=com.phonegap.rxpal" target="_blank" rel="noopener noreferrer">
                        <img src="https://assets.pharmeasy.in/apothecary/images/googlePlay.svg?dim=360x0" alt="Get it on Google Play" loading="lazy" width="142" height="42">
                    </a>
                    <a class="store-badge" href="https://apps.apple.com/in/app/pharmeasy-medicine-delivery/id982432643" target="_blank" rel="noopener noreferrer">
                        <img src="https://assets.pharmeasy.in/apothecary/images/appStore.svg?dim=256x0" alt="Download on the App Store" loading="lazy" width="142" height="42">
                    </a>
                </div>
            </div>

            <div class="mobile-social">
                <h3 class="mobile-heading">Follow us on</h3>
                <div class="social-links">
                    <?php foreach ($social_links as $social) : ?>
                    <a href="<?php echo esc_url($social['url']); ?>" class="social-icon" aria-label="<?php echo esc_attr($social['name']); ?>">
                        <?php if ($social['icon'] === 'instagram') : ?>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        <?php elseif ($social['icon'] === 'facebook') : ?>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        <?php elseif ($social['icon'] === 'youtube') : ?>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        <?php elseif ($social['icon'] === 'twitter') : ?>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        <?php endif; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mobile-payments">
                <h3 class="mobile-heading">Our Payment Partners</h3>
                <div class="payment-logos">
                    <?php foreach ($payment_partners as $partner) : ?>
                    <div class="payment-logo">
                        <img src="<?php echo esc_url($partner['src']); ?>" 
                             alt="<?php echo esc_attr($partner['name']); ?>" 
                             loading="lazy"
                             width="40"
                             height="24">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mobile-copyright">
                <p>&copy; <?php echo date('Y'); ?> PharmEasy. All Rights Reserved</p>
            </div>
        </div>
    </div>

    <div class="mobile-sticky-cta">
        <a href="<?php echo esc_url(home_url('/consultation-booking')); ?>" class="mobile-sticky-button">
            Book consultation starting at &#8377;199
        </a>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>