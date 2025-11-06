<?php
/**
 * Doctor Consultation Component
 * Complete consultation component with small physician cards
 */

// Sample data for physicians
$physicians_data = array(
  array(
    'name' => 'Dr. Harleen Xoa Ahlawat',
    'experience' => '15 years experience',
    'expertise' => 'ENT, Cold & Cough',
    'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
    'link' => '#doctor-harleen'
  ),
  array(
    'name' => 'Dr. Mohammad Krishna Joshi',
    'experience' => '3 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
    'link' => '#doctor-mohammad'
  ),
  array(
    'name' => 'Dr. Sharleen Singh',
    'experience' => '3 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
    'link' => '#doctor-sharleen'
  ),
  array(
    'name' => 'Dr. Rajesh Kumar',
    'experience' => '8 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
    'link' => '#doctor-rajesh'
  ),
  array(
    'name' => 'Dr. Priya Sharma',
    'experience' => '5 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
    'link' => '#doctor-priya'
  ),
  array(
    'name' => 'Dr. Rajesh Kumar',
    'experience' => '8 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor-2.svg',
    'link' => '#doctor-rajesh'
  ),
  array(
    'name' => 'Dr. Priya Sharma',
    'experience' => '5 years experience',
    'languages' => 'Hindi, English',
    'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
    'link' => '#doctor-priya'
  )
);
?>

<section class="doctor-consultation-component">
  <div class="consultation-title-section">
    <h2 class="consultation-title">Doctor consult in</h2>
    <div class="time-badge">5 mins</div>
  </div>

  <div class="consultation-content">
    <div class="physicians-scroll-container">
      <p class="consultation-content-text">Connect with our top general physician</p>
      <div class="physicians-scroll">
        <?php foreach ($physicians_data as $index => $physician): ?>
          <?php
          // Set the item and index variables for the card template
          $item = $physician;
          $index = $index;
          // Include the small physician card template
          include get_template_directory() . '/includes/components/cards/physician-card.php';
          ?>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="consultation-pricing-section">
      <div class="pricing-info">
        <div class="price-display">
          <span class="current-price">₹199</span>
          <span class="original-price">₹499</span>
        </div>
        <div class="cashback-info">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/curve.svg" alt="curve icon" class="curve-icon" />
          <span class="cashback-text">Get 5% cashback with</span>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plus.svg" alt="plus icon" class="plus-icon" />
        </div>
      </div>

      <button class="consult-now-button" onclick="window.location.href='#consultation'">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/consult-btn-bg.svg" alt="consult now button background"
          class="consult-now-button-bg" />
        <span class="button-text">Consult now</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flash.svg" alt="flash icon" class="flash-icon" />
      </button>
    </div>
  </div>
</section>

<style>
  /* Doctor Consultation Component Styles */
  .doctor-consultation-component {
    margin: 40px 0;
    padding: 0 20px;
    max-width: 980px;
    margin-left: auto;
    margin-right: auto;
  }

  .consultation-header {
    margin-bottom: 24px;
  }

  .consultation-title-section {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
  }

  .consultation-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Italic;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
    color: #30363C;
  }

  .time-badge {
    background: #45A081;
    color: white;
    padding: 4px 12px;
    border-radius: 4px;
    font-family: Inter;
    font-weight: 800;
    font-style: Italic;
    font-size: 14px;
    line-height: 18px;
    letter-spacing: 0;
    color: #FFFFFF;
  }

  .consultation-content-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0;
    color: #2F446B;

  }

  .consultation-content {
    border-radius: 16px;
    border: 1px solid #B5CDF7;
    overflow: hidden;
  }

  .physicians-scroll-container {
    padding: 12px;
    padding-bottom: 24px;
    background: linear-gradient(11deg, rgba(176, 255, 219, 0.38) 0%, rgba(242, 251, 255, 1) 50%, rgba(97, 193, 253, 0.5) 100%);
  }

  .physicians-scroll {
    display: flex;
    gap: 16px;
    overflow-x: auto;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    padding: 12px 4px;
  }

  .physicians-scroll::-webkit-scrollbar {
    display: none;
  }

  .physicians-scroll::-webkit-scrollbar-track {
    display: none;
  }

  .physicians-scroll::-webkit-scrollbar-thumb {
    display: none;
  }

  .consultation-pricing-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding: 12px;
    background: #FFFFFF;
    box-shadow: 0px 0px 3px 0px #21212114, 0px -2px 3px 0px #2121210A, 0px -1px 1px 0px #2121210F;

  }

  .consultation-pricing-section .pricing-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }

  .price-display {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .current-price {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
    color: #30363C;
  }

  .original-price {
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0;
    text-decoration: line-through;
    color: #6E787E;
  }

  .cashback-info {
    display: flex;
    align-items: center;
    gap: 4px;
    position: relative;

  }

  .curve-icon {
    width: 20px;
    height: 13px;
    position: absolute;
    top: -4px;
    left: 0px;
  }

  .plus-icon {
    width: 43px;
    height: 12px;
  }

  .cashback-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 11px;
    line-height: 16px;
    letter-spacing: 0;
    color: #8678DE;
    margin-left: 20px;
  }

  .consult-now-button {
    background: #3661B0;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 140px;
    justify-content: center;
    position: relative;
  }

  .consult-now-button-bg {
    position: absolute;
    top: 0;
    left: -32px;
    width: 100%;
    height: 100%;
  }

  .flash-icon {
    width: 11px;
    height: 16px;
  }

  .button-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 12px;
    line-height: 24px;
    letter-spacing: 0px;
    text-align: center;
    color: #FFFFFF;
  }

  .consult-now-button:hover {
    background: linear-gradient(135deg, #1D4ED8 0%, #1E40AF 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
  }

  .consult-now-button:active {
    transform: translateY(0);
    transition: transform 0.1s ease;
  }

  .lightning-icon {
    font-size: 18px;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .doctor-consultation-component {
      padding: 0px;
      width: 100%;
    }

    .consultation-title {
      font-size: 20px;
      line-height: 28px;
      margin: 0px 12px;
    }

    .consultation-subtitle {
      font-size: 14px;
      line-height: 20px;
    }

    .consultation-content {
      padding: 0px;
      margin: 12px;
    }

    .physicians-scroll {
      gap: 12px;
    }

    .consultation-pricing-section {
      flex-direction: column;
      align-items: stretch;
      gap: 16px;
    }

    .pricing-info {
      text-align: center;
    }

    .current-price {
      font-size: 20px;
      line-height: 28px;
    }

    .consult-now-button {
      width: 100%;
      padding: 14px 20px;
      font-size: 15px;
    }
  }

  @media (max-width: 480px) {
    .doctor-consultation-component {
      width: 100%;
      padding: 0px;
    }

    .consultation-content {
      padding: 0px;
      margin: 12px;
    }

    .consultation-title {
      font-size: 18px;
      line-height: 24px;
      margin: 0px 12px;
    }

    .physicians-scroll {
      gap: 10px;
    }
  }
</style>