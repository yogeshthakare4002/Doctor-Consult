<?php
/**
 * Doctor consultation page layout partial.
 * Appears inside the shared main container.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="doctor-consult-page">
    <?php get_template_part('pages/doctor-consultation/components/header-navigation'); ?>

    <?php get_template_part('pages/doctor-consultation/components/doctor-consult-banner'); ?>
    <?php get_template_part('pages/doctor-consultation/components/trust-marker'); ?>
    <?php get_template_part('pages/doctor-consultation/cards/assurance-card-mobile'); ?>
    <?php get_template_part('pages/doctor-consultation/components/specialities-carousel'); ?>
    <?php get_template_part('pages/doctor-consultation/cards/online-consultation-promo-card'); ?>
    <?php get_template_part('pages/doctor-consultation/components/doctor-profile-carousel'); ?>
    <?php get_template_part('pages/doctor-consultation/components/top-physician-horizontal-scroll'); ?>
    <?php get_template_part('pages/doctor-consultation/components/popular-conditions'); ?>
    <?php get_template_part('pages/doctor-consultation/cards/booking-steps'); ?>
    <?php get_template_part('pages/doctor-consultation/components/consult-info'); ?>
    <?php get_template_part('pages/doctor-consultation/components/why-choose-us'); ?>
    <?php get_template_part('pages/doctor-consultation/components/faq-section'); ?>
    <?php get_template_part('pages/doctor-consultation/components/reviews-section'); ?>

    <div class="mobile-breadcrumb-wrapper">
        <?php get_template_part('navigation/breadcrumb'); ?>
    </div>

    <?php get_template_part('pages/doctor-consultation/components/brand-footer'); ?>
</div>

<style>
.doctor-consult-page {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
