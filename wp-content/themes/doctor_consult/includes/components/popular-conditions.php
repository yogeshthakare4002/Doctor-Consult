<?php
/**
 * Popular Conditions Treated Component
 * Displays medical conditions in desktop carousel and mobile flexbox wrap
 */

// Sample data for conditions
$conditions_data = array(
    array(
        'name' => 'Back pain',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#back-pain'
    ),
    array(
        'name' => 'Stress',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#stress'
    ),
    array(
        'name' => 'Indigestion',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#indigestion'
    ),
    array(
        'name' => 'Fever',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#fever'
    ),
    array(
        'name' => 'Skin rashes',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#skin-rashes'
    ),
    array(
        'name' => 'PCOS',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#pcos'
    ),
    array(
        'name' => 'Diabetes',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#diabetes'
    ),
    array(
        'name' => 'Back Pain',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#back-pain-2'
    ),
    array(
        'name' => 'Headache',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#headache'
    ),
    array(
        'name' => 'Cold & Cough',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#cold-cough'
    ),
    array(
        'name' => 'Acne',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#acne'
    ),
    array(
        'name' => 'Constipation',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#constipation'
    ),
    array(
        'name' => 'Menstrual Disorders',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#menstrual'
    ),
    array(
        'name' => 'Depression',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#depression'
    ),
    array(
        'name' => 'Thyroid',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#thyroid'
    ),
    array(
        'name' => 'Weight Loss',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#weight-loss'
    ),
    array(
        'name' => 'Allergies',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#allergies'
    ),
    array(
        'name' => 'Insomnia',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#insomnia'
    ),
    array(
        'name' => 'Joint Pain',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#joint-pain'
    ),
    array(
        'name' => 'High Blood Pressure',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#blood-pressure'
    )
);

// Carousel configuration for desktop
$carousel_config = array(
    'title' => 'Popular Conditions Treated',
    'view_all_text' => 'View all Doctors',
    'view_all_link' => '#all-doctors',
    'items_per_view' => 5,
    'card_width' => 100,
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 4000,
    'card_template' => 'condition-card',
    'container_class' => 'conditions-carousel-container',
    'wrapper_class' => 'conditions-carousel-wrapper'
);

// Include the carousel function
require_once get_template_directory() . '/includes/components/carousel-function.php';

// Render the carousel for desktop
echo render_carousel($conditions_data, $carousel_config);
?>

<!-- Mobile Flexbox View -->
<div class="conditions-mobile">
    <div class="conditions-mobile-header">
        <h2 class="conditions-mobile-title">Popular Conditions Treated</h2>
    </div>
    
    <div class="conditions-grid">
        <?php 
        // Show first 7 conditions on mobile
        for ($i = 0; $i < min(7, count($conditions_data)); $i++): 
            $condition = $conditions_data[$i];
            $item = $condition;
            $index = $i;
            include get_template_directory() . '/includes/components/carousel-cards/condition-card.php';
        endfor; 
        ?>
        <!-- 20+ more card -->
        <?php 
        $show_more_data = array(
            'name' => '20+ more',
            'icon' => get_template_directory_uri() . '/assets/images/20-more.svg',
            'link' => '#show-more'
        );
        $item = $show_more_data;
        $index = 'more';
        include get_template_directory() . '/includes/components/carousel-cards/condition-card-more.php';
        ?>
    </div>
</div>

<style>
/* Desktop Carousel View */
.conditions-carousel-container {
    margin: 60px 0;
    padding: 0 20px;
    max-width: 980px;
    margin-left: auto;
    margin-right: auto;
}

.conditions-carousel-container .carousel-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 22px;
    line-height: 28px;
    color: #30363C;
}

.conditions-carousel-container .carousel-view-all {
    background: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-family: Inter;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    transition: all 0.3s ease;
}

.conditions-carousel-container .carousel-view-all:hover {
    background: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Mobile Flexbox View */
.conditions-mobile {
    display: none;
    margin: 40px 0;
    padding: 0 16px;
}

.conditions-mobile-header {
    margin-bottom: 16px;
}

.conditions-mobile-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
    color: #30363C;
}

.conditions-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.conditions-grid .condition-card {
    flex: 0 0 76.5px;
    width: 76.5px;
    min-width: 76.5px;
    max-width: 76.5px;
    padding: 0px;
}

.conditions-grid .condition-icon {
    width: 70px;
    height: 48px;
}

.conditions-grid .condition-name {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #30363C;
}


/* Mobile Responsive */
@media (max-width: 768px) {
    /* Hide desktop carousel on mobile */
    .conditions-carousel-container {
        display: none;
    }
    
    /* Show mobile grid on mobile */
    .conditions-mobile {
        display: block;
    }
    
    .conditions-grid {
        gap: 12px;
    }
}

@media (max-width: 480px) {
    .conditions-mobile {
        padding: 0 12px;
    }
    
    .conditions-grid {
        gap: 10px;
    }
}
</style>
