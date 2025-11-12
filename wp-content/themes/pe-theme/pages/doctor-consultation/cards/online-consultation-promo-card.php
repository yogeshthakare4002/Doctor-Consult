<?php
/**
 * Online Consultation Promo Card Component
 * Promotional card for online doctor consultations with discount offer
 */
?>

<div class="border-separator"></div>

<section class="online-consultation-promo-card">
  <div class="promo-content">
    <h2 class="promo-main-heading">Consult a Doctor online Anytime, Anywhere.</h2>
    <span class="offer-text">Get <span class="discount-highlight">50% OFF</span> on your first consultation</span>
  </div>
  <div class="card-images">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image-bg.svg" alt="Doctor Image Background"
      class="doctor-image-background" />
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-image.svg" alt="Banner Image" class="banner-image" />
  </div>
</section>

<div class="border-separator"></div>

<style>
  .border-separator{
    display: none;
    width: 100%;
    height: 4px;
    background-color: #EDF2F9;
  }

  .online-consultation-promo-card {
    width: 100%;
    max-width: 928px;
    height: 108px;
    background: linear-gradient(11deg, rgba(176, 255, 219, 0.38) 0%, rgba(242, 251, 255, 1) 50%, rgba(97, 193, 253, 0.5) 100%);
    padding: 40px 20px;
    border-radius: 12px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    overflow: hidden;
    position: relative;
    margin: 0px auto;
  }

  .online-consultation-promo-card .card-images {
    position: absolute;
    right: 0;
    bottom: 0;
    height: 100%;
    display: flex;
    align-items: flex-end;
  }

  .online-consultation-promo-card .doctor-image-background {
    position: absolute;
    right: -55px;
    bottom: -6px;
    height: 100%;
    z-index: 1;
  }

  .online-consultation-promo-card .banner-image {
    width: 115px;
    position: absolute;
    left: -98px;
    bottom: -18px;
    height: 100%;
    z-index: 2;
  }

  .online-consultation-promo-card .promo-content{
    display: flex;
    flex-direction: column;
    gap: 8px;
    z-index: 3;
  }

  .online-consultation-promo-card .promo-main-heading {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
    color: #3661B0;
  }

  .online-consultation-promo-card .offer-text {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0;
    color: #CF7530;
  }

  @media screen and (max-width: 768px) {
    .border-separator{
      display: block;
    }

    .online-consultation-promo-card {
      width: unset;
      height: 124px;
      margin: 24px 12px;
      padding: 12px;
    }

    .online-consultation-promo-card .doctor-image-background {
      right: -50px;
      bottom: -10px;
    }

    .online-consultation-promo-card .banner-image {
      width: 135px;
      left: -127px;
      bottom: -20px;
    }

    .online-consultation-promo-card .promo-main-heading {
      width: 70%;
      font-size: 16px;
      line-height: 24px;
    }

    .online-consultation-promo-card .offer-text{
      width: 70%;
      font-size: 12px;
      line-height: 20px;
    }

  }
</style>