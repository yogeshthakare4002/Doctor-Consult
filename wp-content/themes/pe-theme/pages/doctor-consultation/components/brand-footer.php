<?php
/**
 * Brand Footer Component
 * PharmEasy branding section with trust markers and services
 */

// Trust markers data
$trust_markers = array(
    array(
        'title' => 'NABL & ISO',
        'subtitle' => 'Certified Labs',
        'icon' => get_template_directory_uri() . '/assets/images/trust-marker-border.svg'
    ),
    array(
        'title' => '21 LAKHS+',
        'subtitle' => 'Happy Users',
        'icon' => get_template_directory_uri() . '/assets/images/trust-marker-border.svg'
    ),
    array(
        'title' => '27 YEARS+',
        'subtitle' => 'Lab Expertise',
        'icon' => get_template_directory_uri() . '/assets/images/trust-marker-border.svg'
    )
);

// Services data
$services = array(
    array(
        'name' => 'Medicines',
        'icon' => get_template_directory_uri() . '/assets/images/medicines.svg'
    ),
    array(
        'name' => 'Lab test',
        'icon' => get_template_directory_uri() . '/assets/images/doctor-3.svg'
    ),
    array(
        'name' => 'Healthcare',
        'icon' => get_template_directory_uri() . '/assets/images/healthcare.svg'
    ),
    array(
        'name' => 'Physiotherapy',
        'icon' => get_template_directory_uri() . '/assets/images/healthcare.svg'
    ),
    array(
        'name' => 'Elder Care',
        'icon' => get_template_directory_uri() . '/assets/images/healthcare.svg'
    ),
    array(
        'name' => 'Vaccinations',
        'icon' => get_template_directory_uri() . '/assets/images/healthcare.svg'
    )
);
?>

<section class="brand-footer-section">
    <!-- Brand Header -->
    <div class="brand-header">
        <div class="brand-logo">
            <!-- <span class="brand-name">PharmEasy</span> -->
             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pharmeasy-logo.svg" alt="PharmEasy Logo" class="pharmeasy-logo-icon" />
        </div>
        <p class="brand-tagline"># ONE OF INDIA'S MOST TRUSTED HEALTHCARE PLATFORM</p>
        <h2 class="brand-heading">Making quality healthcare easy and accessible</h2>
    </div>

    <!-- Trust Markers -->
    <div class="trust-markers">
        <?php foreach ($trust_markers as $marker): ?>
            <div class="trust-marker">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon left-leaf" />
                <div class="trust-content">
                    <div class="trust-title"><?php echo esc_html($marker['title']); ?></div>
                    <div class="trust-subtitle"><?php echo esc_html($marker['subtitle']); ?></div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="right leaf" class="leaf-icon right-leaf" />
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Services Divider -->
    <div class="services-divider">
        <div class="divider-line"></div>
        <div class="divider-content">
          <span class="divider-text desktop-divider">PharmEasy Other services</span>    
          <span class="divider-text mobile-divider">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pharmeasy-logo.svg" alt="PharmEasy Logo" class="divider-logo-icon" /> 
            <span class="divider-text-mobile">Other services</span>
          </span>
        </div>
        <div class="divider-line line-right-divider"></div>
    </div>

    <!-- Services Grid -->
    <div class="services-grid">
        <?php foreach ($services as $service): ?>
            <div class="service-card">
                <div class="service-name"><?php echo esc_html($service['name']); ?></div>
                <div class="service-icon">
                    <img src="<?php echo esc_url($service['icon']); ?>" alt="<?php echo esc_attr($service['name']); ?>" />
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
/* Brand Footer Section */
.brand-footer-section {
    max-width: 980px;
    width: 100%;
    margin: 0 auto;
    border-radius: 16px;
    border: 2px solid #E6EBF4;
    padding: 40px 16px;
}

/* Brand Header */

.pharmeasy-logo-icon{
    width: 331px;
    height: 64px;
}
.brand-header {
    text-align: center;
    margin-bottom: 36px;
}

.brand-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 24px;
}

.brand-tagline {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 16px;
    leading-trim: NONE;
    line-height: 24px;
    letter-spacing: 0px;
    text-align: center;
    text-transform: uppercase;
    color: #10847E;
    margin-bottom: 24px;
}

.brand-heading {
    font-family: Inter;
    font-weight: 700;
    font-style: Bold;
    font-size: 32px;
    leading-trim: NONE;
    line-height: 150%;
    letter-spacing: 2%;
    text-align: center;
    color: #6E787E;
}

