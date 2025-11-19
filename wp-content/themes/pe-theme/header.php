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
        'label' => 'Medicine',
        'url'   => '/online-medicine-order?utm_source=doctor_consult'
    ),
    array(
        'label' => 'Healthcare',
        'url'   => '/health-care?utm_source=doctor_consult'
    ),
    array(
        'label' => 'Lab Tests',
        'url'   => '/diagnostics/all-tests?utm_source=doctor_consult'
    ),
    array(
        'label' => 'Plus',
        'url'   => '/plus'
    ),
    array(
        'label' => 'Health Blogs',
        'url'   => '/blog/'
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
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="PharmEasy home">
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-log.svg'); ?>"
                    alt="PharmEasy"
                    class="logo-image logo-image-desktop"
                    decoding="async"
                    loading="eager"
                >
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-logo-mobile.svg'); ?>"
                    alt="PharmEasy"
                    class="logo-image logo-image-mobile"
                    decoding="async"
                    loading="eager"
                >
            </a>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="header-nav" id="headerNav" aria-hidden="true">
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
        <div class="header-nav-overlay" id="headerNavOverlay" hidden></div>
    </div>
</header>

<!-- Mobile Menu Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger-menu');
    const nav = document.querySelector('.header-nav');
    const overlay = document.getElementById('headerNavOverlay');
    const body = document.body;
    
    if (hamburger && nav) {
        const toggleNav = (shouldOpen) => {
            const willOpen = typeof shouldOpen === 'boolean' ? shouldOpen : hamburger.getAttribute('aria-expanded') !== 'true';
            
            hamburger.classList.toggle('active', willOpen);
            hamburger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            nav.classList.toggle('active', willOpen);
            nav.setAttribute('aria-hidden', willOpen ? 'false' : 'true');
            
            if (overlay) {
                overlay.classList.toggle('active', willOpen);
                overlay.toggleAttribute('hidden', !willOpen);
            }
            
            body.classList.toggle('no-scroll', willOpen);
        };
        
        hamburger.addEventListener('click', function() {
            toggleNav();
        });
        
        // Close menu when clicking on a nav link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                toggleNav(false);
            });
        });
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                toggleNav(false);
            });
        }
    }
});
</script>

