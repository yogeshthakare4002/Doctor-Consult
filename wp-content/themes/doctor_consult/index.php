<?php get_header(); ?>

<main id="main" class="site-main">
    <?php  get_template_part('includes/components/navigation/header-navigation'); ?>
    <div class="doctor-consult-page">
        <?php get_template_part('includes/components/sections/doctor-consult-banner'); ?>
        <?php get_template_part('includes/components/sections/trust-marker'); ?>
        <?php get_template_part('includes/components/cards/assurance-card-mobile'); ?>
        <div class="main-container">
            <?php get_template_part('includes/components/carousels/specialities-carousel'); ?>
            <?php get_template_part('includes/components/cards/online-consultation-promo-card'); ?>
            <?php get_template_part('includes/components/carousels/doctor-profile-carousel'); ?>
            <?php get_template_part('includes/components/carousels/top-physician-horizontal-scroll'); ?>
            <?php get_template_part('includes/components/carousels/popular-conditions'); ?>
            <?php get_template_part('includes/components/sections/booking-steps'); ?>
            <?php get_template_part('includes/components/sections/consult-info'); ?>
            <?php get_template_part('includes/components/sections/why-choose-us'); ?>
            <?php get_template_part('includes/components/sections/faq-section'); ?>
            <?php get_template_part('includes/components/carousels/reviews-section'); ?>
            
            <!-- Mobile Breadcrumb - Above Brand Footer -->
            <div class="mobile-breadcrumb-wrapper">
                <?php get_template_part('includes/components/navigation/breadcrumb'); ?>
            </div>
            
            <?php get_template_part('includes/components/footer/brand-footer'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>