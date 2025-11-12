<?php 
get_header();

// Determine custom template based on current request
$custom_template_path = '';

// Always try the queried object first
$queried_object = get_queried_object();
if (is_page() && $queried_object && isset($queried_object->post_name)) {
    $custom_template_path = doctor_consult_get_page_template($queried_object->post_name);
}

// Fallback: derive slug from the request URI (handles plain permalinks, index.php/slug, etc.)
if (empty($custom_template_path)) {
    $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $request_path = trim($request_path, '/');

    // Remove leading index.php if present
    if (strpos($request_path, 'index.php/') === 0) {
        $request_path = substr($request_path, strlen('index.php/'));
    }

    if (!empty($request_path)) {
        // Only use the last segment as the slug
        $segments = explode('/', $request_path);
        $slug_from_uri = end($segments);
        $custom_template_path = doctor_consult_get_page_template($slug_from_uri);
    }
}
?>

<main id="main" class="site-main">

    <div class="main-container">
        <?php if (!empty($custom_template_path)) : ?>
            <?php 
            // Include the custom page template
            include $custom_template_path; 
            ?>
        <?php elseif (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('generic-entry'); ?>>
                    <?php the_content(); ?>
                </article>

                <div class="mobile-breadcrumb-wrapper">
                    <?php get_template_part('navigation/breadcrumb'); ?>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="mobile-breadcrumb-wrapper">
                <?php get_template_part('navigation/breadcrumb'); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>