<?php
/**
 * Specialities Component
 * Displays medical specialities in a carousel format
 */

// Sample data for specialities
$specialities_data = array(
    array(
        'title' => 'hello General Physician',
        'description' => 'Expert in managing common illnesses such as cold, flu, fever, infections, and general health concerns.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#general-physician'
    ),
    array(
        'title' => 'Heart Specialist',
        'description' => 'Specializes in cardiovascular diseases, heart conditions, and preventive cardiac care.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#heart-specialist'
    ),
    array(
        'title' => 'Gynaecologist',
        'description' => 'Treats women\'s health issues including PCOS, menstruation problems, and hormonal imbalances.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#gynaecologist'
    ),
    array(
        'title' => 'Dermatologist',
        'description' => 'Specializes in skin, hair, and nail conditions including acne, eczema, and skin cancer screening.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#dermatologist'
    ),
    array(
        'title' => 'Pediatrician',
        'description' => 'Provides comprehensive healthcare for infants, children, and adolescents up to 18 years.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#pediatrician'
    ),
    array(
        'title' => 'Orthopedist',
        'description' => 'Treats bone, joint, muscle, and ligament problems including fractures and sports injuries.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#orthopedist'
    ),
    array(
        'title' => 'Neurologist',
        'description' => 'Specializes in disorders of the nervous system including brain, spinal cord, and nerve conditions.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#neurologist'
    ),
    array(
        'title' => 'Psychiatrist',
        'description' => 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#psychiatrist'
    )
);

// Carousel configuration
$config = array(
    'title' => '20+ Specialities',
    'view_all_text' => 'View all Specialities',
    'view_all_link' => '#all-specialities',
    'items_per_view' => 2.5,
    'card_width' => 400, // Speciality cards need 400px width
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 4000,
    'card_template' => 'speciality',
    'container_class' => 'specialities-carousel',
    'wrapper_class' => 'specialities-wrapper'
);

// Include the carousel function
require_once get_template_directory() . '/includes/components/carousel-function.php';

// Render the carousel for desktop
echo render_carousel($specialities_data, $config);

// Render mobile list
?>
<div class="specialities-mobile-list">
    <div class="specialities-mobile-header">
        <h2 class="specialities-mobile-title"><?php echo esc_html($config['title']); ?></h2>
    </div>
    
    <div class="specialities-mobile-cards">
        <?php foreach ($specialities_data as $index => $item): ?>
                <?php 
                // Use the same card template as the carousel
                $template_file = get_template_directory() . '/includes/components/carousel-cards/speciality.php';
                if (file_exists($template_file)) {
                    include $template_file;
                }
                ?>
        <?php endforeach; ?>
    </div>
    
    <div class="specialities-mobile-footer">
        <a href="<?php echo esc_url($config['view_all_link']); ?>" class="specialities-mobile-view-all">
            View all
        </a>
    </div>
</div>

<style>
/* Specialities specific styles */
.specialities-carousel {
    padding: 0 20px;
    max-width: 980px;
    margin-bottom: 64px;
}

.specialities-carousel .carousel-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
}

.specialities-carousel .carousel-view-all {
    background-color: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.specialities-carousel .carousel-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Mobile List Styles */
.specialities-mobile-list {
    display: none;
    margin: 0;
    padding: 0 16px;
    margin-bottom: 24px;
}

.specialities-mobile-header {
    margin-bottom: 24px;
}

.specialities-mobile-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    margin: 0;
    color: #333;
}

.specialities-mobile-cards {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 24px;
}


.specialities-mobile-footer {
    text-align: center;
}

.specialities-mobile-view-all {
    width: 100%;
    display: inline-block;
    background-color: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.specialities-mobile-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Responsive Behavior */
@media (max-width: 768px) {
    /* Hide carousel on mobile */
    .specialities-carousel {
        display: none;
        margin-bottom: 0px;
    }
    
    /* Show mobile list on mobile */
    .specialities-mobile-list {
        display: block;
    }
}
</style>
