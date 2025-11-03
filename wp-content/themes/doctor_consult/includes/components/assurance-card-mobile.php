<?php
/**
 * Assurance Card Mobile Component
 * Assurance card section for Doctor Consult by PharmEasy
 */
?>

<section class="assurance-card-mobile">
  <div class="card-content">
    <div class="feature-item">
      <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/secure-session.svg" alt="Verified Doctors Icon" />
      <span class="feature-text">Private and Secure sessions</span>
    </div>
    <div class="feature-item">
      <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/follow-up.svg" alt="Free Follow Up Icon" />
      <span class="feature-text">Free follow up & Cancellation</span>
    </div>
  </div>

  <img class="doctor-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-2.svg" alt="Certified Doctors Icon" />
</section>

<style>
  .assurance-card-mobile {
    display: none;
  }

  @media (max-width: 768px) {
    .assurance-card-mobile {
      height: 92px;
      display: block;
      position: relative;
      border-radius: 16px;
      margin: 16px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      gap: 12px;
      overflow: hidden;
      margin-bottom: 24px;
    }

    .assurance-card-mobile::before {
      content: '';
      position: absolute;
      inset: 0;
      padding: 1px;
      background: linear-gradient(279.29deg, #7BC3CA 4.62%, #E6EBF4 28.52%, #E6EBF4 75.16%, #7BC3CA 97.71%);
      border-radius: 16px;
    }

    .assurance-card-mobile::after {
      content: '';
      position: absolute;
      inset: 1px;
      background-color: #FFFFFF;
      border-radius: 15px;
      z-index: 1;
    }

    .assurance-card-mobile .card-content{
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 16px;
      padding: 12px;
      position: relative;
      z-index: 2;
    }

    .feature-item {
      display: flex;
      align-items: center;
    }

    .assurance-card-mobile .card-content .feature-item .feature-icon {
      width: 24px;
      height: 24px;
      margin-right: 12px;
    }

    .feature-text {
      font-family: Inter;
      font-weight: 500;
      font-style: Medium;
      font-size: 12px;
      line-height: 18px;
      letter-spacing: 0;
      color: #4F585E;
    }

    .doctor-icon {
      position: relative;
      z-index: 2;
    }
  }
</style>