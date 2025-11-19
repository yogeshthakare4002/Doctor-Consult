<?php
/**
 * PharmEasy Brand Highlight Component
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

<section class="pharmeasy-brand-highlight">
    <!-- Brand Header -->
    <div class="pharmeasy-brand-highlight__header">
        <div class="pharmeasy-brand-highlight__logo">
             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pharmeasy-logo.svg" alt="PharmEasy Logo" class="pharmeasy-brand-highlight__logo-image" width=70 height=64 />
             <p class="pharmeasy-logo-title">PharmEasy</p>
        </div>
        <p class="pharmeasy-brand-highlight__tagline"># ONE OF INDIA'S MOST TRUSTED HEALTHCARE PLATFORM</p>
        <p class="pharmeasy-brand-highlight__heading">Making quality healthcare easy and accessible</p>
    </div>

    <!-- Trust Markers -->
    <div class="pharmeasy-brand-highlight__trust-markers">
        <?php foreach ($trust_markers as $marker): ?>
            <div class="pharmeasy-brand-highlight__trust-marker">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="pharmeasy-brand-highlight__leaf-icon pharmeasy-brand-highlight__leaf-icon--left" width=20 height=32 />
                <div class="pharmeasy-brand-highlight__trust-content">
                    <div class="pharmeasy-brand-highlight__trust-title"><?php echo esc_html($marker['title']); ?></div>
                    <div class="pharmeasy-brand-highlight__trust-subtitle"><?php echo esc_html($marker['subtitle']); ?></div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="right leaf" class="pharmeasy-brand-highlight__leaf-icon pharmeasy-brand-highlight__leaf-icon--right" width=20 height=32  />
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Services Divider -->
    <div class="pharmeasy-brand-highlight__divider">
        <div class="pharmeasy-brand-highlight__divider-line"></div>
        <div class="pharmeasy-brand-highlight__divider-content">
          <span class="pharmeasy-brand-highlight__divider-text pharmeasy-brand-highlight__divider-text--desktop">PharmEasy Other services</span>    
          <span class="pharmeasy-brand-highlight__divider-text pharmeasy-brand-highlight__divider-text--mobile">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pharmeasy-logo.svg" alt="PharmEasy Logo" class="pharmeasy-brand-highlight__divider-logo" width=20 height=16 /> 
            <span class="pharmeasy-brand-highlight__divider-pharmeasy-label">PharmEasy</span>
            <span class="pharmeasy-brand-highlight__divider-label">Other services</span>
          </span>
        </div>
        <div class="pharmeasy-brand-highlight__divider-line pharmeasy-brand-highlight__divider-line--right"></div>
    </div>

    <!-- Services Grid -->
    <div class="pharmeasy-brand-highlight__services">
        <?php foreach ($services as $service): ?>
            <div class="pharmeasy-brand-highlight__service-card">
                <div class="pharmeasy-brand-highlight__service-name"><?php echo esc_html($service['name']); ?></div>
                <div class="pharmeasy-brand-highlight__service-icon">
                    <img src="<?php echo esc_url($service['icon']); ?>" alt="<?php echo esc_attr($service['name']); ?>"  width=75 height=65 />
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
/* PharmEasy Brand Highlight Section */
.pharmeasy-brand-highlight {
    max-width: 980px;
    width: 100%;
    margin: 0 auto;
    border-radius: 16px;
    border: 2px solid #E6EBF4;
    padding: 40px 16px;
    margin-top: 40px;
}

/* Brand Header */
.pharmeasy-brand-highlight__logo-image {
    width: 70px;
    height: 64px;
}

.pharmeasy-brand-highlight__header {
    text-align: center;
    margin-bottom: 36px;
}

.pharmeasy-brand-highlight__logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    margin-bottom: 24px;
}

.pharmeasy-logo-title{
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 40px;
    color: #10847E
}

