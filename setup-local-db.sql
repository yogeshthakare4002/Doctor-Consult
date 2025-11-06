-- ============================================
-- Local Development Database Setup
-- ============================================
-- This SQL file sets up the specialities table for local development
-- Import this into your local 'wordpress_db' database

-- Create specialities table with WordPress prefix
CREATE TABLE IF NOT EXISTS `wp_specialities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Stores medical specialities information for doctor consult';

-- Insert specialities data
INSERT INTO `wp_specialities` (`title`, `description`, `link`) VALUES
('General Health', 'Expert in managing common illnesses such as cold, flu, fever, infections, and general health concerns.', '#general-health'),
('Child Care', 'Specializes in cardiovascular diseases, heart conditions, and preventive cardiac care.', '#child-care'),
('Skin and Hair Health', 'Treats women\'s health issues including PCOS, menstruation problems, and hormonal imbalances.', '#skin-hair-health'),
('Sexual Health', 'Specializes in skin, hair, and nail conditions including acne, eczema, and skin cancer screening.', '#sexual-health'),
('Digestive and Liver Health', 'Provides comprehensive healthcare for infants, children, and adolescents up to 18 years.', '#digestive-liver-health'),
('Womens Health', 'Treats bone, joint, muscle, and ligament problems including fractures and sports injuries.', '#womens-health'),
('Kidney Care', 'Specializes in disorders of the nervous system including brain, spinal cord, and nerve conditions.', '#kidney-care'),
('Dental Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#dental-health'),
('Blood Sugar Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#blood-sugar-health'),
('Bone and Joint Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#bone-joint-health'),
('Eye Care', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#eye-care'),
('Ear-Nose-Throat Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#ear-nose-throat-health'),
('Piles and Surgery Opinion', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#piles-surgery-opinion'),
('Heart Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#heart-health'),
('Breathing and Lung Health', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#breathing-lung-health'),
('Elder Care', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#elder-care'),
('Weight Management', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#weight-management'),
('Pain Management', 'Provides mental health care including depression, anxiety, bipolar disorder, and addiction treatment.', '#pain-management');

