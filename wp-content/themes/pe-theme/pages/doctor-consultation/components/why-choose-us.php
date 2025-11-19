<?php
/**
 * Why Choose Us Section
 * Static component with different layouts for desktop and mobile
 */

// Feature data
$features_data = array(
  array(
    'title' => 'Free Follow-up Post Consultation',
    'description' => 'Doctor will call you within 7 days, for free',
    'icon' => get_template_directory_uri() . '/assets/images/follow-up-phone.svg',
    'icon_bg' => 'orange-gradient',
    'card_highlight' => 'orange-border'
  ),
  array(
    'title' => '24x7 availability of Doctors',
    'description' => 'Get medical help round the clock',
    'icon' => get_template_directory_uri() . '/assets/images/doctor-availability.svg',
    'icon_bg' => 'blue-gradient',
    'card_highlight' => 'blue-border'
  ),
  array(
    'title' => 'Access to Specialists',
    'description' => 'Connect with top specialists anywhere',
    'icon' => get_template_directory_uri() . '/assets/images/specialists.svg',
    'icon_bg' => 'blue-gradient',
    'card_highlight' => 'blue-border'
  ),
  array(
    'title' => 'Cost-Effective',
    'description' => 'Affordable consultation from the comfort of your home.',
    'icon' => get_template_directory_uri() . '/assets/images/cost-effective.svg',
    'icon_bg' => 'blue-gradient',
    'card_highlight' => ''
  ),
  array(
    'title' => 'Privacy and Security',
    'description' => '100% confidential consultations.',
    'icon' => get_template_directory_uri() . '/assets/images/privacy-security.svg',
    'icon_bg' => 'blue-gradient',
    'card_highlight' => ''
  )
);
?>

<section class="why-choose-us-section">
  <div class="why-choose-us-header">
    <h2 class="why-choose-us-title">Why choose us</h2>
    <div class="title-accent"></div>
  </div>

  <div class="why-choose-us-content">
    <div class="features-row features-row-top">
      <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="feature-card <?php echo esc_attr($features_data[$i]['card_highlight']); ?>">
          <div class="feature-icon <?php echo esc_attr($features_data[$i]['icon_bg']); ?>">
            <img src="<?php echo esc_url($features_data[$i]['icon']); ?>" alt="<?php echo esc_attr($features_data[$i]['title']); ?>" width=55 height=55  />
          </div>
          <div class="feature-content">
            <h3 class="feature-title"><?php echo esc_html($features_data[$i]['title']); ?></h3>
            <p class="feature-description"><?php echo esc_html($features_data[$i]['description']); ?></p>
          </div>
        </div>
      <?php endfor; ?>
    </div>

    <div class="features-row features-row-bottom">
      <?php for ($i = 3; $i < 5; $i++): ?>
        <div class="feature-card <?php echo esc_attr($features_data[$i]['card_highlight']); ?>">
          <div class="feature-icon <?php echo esc_attr($features_data[$i]['icon_bg']); ?>">
            <img src="<?php echo esc_url($features_data[$i]['icon']); ?>" alt="<?php echo esc_attr($features_data[$i]['title']); ?>" width=50 height=55 />
          </div>
          <div class="feature-content">
            <h3 class="feature-title"><?php echo esc_html($features_data[$i]['title']); ?></h3>
            <p class="feature-description"><?php echo esc_html($features_data[$i]['description']); ?></p>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<style>
  /* Why Choose Us Section */
  .why-choose-us-section {
    padding: 24px;
    max-width: 980px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    background: linear-gradient(180deg, #FFFFFF 39.83%, #E9F2FF 100%);
    border-radius: 16px;
    border: 1px solid #E2EFF7;
  }

  .why-choose-us-header {
    margin-bottom: 40px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
  }

  .why-choose-us-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
    color: #30363C;
  }

  .title-accent {
    width: 200px;
    height: 2px;
    background: linear-gradient(90deg, #ACE0FF 1.84%, rgba(220, 228, 241, 0) 93.75%);
  }

  /* Desktop Layout */
  .why-choose-us-desktop {
    display: block;
  }

  .features-row {
    display: flex;
    gap: 24px;
  }

  .features-row-top {
    justify-content: space-between;
    margin-bottom: 32px;
  }

  .features-row-bottom {
    justify-content: space-between;
    gap: 0px;
  }

  .feature-card {
    background: white;
    border-radius: 16px;
    padding: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    flex: 1;
    max-width: 280px;
    position: relative;
    overflow: hidden;
  }

  .feature-card.orange-border::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1.4px;
    background: linear-gradient(104.04deg,
        #ffbc04 4.52%,
        rgba(255, 188, 4, 0) 8.97%),
      linear-gradient(180deg, #f3f4f5 0.54%, #b0d0f4 82.24%),
      linear-gradient(102.72deg, rgba(255, 167, 0, 0) 88.53%, #ffbc04 99.4%);
    -webkit-mask:
      linear-gradient(#fff 0 0) content-box,
      linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    z-index: 0;
  }

  .feature-card.blue-border::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1.4px;
    background: linear-gradient(180deg, #f3f4f5 0.54%, #b0d0f4 82.24%);
    -webkit-mask:
      linear-gradient(#fff 0 0) content-box,
      linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    z-index: 0;
  }

  .features-row .feature-card .feature-icon {
    position: absolute;
    bottom: 0.6px;
    right: 1px;
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
  }

  .features-row .feature-card .feature-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .feature-content {
    text-align: left;
  }

  .feature-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0;
    color: #2F446B;
  }

  .feature-description {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #6E787E;
    max-width: 70%;
  }

  .features-row-bottom .feature-card {
    flex: 1;
    max-width: none;
    border: none;
    background-color: inherit;
    box-shadow: none;
    padding: 0px;
    display: flex;
    flex-direction: row;
    gap: 12px;
  }

  .features-row-bottom .feature-card .feature-icon {
    position: relative;
    width: 56px;
    height: 56px;
  }

  .features-row-bottom .feature-content {
    width: 100%;
  }

  .features-row-bottom .feature-title {
    width: 100%;
  }

  .features-row-bottom .feature-description {
    width: 100%;
    max-width: 90%;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .why-choose-us-section {
      border: none;
      border-radius: 0px;
      padding: 12px;
    }

    .why-choose-us-header {
    margin-bottom: 24px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 8px;
  }

  .title-accent{
    width: 100px;
  }

    .features-row {
      flex-direction: column;
    }

    .features-row-top{
      flex-direction: row;
      flex-wrap: wrap;
      gap: 16px;
      column-gap: 8px;
    }

    .features-row-top .feature-card:first-child{
      width: 100%;
      flex: none;
      max-width: none;
    }
    .features-row-top .feature-card:not(:first-child) {
      width: 47.5%;
      flex: none;
    }

    .features-row-top .feature-description {
      max-width: 50%;
    }

    .features-row-bottom {
      margin-top: 16px;
      gap: 24px;
    }
  }
</style>