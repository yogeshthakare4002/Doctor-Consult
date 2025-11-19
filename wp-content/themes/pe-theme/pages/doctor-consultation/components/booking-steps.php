<?php
/**
 * How to Book Doctor Consult Section
 * Optimized component with desktop horizontal cards and mobile vertical layout
 */

// Booking steps data
$booking_steps = array(
    array(
        'number' => '1',
        'title' => 'Select your health concern',
        'description' => 'Choose a speciality that best suits your needs',
        'icon' => get_template_directory_uri() . '/assets/images/step1.svg'
    ),
    array(
        'number' => '2',
        'title' => 'Choose the doctor',
        'description' => 'Choose a doctor from our list of specialists.',
        'icon' => get_template_directory_uri() . '/assets/images/step2.svg'
    ),
    array(
        'number' => '3',
        'title' => 'Select your preferred slot',
        'description' => 'Choose a time that works best for you',
        'icon' => get_template_directory_uri() . '/assets/images/step3.svg'
    ),
    array(
        'number' => '4',
        'title' => 'Connect via video/audio call',
        'description' => 'Join the consultation easily from your device.',
        'icon' => get_template_directory_uri() . '/assets/images/step4.svg'
    ),
    array(
        'number' => '5',
        'title' => 'Get e-prescription instantly',
        'description' => 'Receive your prescription right after the call.',
        'icon' => get_template_directory_uri() . '/assets/images/step5.svg'
    )
);
?>

<section class="booking-steps-section">
        <h2 class="booking-steps-title">How to book doctor consult</h2>
        
        <div class="booking-steps-content">
            <?php foreach ($booking_steps as $index => $step): ?>
                <div class="booking-step" data-step="<?php echo esc_attr($step['number']); ?>">
                    <div class="step-icon">
                        <div class="step-number"><?php echo esc_html($step['number']); ?></div>
                        <div class="step-icon-image">
                            <img src="<?php echo esc_url($step['icon']); ?>" alt="<?php echo esc_attr($step['title']); ?>" width=80 height=80 />
                        </div>
                    </div>
                    <div class="step-content">
                        <h3 class="step-title"><?php echo esc_html($step['title']); ?></h3>
                        <p class="step-description"><?php echo esc_html($step['description']); ?></p>
                    </div>
                    <?php if ($index < count($booking_steps) - 1): ?>
                        <div class="step-connector"></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
</section>

<style>
/* Booking Steps Section */
.booking-steps-section {
    max-width: 980px;
    margin: 0 auto;
}

.booking-steps-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
    color: #30363C;
    margin-bottom: 32px;
}

.booking-steps-content {
    display: flex;
    gap: 20px;
    position: relative;
}

.booking-step {
    flex: 1;
    border-radius: 12px;
    padding: 24px 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    text-align: center;
    transition: all 0.3s ease;
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                linear-gradient(0deg, #F5F8FC -1.87%, rgba(245, 248, 252, 0) 100%);
}

.booking-step::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 12px;
    padding: 1px;
    background: linear-gradient(180deg, #F3F4F5 0.54%, #B0D0F4 82.24%);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    z-index: 0;
}

.step-icon {
    width: 80px;
    height: 80px;
    background: #F3F4F6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px auto;
    position: relative;
}

.step-number {
    font-family: Inter;
    font-weight: 700;
    font-size: 40px;
    line-height: 22px;
    position: absolute;
    top: 10px;
    left: 2px;
    transform: translateY(-50%);
    color: #30363C;
    text-shadow: 2px 0 #fff, -2px 0 #fff, 0 2px #fff, 0 -2px #fff,
    1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
}

.step-icon-image{
    width: 100%;
    height: 100%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.step-icon-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.step-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.step-title {
    font-family: Inter;
font-weight: 600;
font-style: Semi Bold;
font-size: 16px;
line-height: 24px;
letter-spacing: 0;
color: #30363C;
text-align: left;
}

.step-description {
    font-family: Inter;
font-weight: 400;
font-style: Regular;
font-size: 14px;
line-height: 22px;
letter-spacing: 0;
color: #30363C;
text-align: left;
}

.step-connector {
    position: absolute;
    top: 50%;
    right: -20px;
    width: 20px;
    height: 2px;
    background: repeating-linear-gradient(
        to right,
        #3B82F6 0px,
        #3B82F6 8px,
        transparent 8px,
        transparent 12px
    );
    transform: translateY(-50%);
    z-index: 1;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .booking-steps-section {
       padding: 0 16px;
    }
    
    .booking-steps-content {
        flex-direction: column;
        gap: 0;
    }
    
    .booking-step {
        background: transparent;
        border: none;
        box-shadow: none;
        padding: 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-align: left;
    }

    .booking-step::before {
        display: none;
    }
    
    .step-icon {
        width: 72px;
        height: 72px;
        margin: 0;
        flex-shrink: 0;
    }
    
    .step-content {
        flex: 1;
        text-align: left;
        align-items: flex-start;
        gap: 0;
    }
    
    .step-title {
        text-align: left;
    }
    
    .step-description {
        text-align: left;
    }
    
    .step-connector {
        position: absolute;
        top: 90px;
        left: 35px;
        right: auto;
        width: 2px;
        height: 30px;
        background: repeating-linear-gradient(
            to bottom,
            #3B82F6 0px,
            #3B82F6 8px,
            transparent 8px,
            transparent 12px
        );
        transform: none;
    }
}
</style>


