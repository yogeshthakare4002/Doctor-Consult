<?php
/**
 * Doctor Profile Carousel Component
 * Displays doctor profile cards in a carousel format
 */

// Sample data for doctors
$doctors_data = array(
    array(
        'name' => 'Dr. Harleen Xo ghvghvgh ghvghv vgfg gvg gvv',
        'specialty' => 'General Physician',
        'experience' => '11 years experience',
        'languages' => 'English, Hindi',
        'qualifications' => 'MD, MBBS',
        'expertise' => 'Skin & Hair Fall-related ghvghv vghcvfgv hgghv ghgc',
        'current_price' => '₹199',
        'original_price' => '₹499',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#doctor-harleen'
    ),
    array(
        'name' => 'Dr. Sarah Johnson',
        'specialty' => 'Cardiologist',
        'experience' => '8 years experience',
        'languages' => 'English, Spanish',
        'qualifications' => 'MD, PhD',
        'expertise' => 'Heart conditions, preventive care, and cardiovascular surgery',
        'current_price' => '₹299',
        'original_price' => '₹599',
        'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
        'link' => '#doctor-sarah'
    ),
    array(
        'name' => 'Dr. Michael Chen',
        'specialty' => 'Dermatologist',
        'experience' => '12 years experience',
        'languages' => 'English, Mandarin',
        'qualifications' => 'MD, DDS',
        'expertise' => 'Skin disorders, cosmetic dermatology, and hair treatments',
        'current_price' => '₹249',
        'original_price' => '₹499',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#doctor-michael'
    ),
    array(
        'name' => 'Dr. Priya Sharma',
        'specialty' => 'Pediatrician',
        'experience' => '9 years experience',
        'languages' => 'English, Hindi, Tamil',
        'qualifications' => 'MD, MBBS',
        'expertise' => 'Child health, vaccinations, and developmental disorders',
        'current_price' => '₹179',
        'original_price' => '₹399',
        'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
        'link' => '#doctor-priya'
    ),
    array(
        'name' => 'Dr. James Wilson',
        'specialty' => 'Orthopedist',
        'experience' => '15 years experience',
        'languages' => 'English',
        'qualifications' => 'MD, MS',
        'expertise' => 'Bone fractures, joint replacements, and sports injuries',
        'current_price' => '₹349',
        'original_price' => '₹699',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#doctor-james'
    ),
    array(
        'name' => 'Dr. Lisa Anderson',
        'specialty' => 'Gynecologist',
        'experience' => '10 years experience',
        'languages' => 'English, French',
        'qualifications' => 'MD, MBBS',
        'expertise' => 'Women\'s health, pregnancy care, and hormonal disorders',
        'current_price' => '₹279',
        'original_price' => '₹549',
        'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
        'link' => '#doctor-lisa'
    )
);

// Carousel configuration
$config = array(
    'title' => 'Top doctors available',
    'view_all_text' => 'View all Doctors',
    'view_all_link' => '#all-doctors',
    'items_per_view' => 2.2,
    'card_width' => 400,
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 4000,
    'card_template' => 'doctor-profile',
    'container_class' => 'doctor-profile-carousel',
    'wrapper_class' => 'doctor-profile-wrapper'
);

// Include the carousel function
require_once get_template_directory() . '/common-components/carousel-function.php';

// Render the carousel for desktop
echo render_carousel($doctors_data, $config);

// Render mobile horizontal scroll
?>
<div class="doctor-profile-mobile-list">
    <div class="doctor-profile-mobile-header">
        <h2 class="doctor-profile-mobile-title"><?php echo esc_html($config['title']); ?></h2>
    </div>
    
    <div class="doctor-profile-mobile-scroll">
        <?php foreach ($doctors_data as $index => $doctor): ?>
            <?php 
            // Set the item and index variables for the card template
            $item = $doctor;
            $index = $index;
            // Include the existing doctor profile card template
            include get_template_directory() . '/pages/doctor-consultation/cards/doctor-profile-card.php';
            ?>
        <?php endforeach; ?>
    </div>
    
    <div class="doctor-profile-mobile-footer">
        <a href="<?php echo esc_url($config['view_all_link']); ?>" class="doctor-profile-mobile-view-all">
            View all
        </a>
    </div>
</div>

<style>
/* Doctor Profile Carousel specific styles */
.doctor-profile-carousel {
    padding: 0 20px;
    max-width: 980px;
}

.doctor-profile-carousel .carousel-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
}

.doctor-profile-carousel .carousel-view-all {
    background-color: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.doctor-profile-carousel .carousel-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Mobile Horizontal Scroll Styles */
.doctor-profile-mobile-list {
    display: none;
    margin: 0px;
}

.doctor-profile-mobile-header {
    margin-bottom: 24px;
}

.doctor-profile-mobile-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    margin: 0;
    color: #333;
}

.doctor-profile-mobile-scroll {
    display: flex;
    gap: 16px;
    overflow-x: auto;
    padding-bottom: 16px;
    margin-bottom: 24px;
    scrollbar-width: thin;
    scrollbar-color: #20B2AA #f1f1f1;
    width: 100vw;
    max-width: 100%;
    flex-wrap: nowrap;
    padding-left: 16px;
    padding-right: 16px;
    margin-right: -16px;
}

.doctor-profile-mobile-scroll::-webkit-scrollbar {
   display: none;
}

.doctor-profile-mobile-scroll::-webkit-scrollbar-track {
    display: none;
}

.doctor-profile-mobile-scroll::-webkit-scrollbar-thumb {
   display: none;
}

/* Mobile scroll container styles */
.doctor-profile-mobile-scroll .doctor-profile-card {
    flex: 0 0 280px;
    width: 280px;
    margin: 0;
    max-width: 280px;
    min-width: 280px;
    flex-shrink: 0;
}

.doctor-profile-mobile-footer {
    text-align: center;
}

.doctor-profile-mobile-view-all {
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

.doctor-profile-mobile-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Responsive Behavior */
@media (max-width: 768px) {
    /* Hide carousel on mobile */
    .doctor-profile-carousel {
        display: none;
    }
    
    /* Show mobile list on mobile */
    .doctor-profile-mobile-list {
        display: block;
    }
}
</style>
