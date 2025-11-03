<?php
/**
 * Top Physician Card Template for Horizontal Scroll
 * Individual physician card used in horizontal scroll
 */

// Get the current physician data from the loop
$physician = $item ?? array();
$index = $index ?? 0;
?>

<section class="top-physician-card" data-index="<?php echo esc_attr($index); ?>">
  <div class="physician-card-content">
    <div class="physician-header">
      <div class="physician-image-container">
        <img src="<?php echo esc_url($physician['image'] ?? get_template_directory_uri() . '/assets/images/doctor.svg'); ?>" 
             alt="<?php echo esc_attr($physician['name'] ?? 'Dr. Harleen'); ?>" 
             class="physician-photo" />
        <div class="online-indicator"></div>
      </div>
      
      <div class="physician-basic-info">
        <h3 class="physician-name"><?php echo esc_html($physician['name'] ?? 'Dr. Harleen Singh'); ?></h3>
        <p class="physician-specialty"><?php echo esc_html($physician['specialty'] ?? 'General Physician'); ?></p>
        <div class="physician-experience"><?php echo esc_html($physician['experience'] ?? '11 years experience'); ?></div>
      </div>
    </div>

    <div class="physician-stats">
      <div class="stat-item">
        <div class="stat-value"><?php echo esc_html($physician['rating'] ?? '4.8'); ?></div>
        <div class="stat-label">Rating</div>
      </div>
      <div class="stat-item">
        <div class="stat-value"><?php echo esc_html($physician['patients'] ?? '2.5k+'); ?></div>
        <div class="stat-label">Patients</div>
      </div>
      <div class="stat-item">
        <div class="stat-value"><?php echo esc_html($physician['response_time'] ?? '5 min'); ?></div>
        <div class="stat-label">Response</div>
      </div>
    </div>

    <div class="physician-details">
      <div class="language-info">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alphabet.svg" alt="language icon" class="language-icon" />
        <span class="languages"><?php echo esc_html($physician['languages'] ?? 'English, Hindi'); ?></span>
      </div>
      
      <div class="qualifications"><?php echo esc_html($physician['qualifications'] ?? 'MD, MBBS'); ?></div>
      
      <div class="expertise-section">
        <span class="expertise-label">Expertise:</span>
        <span class="expertise-text"><?php echo esc_html($physician['expertise'] ?? 'Skin & Hair Fall-related treatments'); ?></span>
      </div>
    </div>

    <div class="physician-pricing">
      <div class="pricing-info">
        <span class="current-price"><?php echo esc_html($physician['current_price'] ?? '₹199'); ?></span>
        <span class="original-price"><?php echo esc_html($physician['original_price'] ?? '₹499'); ?></span>
      </div>
      
      <button class="consult-now-btn" onclick="window.location.href='<?php echo esc_url($physician['link'] ?? '#'); ?>'">
        Consult Now
      </button>
    </div>
  </div>
</section>

