<?php
/**
 * Carousel Function
 * Function-based carousel component for better variable handling
 */

function render_carousel($items = array(), $config = array()) {
    // Default configuration
    $default_config = array(
        'title' => '',
        'view_all_text' => 'View all',
        'view_all_link' => '#',
        'show_view_all' => true,
        'items_per_view' => 3,
        'show_navigation' => true,
        'show_dots' => false,
        'autoplay' => false,
        'autoplay_delay' => 3000,
        'carousel_id' => 'carousel-' . uniqid(),
        'card_template' => 'default',
        'container_class' => 'carousel-container',
        'wrapper_class' => 'carousel-wrapper'
    );

    // Merge with provided config
    $config = array_merge($default_config, $config);

    // Ensure items is an array
    $items = is_array($items) ? $items : array();


    ob_start();
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
                                <p class="card-description">Items count: <?php echo count($items); ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($items as $index => $item): ?>
                        <div class="carousel-item" data-index="<?php echo esc_attr($index); ?>">
                            <?php 
                            // Load different card templates based on configuration
                            $card_filename = $config['card_template'] . '-card.php';
                            $card_directories = array(
                                get_template_directory() . '/pages/doctor-consultation/cards/' . $card_filename,
                                get_template_directory() . '/pages/disease-level/cards/' . $card_filename,
                            );

                            $template_file = null;
                            foreach ($card_directories as $card_path) {
                                if (file_exists($card_path)) {
                                    $template_file = $card_path;
                                    break;
                                }
                            }

                            if ($template_file) {
                                include $template_file;
                            } else {
                                include get_template_directory() . '/pages/doctor-consultation/cards/default-card.php';
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
    // Output carousel configuration directly in HTML
    $carousel_config = array(
        'autoplay' => $config['autoplay'],
        'autoplay_delay' => $config['autoplay_delay'],
        'items_per_view' => $config['items_per_view'],
        'card_width' => $config['card_width'] ?? 280
    );
    
    // Debug: Log the configuration
    error_log('Carousel Config Debug: ' . print_r($carousel_config, true));
    
    echo '<script type="text/javascript">';
    echo 'if (typeof window.carouselConfigs === "undefined") { window.carouselConfigs = {}; }';
    echo 'window.carouselConfigs["' . $config['carousel_id'] . '"] = ' . json_encode($carousel_config) . ';';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    if (typeof initializeCarousels === "function") {';
    echo '        initializeCarousels("' . $config['carousel_id'] . '", ' . json_encode($carousel_config) . ');';
    echo '    }';
    echo '});';
    echo '</script>';
    
    // Add component-specific CSS
    echo '<style>';
    echo '#' . $config['carousel_id'] . ' .carousel-item {';
    echo '    width: ' . ($config['card_width'] ?? 280) . 'px !important;';
    echo '    flex: 0 0 ' . ($config['card_width'] ?? 280) . 'px !important;';
    echo '    max-width: ' . ($config['card_width'] ?? 280) . 'px !important;';
    echo '}';
    echo '</style>';

    return ob_get_clean();
}
?>
