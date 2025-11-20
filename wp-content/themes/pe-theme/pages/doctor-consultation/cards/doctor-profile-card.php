<?php
/**
 * Doctor Profile Card Template for Carousel
 * Individual doctor profile card used in carousel
 */

// Get the current doctor data from the carousel loop
$doctor = $item ?? array();
$index = $index ?? 0;
?>

<section class="doctor-profile-card" data-index="<?php echo esc_attr($index); ?>">
  <div class="experience-badge"><?php echo esc_html($doctor['experience'] ?? '11 years experience'); ?></div>

  <div class="doctor-card-content">
    <div class="doctor-profile-section">
      <div class="doctor-image-container">
        <img src="<?php echo esc_url($doctor['image'] ?? get_template_directory_uri() . '/assets/images/doctor.svg'); ?>" 
             alt="<?php echo esc_attr($doctor['name'] ?? 'Dr. Harleen'); ?>" 
             class="doctor-photo" width=95 height=125 />
        <div class="profile-icon">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-icon.svg" alt="profile icon" width=10 height=10 />
        </div>
      </div>

      <div class="doctor-details">
        <h3 class="doctor-name"><?php echo esc_html($doctor['name'] ?? 'Dr. Harleen Xo ghvghvgh ghvghv vgfg gvg gvv'); ?></h3>
        <p class="doctor-specialty"><?php echo esc_html($doctor['specialty'] ?? 'General Physician'); ?></p>

        <div class="doctor-info">
          <div class="language-info">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alphabet.svg" alt="language icon" class="language-icon" width=20 height=20 />
            <span class="languages"><?php echo esc_html($doctor['languages'] ?? 'English, Hindi'); ?></span>
          </div>

          <div class="qualifications"><?php echo esc_html($doctor['qualifications'] ?? 'MD, MBBS'); ?></div>

          <span class="expertise-label">Expertise in: <span class="expertise-text"><?php echo esc_html($doctor['expertise'] ?? 'Skin & Hair Fall-related ghvghv vghcvfgv hgghv ghgc'); ?></span></span>
        </div>
      </div>
    </div>

    <div class="pricing-section">
      <div class="pricing-info">
        <span class="current-price"><?php echo esc_html($doctor['current_price'] ?? '₹199'); ?></span>
        <span class="original-price"><?php echo esc_html($doctor['original_price'] ?? '₹499'); ?></span>
      </div>

      <button class="consult-now-btn" onclick="window.location.href='<?php echo esc_url($doctor['link'] ?? '#'); ?>'">
        Book Consult
      </button>
    </div>
  </div>
</section>

<style>
  .doctor-profile-card {
    width: 100%;
    max-width: 400px;
    background: linear-gradient(135deg, #E3F2FD 0%, #F8F9FA 100%);
    border-radius: 16px;
    padding: 0;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
  }

  .experience-badge {
    background: #E2EFF7;
    text-align: center;
    padding: 8px 16px;
    padding-bottom: 16px;
    margin-bottom: -12px;
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #3661B0;
  }

  .doctor-card-content {
    background: white;
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
  }

  .doctor-profile-section {
    display: flex;
    gap: 16px;
    align-items: flex-start;
    width: 100%;
    overflow: hidden;
    box-sizing: border-box;
    padding: 16px;
    border: 1.4px solid #E6EBF4;
    background: linear-gradient(180.24deg, #FFFFFF 57.78%, #ECF9FF 99.79%);
  }

  .doctor-image-container {
    width: 96px;
    height: 128px;
    position: relative;
    flex-shrink: 0;
    border: 1px solid #EBF2FF;
    border-radius: 8px;
  }

  .doctor-photo {
    object-fit: cover;
    width: 100%;
    height: 100%;
  }

  .profile-icon {
    position: absolute;
    top: 4px;
    right: 4px;
    background: #FFFFFF;
    width: 24px;
    height: 24px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 24px 24px -8px #2A334608,
      0px 10px 10px -5px #2A334608, 
      0px 5px 5px -2.5px #2A334608, 
      0px 3px 3px -1.5px #2A33460A, 
      0px 2px 2px -1px #2A33460A,
      0px 1px 1px -0.5px #2A334608;
  }

  .doctor-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    box-sizing: border-box;
  }

  .doctor-name {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0;
    color: #30363C;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 95%;
  }

  .doctor-specialty {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #10847E;
  }

  .doctor-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-top: 8px;
    width: 100%;
    overflow: hidden;
    box-sizing: border-box;
  }

  .language-info {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .language-icon {
    background: #F3F4F6;
    color: #374151;
    width: 16px;
    height: 16px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 600;
  }

  .languages {
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #30363C;
  }

  .qualifications {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 11px;
    line-height: 16px;
    letter-spacing: 2%;
    color: #6E787E;
  }

  .expertise-label {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #6E787E;
    flex-shrink: 0;
    display: flex;
    flex-direction: row;
    gap: 4px;
    align-items: flex-start;
    overflow: hidden;
  }

  .expertise-text {
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    color: #30363C;
    flex: 1;
    min-width: 0;
    display: contents;
  }

  .pricing-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #E5E7EB;
    padding: 8px 12px;
  }

  .pricing-info {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .current-price {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0;
    color: #30363C;

  }

  .original-price {
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    text-decoration: line-through;
    color: #6E787E;
  }

  .consult-now-btn {
    background: #10847E;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(16, 132, 126, 0.2);
  }

  .consult-now-btn:hover {
    background: #1A9B94;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 132, 126, 0.3);
  }

  .consult-now-btn:active {
    transform: translateY(0);
    transition: transform 0.1s ease;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
.experience-badge{
    font-size: 12px;
}

    .doctor-profile-card {
      max-width: 100%;
      margin: 16px;
    }

    .doctor-profile-section {
      gap: 12px;
    }

    .doctor-name {
      font-size: 16px;
    }

    .doctor-specialty {
      font-size: 13px;
    }

    .current-price {
      font-size: 18px;
    }

    .consult-now-btn {
      padding: 10px 20px;
      font-size: 13px;
    }
  }
</style>