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
    <?php get_template_part('pages/doctor-consultation/components/breadcrumb-header'); ?>
    <?php get_template_part('pages/doctor-consultation/components/doctor-consult-hero-section'); ?>
    <?php get_template_part('pages/doctor-consultation/components/trust-marker'); ?>

    <div class="doctor-consult-content">
        <?php get_template_part('pages/doctor-consultation/cards/assurance-card-mobile'); ?>
        <?php get_template_part('pages/doctor-consultation/components/specialities-carousel'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/cards/online-consultation-promo-card'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/components/doctor-profile-carousel'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/components/popular-conditions'); ?>
        <div class="border-separator"></div>
        <!-- commented out top physician horizontal scroll component descoped in v0 -->
        <!-- <?php get_template_part('pages/doctor-consultation/components/top-physician-horizontal-scroll'); ?> -->
        <?php get_template_part('pages/doctor-consultation/components/consult-info'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/components/why-choose-us'); ?>
        <?php get_template_part('pages/doctor-consultation/components/booking-steps'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/components/faq-section'); ?>
        <div class="border-separator"></div>
        <?php get_template_part('pages/doctor-consultation/components/more-at-pharmeasy'); ?>
        <?php get_template_part('pages/doctor-consultation/components/reviews-section'); ?>
    </div>

    <div class="mobile-breadcrumb-wrapper">
        <?php get_template_part('common-components/breadcrumb'); ?>
    </div>

    <?php get_template_part('pages/doctor-consultation/components/pharmeasy-brand-highlight'); ?>

</div>

<style>
.doctor-consult-page {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.doctor-consult-content{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 64px;
    width: 100%;
}

@media screen and (max-width: 768px) {
    .doctor-consult-content {
        gap: 24px;
    }
}
</style>