/* Trust Markers */
.trust-markers {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-bottom: 40px;
    display: none;
}

.trust-markers .trust-marker {
    display: flex;
    flex-direction: row;
    align-items: center;
    text-align: center;
}

.trust-markers .trust-marker .leaf-icon{
    height: 32px;
}

.trust-marker .right-leaf{
    transform: scaleX(-1);
}

.trust-content {
    text-align: center;
}

.trust-title {
    font-family: Inter;
    font-weight: 700;
    font-size: 16px;
    color: #2F446B;
    margin-bottom: 4px;
}

.trust-subtitle {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    color: #6E787E;
}

/* Services Divider */
.services-divider {
    position: relative;
    margin-bottom: 32px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.divider-line {
    width: 300px;
    height: 1px;
    background: linear-gradient(270deg, #EDF2F9 0%, rgba(98, 191, 159, 0) 100%);
}

.line-right-divider{
    transform: rotate(180deg);
    background: linear-gradient(270deg, #EDF2F9 0%, rgba(98, 191, 159, 0) 100%);
}

.divider-content {
    padding: 0 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.divider-content .mobile-divider{
    display: none;
}

.divider-content .pharmeasy-logo-icon{
    width: 331px;
    height: 64px;
}

.divider-icon {
    width: 20px;
    height: 20px;
}

.divider-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0;
    color: #30363C;
}

/* Services Grid */
.services-grid {
   display: flex;
   flex-direction: row;
   align-items: center;
   justify-content: center;
   gap: 40px;
}

.service-card {
    background: linear-gradient(154.96deg, #FFFFFF 27.38%, #EBF2FF 81.34%),
    linear-gradient(154.96deg, #FFFFFF 27.38%, #EBF2FF 81.34%);
    border: 1.5px solid #DCE4F1;
    width: 96px;
    height: 96px;
    border-radius: 12px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 4px;
    padding: 8px;
    padding-bottom: 0;
}

.service-name {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 10px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #30363C;
}

.service-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.service-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .brand-footer-section {
        padding: 40px 16px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(180deg, #F2FFF8 0%, rgba(242, 255, 248, 0) 100%),
linear-gradient(0deg, #F4F8FF, #F4F8FF);
    }

    .pharmeasy-logo-icon{
        width: 207px;
        height: 40px;
    }

    .brand-header {
        text-align: center;
        margin-bottom: 36px;
    }

    .brand-logo {
        align-items: flex-start;
        justify-content: flex-start;
        margin-bottom: 12px;
    }

    .brand-tagline {
        font-size: 10px;
        line-height: 16px;
        text-align: left;
        margin-bottom: 12px;
    }

    .brand-heading {
        font-size: 20px;
        line-height: 28px;
        text-align: left;
        margin-bottom: 12px;
    }

    .trust-markers {
        display: flex;
        flex-direction: row;
        gap: 6px;
        margin-bottom: 32px;
    }

    .trust-markers .trust-marker {
        flex-direction: row;
        text-align: left;
        gap: 1px;
    }

    .trust-content {
        text-align: left;
    }

    .trust-title {
        font-family: Inter;
        font-weight: 700;
        font-style: Bold;
        font-size: 10px;
        line-height: 16px;
        text-align: center;
        text-transform: uppercase;
        color: #30363C;
        margin-bottom: 0px;
    }

    .trust-subtitle {
        font-family: Inter;
        font-weight: 500;
        font-style: Medium;
        font-size: 10px;
        line-height: 16px;
        letter-spacing: 0;
        text-align: center;
        color: #6E787E;
        margin-bottom: 5px;
    }

    .services-divider {
        margin-bottom: 24px;
    }

    .divider-content {
        padding: 0;
        flex-direction: row;
        gap: 8px;
    }

    .divider-content .mobile-divider{
        display: flex;
        gap: 4px;
    }

    .divider-content .desktop-divider{
        display: none;
    }

    .divider-line {
        width: 50px;
    }

    .divider-logo-icon{
        width: 82px;
        height: 16px;
    }

    .divider-text {
        font-family: Inter;
        font-weight: 600;
        font-style: Semi Bold;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 0;
        margin-bottom: 0px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        max-width: 100%;
    }

    .service-card {
        padding: 5px;
        padding-bottom: 0;
    }

    .service-name {
        font-family: Inter;
        font-weight: 600;
        font-style: Semi Bold;
        font-size: 10px;
        line-height: 16px;
        letter-spacing: 2;
        text-align: center;
        margin-bottom: 5px;
    }

    .service-icon img {
        width: 100%;
        height: 100%;
    }
}
</style>
