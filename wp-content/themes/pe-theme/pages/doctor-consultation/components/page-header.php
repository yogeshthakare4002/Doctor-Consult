<?php
/**
 * Generic page header component.
 *
 * Expected args:
 * - title (string)
 * - subtitle (string, optional)
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = isset($args['title']) ? esc_html($args['title']) : get_the_title();
$subtitle = isset($args['subtitle']) ? wp_kses_post($args['subtitle']) : '';
?>

<section class="page-header">
    <div class="page-header__container">
        <h1 class="page-header__title"><?php echo $title; ?></h1>
        <?php if (!empty($subtitle)) : ?>
            <p class="page-header__subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
    </div>
</section>

