<?php
/**
 * Disease Level page layout partial.
 * Appears inside the shared main container.
 */

if (!defined('ABSPATH')) {
    exit;
}

$conditions = array(
    array(
        'name' => __('Diabetes Management', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/healthcare.svg',
    ),
    array(
        'name' => __('Cardiac Care', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/doctor-availability.svg',
    ),
    array(
        'name' => __('Skin & Hair', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/doctor-3.svg',
    ),
    array(
        'name' => __('Women’s Health', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
    ),
    array(
        'name' => __('Mental Wellness', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/secure-session.svg',
    ),
    array(
        'name' => __('Child Specialist', 'doctor-consult'),
        'link' => home_url('/doctor-consultation'),
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
    ),
);
?>

<?php
get_template_part(
    'pages/doctor-consultation/components/page-header',
    null,
    array(
        'title' => get_the_title(),
        'subtitle' => __('Browse health conditions and connect with the right specialist instantly.', 'doctor-consult'),
    )
);
?>

<section class="disease-level-content">
    <div class="conditions-grid">
        <?php foreach ($conditions as $index => $condition) : ?>
            <?php
            set_query_var('item', $condition);
            set_query_var('index', $index);
            get_template_part('pages/doctor-consultation/cards/condition-card');
            ?>
        <?php endforeach; ?>
        <?php
        set_query_var('item', null);
        set_query_var('index', null);
        ?>
    </div>

    <?php get_template_part('pages/doctor-consultation/components/consult-info'); ?>
    <?php get_template_part('pages/doctor-consultation/components/faq-section'); ?>

    <div class="mobile-breadcrumb-wrapper">
        <?php get_template_part('navigation/breadcrumb'); ?>
    </div>

    <?php get_template_part('pages/doctor-consultation/components/brand-footer'); ?>
</section>

<style>
.disease-level-page .disease-level-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 48px;
}

.disease-level-page .conditions-grid {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    justify-content: center;
}

@media (max-width: 767px) {
    .disease-level-page .conditions-grid {
        padding: 0 12px;
        gap: 12px;
    }
}
</style>
