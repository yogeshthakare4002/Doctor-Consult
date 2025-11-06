<?php
/**
 * Doctor Consult Banner Component
 * Responsive banner section for Doctor Consult by PharmEasy
 */
?>

<section class="doctor-consult-banner">
    <div class="banner-container">
        <div class="banner-content">
            <div class="banner-branding">
              <img class="doctor-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor.svg" alt="doctor Logo"/>
              <div class="brand-text">
                <p class="brand-title">Doctor Consult</p>
                <p class="brand-subtitle">by <b>PharmEasy</b></p>
              </div>
            </div>

            <div class="banner-headings">
              <h2 class="main-heading">Consult Certified Doctors</h2>
              <h3 class="sub-heading">Online - 24/7 Access</h3>
            </div>

            <p class="service-text">Video/Audio call • Starting at just ₹199</p>

            <button class="consult-now-btn">Consult now</button>

            <div class="feature-highlights">
                <div class="feature-item">
                    <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/secure-session.svg" alt="Verified Doctors Icon"/>
                    <span class="feature-text">Private and Secure sessions</span>
                </div>
                <div class="feature-item">
                    <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/follow-up.svg" alt="Free Follow Up Icon"/>
                    <span class="feature-text">Free follow up & Cancellation</span>
                </div>
            </div>
        </div>

        <div class="banner-images">
            <img class="banner-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image.svg" alt="Banner Image"/>
            <img class="banner-image-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image-bg.svg" alt="Banner Image bg"/>
        </div>
      </div>
</section>

<style>
  .doctor-consult-banner {
  background: linear-gradient(135deg, #1A2B4D 0%, #2D4A6B 100%);
  position: relative;
  overflow: hidden;
}

.banner-container {
  max-width: 928px;
  padding: 40px 0px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  gap: 60px;
  position: relative;
  z-index: 2;
}

.banner-content {
  flex: 1;
  color: white;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.banner-branding {
  display: flex;
  flex-direction: row;
  gap: 8px;
}

.doctor-logo {
  width: 50px;
  height: 50px;
}

.brand-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.brand-title {
  font-size: 24px;
  line-height: 24px;
  font-weight: 700;
  color: white;
  margin: 0;
}

.brand-subtitle {
  font-size: 14px;
  color: white;
  margin: 0;
  font-weight: 400;
}

.banner-headings {
  font-family: 'DM Serif Display', serif;
  font-weight: 400;
  font-style: italic;
  font-size: 32px;
  line-height: 40px;
  letter-spacing: 0;
}

.banner-headings .main-heading,
.doctor-consult-banner .main-heading {
  color: #FFD700 !important;
  font-family: 'DM Serif Display', serif !important;
  font-weight: 400 !important;
  font-style: italic !important;
  font-size: 32px !important;
  line-height: 40px !important;
  letter-spacing: 0 !important;
}

.banner-headings .sub-heading,
.doctor-consult-banner .sub-heading {
  color: white !important;
  font-family: 'DM Serif Display', serif !important;
  font-weight: 400 !important;
  font-style: italic !important;
  font-size: 32px !important;
  line-height: 40px !important;
  margin: 0 !important;
  letter-spacing: 0 !important;
}

.service-text {
  color: #B5CDF7;
  margin: 0;
  font-family: Inter;
  font-weight: 500;
  font-style: Medium;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0;
}

.consult-now-btn {
  width: fit-content;
  background: #10847E;
  color: white;
  border: none;
  padding: 16px 32px;
  border-radius: 8px;
  font-size: 18px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(32, 178, 170, 0.3);
}

.consult-now-btn:hover {
  background: #1A9B94;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(32, 178, 170, 0.4);
}

.consult-now-btn.clicked {
  transform: scale(0.95);
  transition: transform 0.1s ease;
}

.feature-highlights {
  display: flex;
  flex-direction: row;
  gap: 16px;
  margin-top: 20px;
}

.feature-highlights .feature-item {
  display: flex;
  align-items: center;
  gap: 12px;
}

.feature-highlights .feature-item .feature-icon {
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
}

.feature-text {
  color: #D7DFE5;
  font-family: Inter;
  font-weight: 500;
  font-style: Medium;
  font-size: 12px;
  line-height: 18px;
  letter-spacing: 0;
}

/* Banner Visual Section */

.banner-images {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 1;
  display: flex;
  align-items: flex-end;
}

.banner-image {
  position: absolute;
  bottom: 0;
  left: 10%;
}


/* Reset WordPress default heading styles for banner */
.doctor-consult-banner h1,
.doctor-consult-banner h2,
.doctor-consult-banner h3,
.doctor-consult-banner h4,
.doctor-consult-banner h5,
.doctor-consult-banner h6 {
  margin: 0 !important;
  padding: 0 !important;
  font-weight: inherit !important;
  line-height: inherit !important;
  text-transform: none !important;
  letter-spacing: inherit !important;
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
  .doctor-consult-banner {
    padding: 24px 16px;
    border-radius: 0px 0px 24px 24px;
  }

  .banner-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    padding: 0px;
  }

  .doctor-logo{
    width: 40px;
    height: 40px;
  }

  .brand-title{
    font-size: 16px;
    line-height: 20px;
  }

  .brand-subtitle{
    font-size: 12px;
  }

  .banner-headings .main-heading {
    font-size: 28px !important;
    line-height: 40px !important;
  }

  .banner-headings .sub-heading {
    font-size: 24px !important;
  }

  .banner-content .service-text {
    font-size: 14px;
  }

  .consult-now-btn {
    padding: 14px 28px;
    font-size: 16px;
  }

  .feature-highlights {
    display: none;
  }

  .banner-images {
    display: none;
  }

}
</style>
