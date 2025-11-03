<?php
/**
 * Trust Marker Component
 * Trust marker section for Doctor Consult by PharmEasy
 */
?>

<section class="trust-marker">
  <div class="trust-marker-content-wrapper">
  <div class="trust-marker-content">
    <div class="trust-marker-container-wrapper">
      <div class="trust-marker-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon left-leaf"/>
        <p class="trust-marker-text">40+ Certified Doctors</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon right-leaf"/>
      </div>
    </div>
    <div class="trust-marker-container-wrapper">
    <div class="trust-marker-container">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon left-leaf"/>
      <p class="trust-marker-text">5K Successful Consultations</p>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon right-leaf"/>
    </div>
    </div>
    <div class="trust-marker-container-wrapper">
    <div class="trust-marker-container">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon left-leaf"/>
      <p class="trust-marker-text">4.8 Reviews by Patients</p>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.svg" alt="left leaf" class="leaf-icon right-leaf"/>
    </div>
    </div>
  </div>
  </div>
  <div class="trust-marker-border"/>
</section>

<style>
  .trust-marker{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-bottom: 64px;
}

.trust-marker-content-wrapper{
  background-color: #F5F8FC;
  width: 100%;
}

.trust-marker-content{
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  gap: 16px;
  max-width: 928px;
  margin: 0 auto;
  padding: 16px 0px 8px;
}

.trust-marker-border{
  width: 100%;
  height: 5px;
  background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/trust-marker-border.svg");
  background-repeat: repeat-x;
  background-position: bottom;
  background-size: auto 100%;
}

.trust-marker-container-wrapper{
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.trust-marker-container{
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  width: 70%;
}

.trust-marker-text {
  font-family: Inter;
  font-weight: 700;
  font-style: Bold;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0;
  text-align: center;
  color: #8897A2;
  margin: 0;
  margin-block-start: 0;
  margin-block-end: 0;
  width: 130px;
}

.trust-marker-container .right-leaf{
  transform: scaleX(-1);
}

@media (max-width: 768px) {
  .trust-marker{
    margin-bottom: 24px;
  }

  .trust-marker-content{
    gap: 8px;
    padding: 8px;
  }

  .trust-marker-text{
    font-size: 11px;
    line-height: 16px;
    margin-bottom: 10px;
  }

  .trust-marker-container .leaf-icon{
    height: 36px;
  }

  .trust-marker-container-wrapper:nth-child(3){
    display: none;
  }
}
</style>