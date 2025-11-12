<?php
/**
 * Template Name: Doctor Consultation
 * Description: Dedicated layout for the doctor consultation experience.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main" class="site-main doctor-consult-page">
    <?php get_template_part('navigation/header-navigation'); ?>

    <div class="main-container">
        <?php get_template_part('pages/doctor-consultation/page-doctor-consultation'); ?>
    </div>
</main>

<?php
get_footer();

