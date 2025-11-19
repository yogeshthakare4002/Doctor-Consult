<?php
/**
 * Consult Info Component
 * Informational section about consulting dermatologists online
 */
?>

<section class="consult-info-section">
  <div class="consult-info-container">
    
    <!-- Section 1: Why consult doctor online -->
    <div class="info-item">
      <div class="info-header">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/why-consult-doctor.svg" alt="List icon" class="info-icon" width=20 height=20 />
        <h2 class="info-title">Why consult doctor online?</h2>
      </div>
      <div class="info-content">
        <p class="info-intro">Consulting a dermatologist or skin specialist is crucial for maintaining healthy skin, hair, and nails. Here are some common reasons to book a dermatologist appointment:</p>
        
        <div class="info-expandable-content">
          <ul class="info-list">
            <li>
              <strong>Persistent Acne:</strong> If over-the-counter treatments fail to control your acne, a dermatologist can prescribe stronger medications and therapies.
            </li>
            <li>
              <strong>Skin Cancer Screening:</strong> Regular skin checks by a dermatologist can help detect skin cancer early, improving treatment outcomes.
            </li>
            <li>
              <strong>Eczema or Psoriasis Management:</strong> Dermatologists can develop personalised treatment plans to manage these chronic skin conditions.
            </li>
          </ul>
        </div>
        
        <button class="info-show-more" aria-expanded="false">
          <span class="show-more-text">Show more</span>
          <svg class="chevron-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6L8 10L12 6" stroke="#10847E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>

    <div class="info-divider"></div>

    <!-- Section 2: When should you see a doctor -->
    <div class="info-item">
      <div class="info-header">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/when-should-see-doctor.svg" alt="Alert icon" class="info-icon" width=20 height=20 />
        <h2 class="info-title">When should you see a doctor?</h2>
      </div>
      <div class="info-content">
        <p class="info-intro">You should see a dermatologist when you have persistent or concerning skin, hair, or nail conditions that are not improving with over-the-counter treatments or home remedies. This includes conditions like acne, eczema, psoriasis, skin cancer concerns, hair loss, and persistent rashes or itching.</p>
        
        <div class="info-expandable-content">
          <p class="info-subheading"><strong>More specifically, consider seeing a dermatologist if:</strong></p>
          <ul class="info-list">
            <li>
              <strong>A mole or patch of skin has changed in size, shape, or color:</strong> These changes could be a sign of skin cancer.
            </li>
            <li>
              <strong>You have persistent acne that isn't responding to over-the-counter treatments:</strong> A dermatologist can offer prescription medications or other treatments to manage acne.
            </li>
          </ul>
        </div>
        
        <button class="info-show-more" aria-expanded="false">
          <span class="show-more-text">Show more</span>
          <svg class="chevron-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6L8 10L12 6" stroke="#10847E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>

  </div>
</section>

<style>
.consult-info-section {
  width: 100%;
  background-color: #FFFFFF;
}

.consult-info-container {
  max-width: 928px;
  margin: 0 auto;
}

.info-item {
  margin-bottom: 32px;
}

.info-item:last-child {
  margin-bottom: 0;
}

.info-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
}

.info-icon {
  display: none;
}

.info-title {
  font-family: Inter;
  font-weight: 600;
  font-size: 22px;
  line-height: 28px;
  letter-spacing: 0;
  color: #30363C;
  margin: 0;
}

.info-content {
  font-family: Inter;
  font-weight: 400;
  font-style: Regular;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0;
  color: #4F585E;
}

.info-subheading {
  margin: 16px 0 8px 0;
}

.info-expandable-content {
  max-height: none;
  overflow: hidden;
  transition: max-height 0.3s ease-out;
}

.info-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.info-list li {
  margin-bottom: 12px;
  padding-left: 15px;
  position: relative;
}

.info-list li:before {
  content: "•";
  position: absolute;
  left: 0;
  color: #4F585E;
  font-weight: bold;
}

.info-list li strong {
  color: #333333;
  font-weight: 600;
}

.info-show-more {
  display: none;
  align-items: center;
  gap: 6px;
  background: none;
  border: none;
  padding: 8px 0;
  margin-top: 12px;
  cursor: pointer;
  font-family: Inter, sans-serif;
  font-size: 14px;
  font-weight: 600;
  color: #10847E;
  transition: opacity 0.2s ease;
}

.info-show-more:hover {
  opacity: 0.8;
}

.chevron-icon {
  transition: transform 0.3s ease;
  flex-shrink: 0;
}

.info-show-more[aria-expanded="true"] .chevron-icon {
  transform: rotate(180deg);
}

.info-divider {
  height: 1px;
  background-color: #E2E8F0;
  margin: 32px 0;
  display: none;
}

/* Mobile styles */
@media (max-width: 768px) {
  .consult-info-section {
    padding: 24px 16px;
  }

  .info-item {
    margin-bottom: 24px;
  }

  .info-header {
    gap: 8px;
    margin-bottom: 12px;
  }

  .info-icon {
    display: block;
    width: 30px;
    height: 30px;
  }

  .info-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0;
  }

  .info-content {
    padding-left: 35px;
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0;
  }

  .info-subheading {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0;
  }

  .info-list li {
    margin-bottom: 10px;
  }

  /* Show the "Show more" button on mobile */
  .info-show-more {
    display: flex;
  }

  /* Collapse content by default on mobile */
  .info-expandable-content {
    max-height: 60px;
    overflow: hidden;
  }

  .info-expandable-content.expanded {
    max-height: 1000px;
  }

  .info-divider {
    margin: 24px -15px;
    display: block;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const showMoreButtons = document.querySelectorAll('.info-show-more');
  
  showMoreButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      const content = this.previousElementSibling;
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      const showMoreText = this.querySelector('.show-more-text');
      
      if (isExpanded) {
        content.classList.remove('expanded');
        this.setAttribute('aria-expanded', 'false');
        showMoreText.textContent = 'Show more';
      } else {
        content.classList.add('expanded');
        this.setAttribute('aria-expanded', 'true');
        showMoreText.textContent = 'Show less';
      }
    });
  });
});
</script>

