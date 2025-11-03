<?php get_header(); ?>

<main id="main" class="site-main">
    <?php  get_template_part('includes/components/header-navigation'); ?>
    <div class="doctor-consult-page">
        <?php get_template_part('includes/components/doctor-consult-banner'); ?>
        <?php get_template_part('includes/components/trust-marker'); ?>
        <?php get_template_part('includes/components/assurance-card-mobile'); ?>
        <div class="main-container">
            <?php get_template_part('includes/components/specialities-carousel'); ?>
            <?php get_template_part('includes/components/online-consultation-promo-card'); ?>
            <?php get_template_part('includes/components/doctor-profile-carousel'); ?>
            <?php get_template_part('includes/components/top-physician-horizontal-scroll'); ?>
            <?php get_template_part('includes/components/popular-conditions'); ?>
            <?php get_template_part('includes/components/booking-steps'); ?>
            <?php get_template_part('includes/components/consult-info'); ?>
            <?php get_template_part('includes/components/why-choose-us'); ?>
            <?php get_template_part('includes/components/faq-section'); ?>
            <?php get_template_part('includes/components/reviews-section'); ?>
            <?php get_template_part('includes/components/brand-footer'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>