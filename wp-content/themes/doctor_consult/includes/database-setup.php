<?php
/**
 * Database Setup for Doctor Consult Theme
 * Creates custom tables and data structure
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create custom database tables on theme activation
 */
function doctor_consult_create_tables() {
    global $wpdb;
    
    $charset_collate = $wpdb->get_charset_collate();
    
    // Doctors table
    $doctors_table = $wpdb->prefix . 'doctors';
    $doctors_sql = "CREATE TABLE $doctors_table (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        specialization varchar(100) NOT NULL,
        experience int(3) NOT NULL,
        rating decimal(2,1) NOT NULL,
        fee int(6) NOT NULL,
        original_fee int(6) DEFAULT NULL,
        available tinyint(1) DEFAULT 1,
        image_url varchar(500) DEFAULT NULL,
        qualifications text DEFAULT NULL,
        languages varchar(255) DEFAULT NULL,
        expertise text DEFAULT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY specialization (specialization),
        KEY available (available),
        KEY rating (rating)
    ) $charset_collate;";
    
    // Specializations table
    $specializations_table = $wpdb->prefix . 'specializations';
    $specializations_sql = "CREATE TABLE $specializations_table (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        description text DEFAULT NULL,
        icon varchar(50) DEFAULT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY name (name)
    ) $charset_collate;";
    
    // Appointments table
    $appointments_table = $wpdb->prefix . 'appointments';
    $appointments_sql = "CREATE TABLE $appointments_table (
        id int(11) NOT NULL AUTO_INCREMENT,
        doctor_id int(11) NOT NULL,
        patient_name varchar(255) NOT NULL,
        patient_email varchar(255) NOT NULL,
        patient_phone varchar(20) NOT NULL,
        appointment_date datetime NOT NULL,
        status enum('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
        consultation_type enum('video', 'audio', 'chat') DEFAULT 'video',
        notes text DEFAULT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY doctor_id (doctor_id),
        KEY appointment_date (appointment_date),
        KEY status (status),
        FOREIGN KEY (doctor_id) REFERENCES $doctors_table(id) ON DELETE CASCADE
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    dbDelta($doctors_sql);
    dbDelta($specializations_sql);
    dbDelta($appointments_sql);
}

/**
 * Insert sample data
 */
function doctor_consult_insert_sample_data() {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    $specializations_table = $wpdb->prefix . 'specializations';
    
    // Insert specializations
    $specializations = array(
        array('name' => 'General Medicine', 'description' => 'Expert in managing common illnesses such as cold, flu, fever, infections, and general health concerns.', 'icon' => '👨‍⚕️'),
        array('name' => 'Cardiology', 'description' => 'Heart and cardiovascular system specialists', 'icon' => '❤️'),
        array('name' => 'Dermatology', 'description' => 'Skin, hair, and nail health specialists', 'icon' => '🧴'),
        array('name' => 'Pediatrics', 'description' => 'Child health and development specialists', 'icon' => '👶'),
        array('name' => 'Gynecology', 'description' => 'Women\'s health specialists', 'icon' => '🩺'),
        array('name' => 'Orthopedics', 'description' => 'Bone and joint specialists', 'icon' => '🦴'),
        array('name' => 'Psychiatry', 'description' => 'Mental health specialists', 'icon' => '🧠'),
        array('name' => 'Neurology', 'description' => 'Brain and nervous system specialists', 'icon' => '🧠')
    );
    
    foreach ($specializations as $spec) {
        $wpdb->insert($specializations_table, $spec);
    }
    
    // Insert doctors
    $doctors = array(
        array(
            'name' => 'Dr. Harleen Xo',
            'specialization' => 'General Medicine',
            'experience' => 11,
            'rating' => 4.8,
            'fee' => 199,
            'original_fee' => 499,
            'available' => 1,
            'qualifications' => 'MD, MBBS',
            'languages' => 'English, Hindi',
            'expertise' => 'Skin & Hair Fall-related issues, General health concerns'
        ),
        array(
            'name' => 'Dr. Rajesh Kumar',
            'specialization' => 'Cardiology',
            'experience' => 8,
            'rating' => 4.9,
            'fee' => 299,
            'original_fee' => 599,
            'available' => 1,
            'qualifications' => 'MD, MBBS, DM Cardiology',
            'languages' => 'English, Hindi',
            'expertise' => 'Heart conditions, Hypertension, Diabetes management'
        ),
        array(
            'name' => 'Dr. Priya Sharma',
            'specialization' => 'Dermatology',
            'experience' => 12,
            'rating' => 4.7,
            'fee' => 399,
            'original_fee' => 699,
            'available' => 1,
            'qualifications' => 'MD, MBBS, DNB Dermatology',
            'languages' => 'English, Hindi',
            'expertise' => 'Skin treatments, Hair fall, Acne, Dermatitis'
        ),
        array(
            'name' => 'Dr. Vikram Patel',
            'specialization' => 'Pediatrics',
            'experience' => 10,
            'rating' => 4.6,
            'fee' => 250,
            'original_fee' => 450,
            'available' => 1,
            'qualifications' => 'MD, MBBS, DCH',
            'languages' => 'English, Hindi, Gujarati',
            'expertise' => 'Child health, Vaccinations, Growth monitoring'
        ),
        array(
            'name' => 'Dr. Meera Joshi',
            'specialization' => 'Gynecology',
            'experience' => 15,
            'rating' => 4.9,
            'fee' => 350,
            'original_fee' => 550,
            'available' => 1,
            'qualifications' => 'MD, MBBS, DGO',
            'languages' => 'English, Hindi',
            'expertise' => 'Women\'s health, PCOS, Pregnancy care'
        ),
        array(
            'name' => 'Dr. Suresh Gupta',
            'specialization' => 'Psychiatry',
            'experience' => 9,
            'rating' => 4.5,
            'fee' => 500,
            'original_fee' => 800,
            'available' => 1,
            'qualifications' => 'MD, MBBS, DPM',
            'languages' => 'English, Hindi',
            'expertise' => 'Mental health, Anxiety, Depression, Stress management'
        )
    );
    
    foreach ($doctors as $doctor) {
        $wpdb->insert($doctors_table, $doctor);
    }
}

