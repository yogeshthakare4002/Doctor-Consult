<?php
/**
 * Template Name: Disease Level
 * Description: Displays condition-specific information and links to doctor consultations.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main" class="site-main disease-level-page">
    <div class="main-container">
        <?php get_template_part('pages/disease-level/page-disease-level'); ?>
    </div>
</main>

<?php
get_footer();

