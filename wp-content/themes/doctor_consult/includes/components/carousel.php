<?php
/**
 * Reusable Carousel Component
 * Flexible carousel component that can be used for different content types
 * 
 * @param array $config Configuration array for the carousel
 * @param array $items Array of items to display in the carousel
 */

// Default configuration
$default_config = array(
    'title' => '20+ Specialities',
    'view_all_text' => 'View all',
    'view_all_link' => '#',
    'show_view_all' => true,
    'items_per_view' => 3,
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 3000,
    'carousel_id' => 'carousel-' . uniqid(),
    'card_template' => 'default', // default, speciality, doctor, etc.
    'container_class' => 'carousel-container',
    'wrapper_class' => 'carousel-wrapper'
);

// Merge with provided config
$config = array_merge($default_config, $config ?? array());

// Ensure items is an array
$items = $items ?? array();

?>

<section class="<?php echo esc_attr($config['container_class']); ?>" id="<?php echo esc_attr($config['carousel_id']); ?>">
    <?php if (!empty($config['title']) || ($config['show_view_all'] && !empty($config['view_all_text']))): ?>
    <div class="carousel-header">
        <?php if (!empty($config['title'])): ?>
            <h2 class="carousel-title"><?php echo esc_html($config['title']); ?></h2>
        <?php endif; ?>
        
        <?php if ($config['show_view_all'] && !empty($config['view_all_text'])): ?>
            <a href="<?php echo esc_url($config['view_all_link']); ?>" class="carousel-view-all">
                <?php echo esc_html($config['view_all_text']); ?>
            </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="carousel-content">
        <div class="carousel-track" data-items-per-view="<?php echo esc_attr($config['items_per_view']); ?>">
            <?php if (empty($items)): ?>
                <div class="carousel-item">
                    <div class="carousel-card">
                        <div class="card-content">
                            <h3 class="card-title">No items to display</h3>
                            <p class="card-description">Please add some items to the carousel.</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($items as $index => $item): ?>
                    <div class="carousel-item" data-index="<?php echo esc_attr($index); ?>">
                        <?php 
                        // Load different card templates based on configuration
                        $template_file = get_template_directory() . '/includes/components/carousel-cards/' . $config['card_template'] . '.php';
                        if (file_exists($template_file)) {
                            include $template_file;
                        } else {
                            // Default card template
                            include get_template_directory() . '/includes/components/carousel-cards/default.php';
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if ($config['show_navigation']): ?>
        <div class="carousel-navigation">
            <button class="carousel-btn carousel-prev" aria-label="Previous items">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="carousel-btn carousel-next" aria-label="Next items">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <?php endif; ?>

        <?php if ($config['show_dots']): ?>
        <div class="carousel-dots">
            <?php 
            $total_slides = ceil(count($items) / $config['items_per_view']);
            for ($i = 0; $i < $total_slides; $i++): 
            ?>
                <button class="carousel-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo esc_attr($i); ?>" aria-label="Go to slide <?php echo esc_attr($i + 1); ?>"></button>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
// Add carousel configuration to JavaScript
if (!isset($GLOBALS['carousel_configs'])) {
    $GLOBALS['carousel_configs'] = array();
}

$GLOBALS['carousel_configs'][$config['carousel_id']] = array(
    'autoplay' => $config['autoplay'],
    'autoplay_delay' => $config['autoplay_delay'],
    'items_per_view' => $config['items_per_view']
);
?>