.pharmeasy-brand-highlight__tagline {
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

.pharmeasy-brand-highlight__heading {
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
.pharmeasy-brand-highlight__trust-markers {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-bottom: 40px;
    display: none;
}

.pharmeasy-brand-highlight__trust-marker {
    display: flex;
    flex-direction: row;
    align-items: center;
    text-align: center;
}

.pharmeasy-brand-highlight__leaf-icon {
    height: 32px;
}

.pharmeasy-brand-highlight__leaf-icon--right {
    transform: scaleX(-1);
}

.pharmeasy-brand-highlight__trust-content {
    text-align: center;
}

.pharmeasy-brand-highlight__trust-title {
    font-family: Inter;
    font-weight: 700;
    font-size: 16px;
    color: #2F446B;
    margin-bottom: 4px;
}

.pharmeasy-brand-highlight__trust-subtitle {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    color: #6E787E;
}

/* Services Divider */
.pharmeasy-brand-highlight__divider {
    position: relative;
    margin-bottom: 32px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.pharmeasy-brand-highlight__divider-line {
    width: 300px;
    height: 1px;
    background: linear-gradient(270deg, #EDF2F9 0%, rgba(98, 191, 159, 0) 100%);
}

.pharmeasy-brand-highlight__divider-line--right {
    transform: rotate(180deg);
    background: linear-gradient(270deg, #EDF2F9 0%, rgba(98, 191, 159, 0) 100%);
}

.pharmeasy-brand-highlight__divider-content {
    padding: 0 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.pharmeasy-brand-highlight__divider-text--mobile {
    display: none;
}

.pharmeasy-brand-highlight__divider-content .pharmeasy-brand-highlight__logo-image {
    width: 70px;
    height: 64px;
}

.pharmeasy-brand-highlight__divider-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0;
    color: #30363C;
}

/* Services Grid */
.pharmeasy-brand-highlight__services {
   display: flex;
   flex-direction: row;
   align-items: center;
   justify-content: center;
   gap: 40px;
}

.pharmeasy-brand-highlight__service-card {
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

.pharmeasy-brand-highlight__service-name {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 10px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #30363C;
}

.pharmeasy-brand-highlight__service-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.pharmeasy-brand-highlight__service-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .pharmeasy-brand-highlight {
        padding: 40px 16px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(180deg, #F2FFF8 0%, rgba(242, 255, 248, 0) 100%),
linear-gradient(0deg, #F4F8FF, #F4F8FF);
        margin-top: 0px;
    }

    .pharmeasy-logo-title{
        font-size: 30px;
    }

    .pharmeasy-brand-highlight__logo-image{
        width: 35px;
        height: 40px;
    }

    .pharmeasy-brand-highlight__header {
        text-align: center;
        margin-bottom: 36px;
    }

    .pharmeasy-brand-highlight__logo {
        align-items: flex-start;
        justify-content: flex-start;
        margin-bottom: 12px;
    }

    .pharmeasy-brand-highlight__tagline {
        font-size: 10px;
        line-height: 16px;
        text-align: left;
        margin-bottom: 12px;
    }

    .pharmeasy-brand-highlight__heading {
        font-size: 20px;
        line-height: 28px;
        text-align: left;
        margin-bottom: 12px;
    }

    .pharmeasy-brand-highlight__trust-markers {
        display: flex;
        flex-direction: row;
        gap: 6px;
        margin-bottom: 32px;
    }

    .pharmeasy-brand-highlight__trust-marker {
        flex-direction: row;
        text-align: left;
        gap: 1px;
    }

    .pharmeasy-brand-highlight__trust-content {
        text-align: left;
    }

    .pharmeasy-brand-highlight__trust-title {
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

    .pharmeasy-brand-highlight__trust-subtitle {
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

    .pharmeasy-brand-highlight__divider {
        margin-bottom: 24px;
    }

    .pharmeasy-brand-highlight__divider-content {
        padding: 0;
        flex-direction: row;
        gap: 8px;
    }

    .pharmeasy-brand-highlight__divider-text--mobile{
        display: flex;
        gap: 4px;
    }

    .pharmeasy-brand-highlight__divider-text--desktop{
        display: none;
    }

    .pharmeasy-brand-highlight__divider-line {
        width: 50px;
    }

    .pharmeasy-brand-highlight__divider-logo{
        width: 20px;
        height: 16px;
    }

    .pharmeasy-brand-highlight__divider-pharmeasy-label{
        font-weight: 600;
        font-style: Semi Bold;
        font-size: 14px;
        color: #10847E
    }

    .pharmeasy-brand-highlight__divider-text {
        font-family: Inter;
        font-weight: 600;
        font-style: Semi Bold;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 0;
        margin-bottom: 0px;
    }

    .pharmeasy-brand-highlight__services {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        max-width: 100%;
    }

    .pharmeasy-brand-highlight__service-card {
        padding: 5px;
        padding-bottom: 0;
    }

    .pharmeasy-brand-highlight__service-name {
        font-family: Inter;
        font-weight: 600;
        font-style: Semi Bold;
        font-size: 10px;
        line-height: 16px;
        letter-spacing: 2;
        text-align: center;
        margin-bottom: 5px;
    }

    .pharmeasy-brand-highlight__service-icon img {
        width: 100%;
        height: 100%;
    }
}
</style>