/**
 * Get doctors from database
 */
function doctor_consult_get_doctors_from_db($filters = array()) {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    $where_conditions = array('1=1');
    $where_values = array();
    
    // Apply filters
    if (!empty($filters['specialization'])) {
        $where_conditions[] = 'specialization = %s';
        $where_values[] = sanitize_text_field($filters['specialization']);
    }
    
    if (!empty($filters['rating'])) {
        $where_conditions[] = 'rating >= %f';
        $where_values[] = floatval($filters['rating']);
    }
    
    if (!empty($filters['availability']) && $filters['availability'] === 'today') {
        $where_conditions[] = 'available = 1';
    }
    
    if (!empty($filters['fee_range'])) {
        switch ($filters['fee_range']) {
            case '0-300':
                $where_conditions[] = 'fee BETWEEN 0 AND 300';
                break;
            case '300-500':
                $where_conditions[] = 'fee BETWEEN 300 AND 500';
                break;
            case '500-1000':
                $where_conditions[] = 'fee BETWEEN 500 AND 1000';
                break;
            case '1000+':
                $where_conditions[] = 'fee >= 1000';
                break;
        }
    }
    
    $where_clause = implode(' AND ', $where_conditions);
    $sql = "SELECT * FROM $doctors_table WHERE $where_clause ORDER BY rating DESC, experience DESC";
    
    if (!empty($where_values)) {
        $sql = $wpdb->prepare($sql, $where_values);
    }
    
    return $wpdb->get_results($sql, ARRAY_A);
}

/**
 * Get specializations from database
 */
function doctor_consult_get_specializations_from_db() {
    global $wpdb;
    
    $specializations_table = $wpdb->prefix . 'specializations';
    $sql = "SELECT * FROM $specializations_table ORDER BY name ASC";
    
    return $wpdb->get_results($sql, ARRAY_A);
}

/**
 * Get single doctor by ID
 */
function doctor_consult_get_doctor_by_id($doctor_id) {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    $sql = $wpdb->prepare("SELECT * FROM $doctors_table WHERE id = %d", $doctor_id);
    
    return $wpdb->get_row($sql, ARRAY_A);
}

/**
 * Create appointment
 */
function doctor_consult_create_appointment($appointment_data) {
    global $wpdb;
    
    $appointments_table = $wpdb->prefix . 'appointments';
    
    $data = array(
        'doctor_id' => intval($appointment_data['doctor_id']),
        'patient_name' => sanitize_text_field($appointment_data['patient_name']),
        'patient_email' => sanitize_email($appointment_data['patient_email']),
        'patient_phone' => sanitize_text_field($appointment_data['patient_phone']),
        'appointment_date' => sanitize_text_field($appointment_data['appointment_date']),
        'consultation_type' => sanitize_text_field($appointment_data['consultation_type']),
        'notes' => sanitize_textarea_field($appointment_data['notes']),
        'status' => 'pending'
    );
    
    $result = $wpdb->insert($appointments_table, $data);
    
    if ($result) {
        return $wpdb->insert_id;
    }
    
    return false;
}

