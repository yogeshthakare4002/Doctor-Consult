<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- WordPress head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Navigation Menu Links Configuration
$nav_links = array(
    array(
        'label' => 'About Us',
        'url'   => '/about-us'
    ),
    array(
        'label' => 'Our Editorial Policy',
        'url'   => '/legal/editorial-policy'
    ),
    array(
        'label' => 'Medicines',
        'url'   => '/online-medicine-order?utm_source=doctor_consult'
    ),
    array(
        'label' => 'Lab Tests',
        'url'   => '/diagnostics?utm_source=doctor_consult'
    ),
    array(
        'label' => 'Healthcare Products',
        'url'   => '/health-care?utm_source=doctor_consult'
    )
);
?>

<!-- Main Header -->
<header class="site-header">
    <div class="header-container">
        <!-- Hamburger Menu Button (Mobile Only) -->
        <button class="hamburger-menu" aria-label="Toggle navigation menu" aria-expanded="false">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
        
        <!-- Logo -->
        <div class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                <span class="logo-icon">
                <svg width="27" height="29" viewBox="0 0 27 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15.9456 28.7085C15.325 28.6753 14.7375 28.339 14.4438 27.6283C14.1501 26.9319 14.2638 26.2544 14.8181 25.7049C15.6566 24.8758 16.5047 24.0372 17.3622 23.2271C17.6464 22.9665 17.6796 22.8102 17.3859 22.5307C16.0641 21.2799 14.7517 20.0103 13.4679 18.7169C13.1741 18.4232 13.013 18.48 12.7525 18.7406C11.9187 19.5839 11.0801 20.4177 10.2131 21.2183C9.12822 22.2085 7.45585 21.6921 7.16211 20.285C7.03894 19.7118 7.19528 19.1907 7.60271 18.788C9.00504 17.4046 10.4026 16.0165 11.8381 14.6568C12.5251 14.003 13.5437 13.9935 14.2448 14.6662C16.6942 17.0303 19.1246 19.3944 21.5549 21.7916C22.2324 22.4549 22.2324 23.445 21.5644 24.1225C20.1716 25.5201 18.7503 26.8798 17.329 28.2537C16.9974 28.5758 16.5662 28.7227 15.9456 28.7085Z" fill="#10847E"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M26.4291 9.519C26.4054 11.343 25.9316 13.0438 24.9036 14.5503C24.6193 14.9672 24.6904 15.171 25.0268 15.4599C25.5242 15.8863 25.9743 16.3696 26.4386 16.8339C27.1634 17.5777 27.1871 18.5915 26.5191 19.3116C25.8606 19.9986 24.733 20.0981 24.0224 19.4443C22.9043 18.4209 21.8052 17.3502 20.7535 16.2559C20.0665 15.55 20.1565 14.5456 20.924 13.7923C21.9426 12.7927 22.5537 11.6178 22.7527 10.2107C23.1933 7.05071 20.7535 3.95232 17.5461 3.60648C15.4663 3.38381 13.6944 3.97601 12.2021 5.45414C9.2174 8.36776 6.22797 11.2719 3.24329 14.1855C2.79321 14.6356 2.27208 14.9056 1.62777 14.8298C0.902914 14.7398 0.362826 14.3703 0.111733 13.6597C-0.134622 12.949 0.0311958 12.3189 0.561807 11.8025C2.07784 10.3149 3.59861 8.84152 5.12411 7.35865C6.74911 5.77156 8.35516 4.16078 10.0133 2.61158C15.3905 -2.40554 24.3256 0.166981 26.1448 7.24969C26.3249 7.98876 26.4291 8.74203 26.4291 9.519Z" fill="#10847E"/>
</svg>

                </span>
                <span class="logo-text">PharmEasy</span>
            </a>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="header-nav" id="headerNav">
            <ul class="nav-menu">
                <?php foreach ($nav_links as $link) : ?>
                <li class="nav-item">
                    <a href="<?php echo esc_url(home_url($link['url'])); ?>" class="nav-link">
                        <?php echo esc_html($link['label']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- Mobile Menu Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger-menu');
    const nav = document.querySelector('.header-nav');
    
    if (hamburger && nav) {
        hamburger.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Toggle aria-expanded
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle active class on hamburger
            this.classList.toggle('active');
            
            // Toggle active class on nav
            nav.classList.toggle('active');
        });
        
        // Close menu when clicking on a nav link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                nav.classList.remove('active');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });
    }
});
</script>