<style>
  .top-physician-card {
    flex: 0 0 320px;
    width: 320px;
    min-width: 320px;
    background: linear-gradient(135deg, #FFFFFF 0%, #F8FAFC 100%);
    border-radius: 16px;
    padding: 0;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid #E5E7EB;
    transition: all 0.3s ease;
    margin: 0;
  }

  .top-physician-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    border-color: #20B2AA;
  }

  .physician-card-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    background: white;
    border-radius: 16px;
    overflow: hidden;
  }

  .physician-header {
    display: flex;
    gap: 16px;
    align-items: flex-start;
    padding: 20px;
    background: linear-gradient(180deg, #FFFFFF 0%, #F8FAFC 100%);
    border-bottom: 1px solid #F3F4F6;
  }

  .physician-image-container {
    width: 80px;
    height: 80px;
    position: relative;
    flex-shrink: 0;
    border: 2px solid #E5E7EB;
    border-radius: 12px;
    overflow: hidden;
  }

  .physician-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .online-indicator {
    position: absolute;
    bottom: 4px;
    right: 4px;
    width: 12px;
    height: 12px;
    background: #10B981;
    border: 2px solid white;
    border-radius: 50%;
  }

  .physician-basic-info {
    flex: 1;
    min-width: 0;
  }

  .physician-name {
    font-family: Inter;
    font-weight: 600;
    font-size: 16px;
    line-height: 24px;
    color: #1F2937;
    margin: 0 0 4px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .physician-specialty {
    font-family: Inter;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    color: #20B2AA;
    margin: 0 0 6px 0;
  }

  .physician-experience {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #6B7280;
    background: #F3F4F6;
    padding: 4px 8px;
    border-radius: 6px;
    display: inline-block;
  }

  .physician-stats {
    display: flex;
    justify-content: space-around;
    padding: 16px 20px;
    background: #F8FAFC;
    border-bottom: 1px solid #F3F4F6;
  }

  .stat-item {
    text-align: center;
  }

  .stat-value {
    font-family: Inter;
    font-weight: 700;
    font-size: 18px;
    line-height: 24px;
    color: #1F2937;
    margin-bottom: 2px;
  }

  .stat-label {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #6B7280;
  }

  .physician-details {
    padding: 16px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .language-info {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .language-icon {
    width: 16px;
    height: 16px;
    background: #F3F4F6;
    border-radius: 4px;
    padding: 2px;
  }

  .languages {
    font-family: Inter;
    font-weight: 500;
    font-size: 13px;
    line-height: 18px;
    color: #374151;
  }

  .qualifications {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #6B7280;
    background: #F9FAFB;
    padding: 6px 10px;
    border-radius: 6px;
    border-left: 3px solid #20B2AA;
  }

  .expertise-section {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .expertise-label {
    font-family: Inter;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    color: #6B7280;
  }

  .expertise-text {
    font-family: Inter;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #374151;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .physician-pricing {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    background: #F8FAFC;
    border-top: 1px solid #F3F4F6;
  }

  .pricing-info {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .current-price {
    font-family: Inter;
    font-weight: 700;
    font-size: 18px;
    line-height: 24px;
    color: #1F2937;
  }

  .original-price {
    font-family: Inter;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    text-decoration: line-through;
    color: #9CA3AF;
  }

  .consult-now-btn {
    background: linear-gradient(135deg, #20B2AA 0%, #1A9B94 100%);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-family: Inter;
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(32, 178, 170, 0.2);
  }

  .consult-now-btn:hover {
    background: linear-gradient(135deg, #1A9B94 0%, #10847E 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(32, 178, 170, 0.3);
  }

  .consult-now-btn:active {
    transform: translateY(0);
    transition: transform 0.1s ease;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .top-physician-card {
      flex: 0 0 280px;
      width: 280px;
      min-width: 280px;
    }

    .physician-header {
      padding: 16px;
      gap: 12px;
    }

    .physician-image-container {
      width: 70px;
      height: 70px;
    }

    .physician-name {
      font-size: 15px;
      line-height: 22px;
    }

    .physician-specialty {
      font-size: 13px;
      line-height: 18px;
    }

    .physician-stats {
      padding: 12px 16px;
    }

    .stat-value {
      font-size: 16px;
      line-height: 22px;
    }

    .physician-details {
      padding: 12px 16px;
    }

    .physician-pricing {
      padding: 12px 16px;
    }

    .current-price {
      font-size: 16px;
      line-height: 22px;
    }

    .consult-now-btn {
      padding: 8px 16px;
      font-size: 13px;
    }
  }

  @media (max-width: 480px) {
    .top-physician-card {
      flex: 0 0 260px;
      width: 260px;
      min-width: 260px;
    }

    .physician-header {
      padding: 14px;
    }

    .physician-image-container {
      width: 60px;
      height: 60px;
    }

    .physician-name {
      font-size: 14px;
      line-height: 20px;
    }

    .physician-specialty {
      font-size: 12px;
      line-height: 16px;
    }
  }
</style>
