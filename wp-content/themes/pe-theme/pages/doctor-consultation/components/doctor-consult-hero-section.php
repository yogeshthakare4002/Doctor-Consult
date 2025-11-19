<?php
/**
 * Doctor Consult Hero Section
 * Responsive hero section for Doctor Consult by PharmEasy
 */
?>

<section class="doctor-consult-hero">
  <div class="doctor-consult-hero-container">
    <div class="doctor-consult-hero-content">
      <div class="doctor-consult-hero-branding">
        <img class="doctor-consult-hero-logo" 
          src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor.svg" 
          alt="doctor Logo"
          width=30
          height=30
        />
        <div class="doctor-consult-hero-brand-text">
          <p class="doctor-consult-hero-brand-title">Doctor Consult</p>
          <p class="doctor-consult-hero-brand-subtitle">by <b>PharmEasy</b></p>
        </div>
      </div>

      <h1 class="doctor-consult-hero-headings">
        <span class="doctor-consult-hero-heading-primary">Consult Certified Doctors</span>
        <span class="doctor-consult-hero-heading-secondary">Online - 24/7 Access</span>
      </h1>

      <p class="doctor-consult-hero-service-text">Video/Audio call • Starting at just ₹199</p>

      <button class="doctor-consult-hero-cta">Consult now</button>

      <div class="doctor-consult-hero-feature-list">
        <div class="doctor-consult-hero-feature-item">
          <img class="doctor-consult-hero-feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/secure-session.svg" alt="Verified Doctors Icon" width=20 height=20/>
          <span class="doctor-consult-hero-feature-text">Private and Secure sessions</span>
        </div>
        <div class="doctor-consult-hero-feature-item">
          <img class="doctor-consult-hero-feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/follow-up.svg" alt="Free Follow Up Icon" width=20 height=20/>
          <span class="doctor-consult-hero-feature-text">Free follow up & Cancellation</span>
        </div>
      </div>
    </div>

    <div class="doctor-consult-hero-visuals">
      <img class="doctor-consult-hero-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image.svg" alt="Banner Image" width=280 height=200/>
      <img class="doctor-consult-hero-image-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image-bg.svg" alt="Banner Image bg" width=400 height=270/>
    </div>
  </div>
</section>

<style>
.doctor-consult-hero {
  width: 100%;
  background: linear-gradient(135deg, #1A2B4D 0%, #2D4A6B 100%);
  position: relative;
  overflow: hidden;
}

.doctor-consult-hero-container {
  max-width: 928px;
  padding: 40px 0px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  gap: 60px;
  position: relative;
  z-index: 2;
}

.doctor-consult-hero-content {
  flex: 1;
  color: white;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.doctor-consult-hero-branding {
  display: flex;
  flex-direction: row;
  gap: 8px;
}

.doctor-consult-hero-logo {
  width: 30px;
  height: 30px;
}

.doctor-consult-hero-brand-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.doctor-consult-hero-brand-title {
  font-size: 12px;
  line-height: 11px;
  font-weight: 700;
  color: white;
  margin: 0;
}

.doctor-consult-hero-brand-subtitle {
  font-size: 8px;
  color: white;
  margin: 0;
  font-weight: 400;
}

.doctor-consult-hero-headings {
  font-family: 'DM Serif Display', serif;
  font-weight: 400;
  font-style: italic;
  font-size: 32px;
  line-height: 40px;
  letter-spacing: 0;
  display: flex;
  flex-direction: column;
}

.doctor-consult-hero-headings .doctor-consult-hero-heading-primary{
  color: #FFD700;
}

.doctor-consult-hero-headings .doctor-consult-hero-heading-secondary {
  color: white;
}

.doctor-consult-hero-service-text {
  color: #B5CDF7;
  margin: 0;
  font-family: Inter;
  font-weight: 500;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0;
}

.doctor-consult-hero-cta {
  width: fit-content;
  background: #10847E;
  color: white;
  padding: 12px 32px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(32, 178, 170, 0.3);
  font-family: Inter;
  font-weight: 600;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0;
  text-align: center;
}

.doctor-consult-hero-cta:hover {
  background: #1A9B94;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(32, 178, 170, 0.4);
}

.doctor-consult-hero-cta.clicked {
  transform: scale(0.95);
  transition: transform 0.1s ease;
}

.doctor-consult-hero-feature-list {
  display: flex;
  flex-direction: row;
  gap: 16px;
  margin-top: 20px;
}

.doctor-consult-hero-feature-item {
  display: flex;
  align-items: center;
  gap: 12px;
}

.doctor-consult-hero-feature-icon {
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.doctor-consult-hero-feature-text {
  color: #D7DFE5;
  font-family: Inter;
  font-weight: 500;
  font-size: 12px;
  line-height: 18px;
  letter-spacing: 0;
}

/* Hero Visual Section */
.doctor-consult-hero-visuals {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 1;
  display: flex;
  align-items: flex-end;
  width: 40%;
}

.doctor-consult-hero-image {
  position: absolute;
  bottom: 0;
  right: 15%;
}

.doctor-consult-hero-image-bg {
  position: absolute;
  bottom: 0;
  right: 0;
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
  .doctor-consult-hero {
    padding: 24px 16px;
    border-radius: 0px 0px 24px 24px;
  }

  .doctor-consult-hero-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    padding: 0px;
  }

  .doctor-consult-hero-logo {
    width: 40px;
    height: 40px;
  }

  .doctor-consult-hero-brand-title {
    font-size: 16px;
    line-height: 20px;
  }

  .doctor-consult-hero-brand-subtitle {
    font-size: 12px;
  }

  .doctor-consult-hero-headings {
    font-size: 28px;
    line-height: 40px;
  }

  .doctor-consult-hero-service-text {
    font-size: 14px;
  }

  .doctor-consult-hero-cta {
    padding: 8px 28px;
    font-size: 16px;
  }

  .doctor-consult-hero-feature-list {
    display: none;
  }

  .doctor-consult-hero-visuals {
    display: none;
  }
}
</style>
