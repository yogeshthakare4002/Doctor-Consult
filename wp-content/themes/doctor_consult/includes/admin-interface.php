<?php
/**
 * Admin Interface for Doctor Consult Theme
 * Provides WordPress admin interface to manage doctors and data
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add admin menu for doctor management
 */
function doctor_consult_admin_menu() {
    add_menu_page(
        'Doctor Management',
        'Doctors',
        'manage_options',
        'doctor-management',
        'doctor_consult_doctors_page',
        'dashicons-admin-users',
        30
    );
    
    add_submenu_page(
        'doctor-management',
        'Add New Doctor',
        'Add Doctor',
        'manage_options',
        'add-doctor',
        'doctor_consult_add_doctor_page'
    );
    
    add_submenu_page(
        'doctor-management',
        'Specializations',
        'Specializations',
        'manage_options',
        'specializations',
        'doctor_consult_specializations_page'
    );
    
    add_submenu_page(
        'doctor-management',
        'Appointments',
        'Appointments',
        'manage_options',
        'appointments',
        'doctor_consult_appointments_page'
    );
}
add_action('admin_menu', 'doctor_consult_admin_menu');

/**
 * Doctors management page
 */
function doctor_consult_doctors_page() {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    
    // Handle delete action
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $doctor_id = intval($_GET['id']);
        $wpdb->delete($doctors_table, array('id' => $doctor_id));
        echo '<div class="notice notice-success"><p>Doctor deleted successfully!</p></div>';
    }
    
    // Get all doctors
    $doctors = $wpdb->get_results("SELECT * FROM $doctors_table ORDER BY name ASC", ARRAY_A);
    
    ?>
    <div class="wrap">
        <h1>Doctor Management</h1>
        <a href="<?php echo admin_url('admin.php?page=add-doctor'); ?>" class="page-title-action">Add New Doctor</a>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Experience</th>
                    <th>Rating</th>
                    <th>Fee</th>
                    <th>Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?php echo $doctor['id']; ?></td>
                    <td><?php echo esc_html($doctor['name']); ?></td>
                    <td><?php echo esc_html($doctor['specialization']); ?></td>
                    <td><?php echo $doctor['experience']; ?> years</td>
                    <td><?php echo $doctor['rating']; ?></td>
                    <td>₹<?php echo $doctor['fee']; ?></td>
                    <td><?php echo $doctor['available'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=add-doctor&id=' . $doctor['id']); ?>">Edit</a> |
                        <a href="<?php echo admin_url('admin.php?page=doctor-management&action=delete&id=' . $doctor['id']); ?>" 
                           onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/**
 * Add/Edit doctor page
 */
function doctor_consult_add_doctor_page() {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    $doctor = null;
    $is_edit = false;
    
    // Check if editing existing doctor
    if (isset($_GET['id'])) {
        $doctor_id = intval($_GET['id']);
        $doctor = $wpdb->get_row($wpdb->prepare("SELECT * FROM $doctors_table WHERE id = %d", $doctor_id), ARRAY_A);
        $is_edit = true;
    }
    
    // Handle form submission
    if (isset($_POST['submit'])) {
        $data = array(
            'name' => sanitize_text_field($_POST['name']),
            'specialization' => sanitize_text_field($_POST['specialization']),
            'experience' => intval($_POST['experience']),
            'rating' => floatval($_POST['rating']),
            'fee' => intval($_POST['fee']),
            'original_fee' => !empty($_POST['original_fee']) ? intval($_POST['original_fee']) : null,
            'available' => isset($_POST['available']) ? 1 : 0,
            'image_url' => esc_url_raw($_POST['image_url']),
            'qualifications' => sanitize_text_field($_POST['qualifications']),
            'languages' => sanitize_text_field($_POST['languages']),
            'expertise' => sanitize_textarea_field($_POST['expertise'])
        );
        
        if ($is_edit) {
            $wpdb->update($doctors_table, $data, array('id' => $doctor_id));
            echo '<div class="notice notice-success"><p>Doctor updated successfully!</p></div>';
        } else {
            $wpdb->insert($doctors_table, $data);
            echo '<div class="notice notice-success"><p>Doctor added successfully!</p></div>';
        }
        
        $doctor = $wpdb->get_row($wpdb->prepare("SELECT * FROM $doctors_table WHERE id = %d", $wpdb->insert_id), ARRAY_A);
    }
    
    ?>
    <div class="wrap">
        <h1><?php echo $is_edit ? 'Edit Doctor' : 'Add New Doctor'; ?></h1>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="name">Doctor Name</label></th>
                    <td><input type="text" id="name" name="name" value="<?php echo $doctor ? esc_attr($doctor['name']) : ''; ?>" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="specialization">Specialization</label></th>
                    <td>
                        <select id="specialization" name="specialization" required>
                            <option value="">Select Specialization</option>
                            <option value="General Medicine" <?php selected($doctor['specialization'] ?? '', 'General Medicine'); ?>>General Medicine</option>
                            <option value="Cardiology" <?php selected($doctor['specialization'] ?? '', 'Cardiology'); ?>>Cardiology</option>
                            <option value="Dermatology" <?php selected($doctor['specialization'] ?? '', 'Dermatology'); ?>>Dermatology</option>
                            <option value="Pediatrics" <?php selected($doctor['specialization'] ?? '', 'Pediatrics'); ?>>Pediatrics</option>
                            <option value="Gynecology" <?php selected($doctor['specialization'] ?? '', 'Gynecology'); ?>>Gynecology</option>
                            <option value="Orthopedics" <?php selected($doctor['specialization'] ?? '', 'Orthopedics'); ?>>Orthopedics</option>
                            <option value="Psychiatry" <?php selected($doctor['specialization'] ?? '', 'Psychiatry'); ?>>Psychiatry</option>
                            <option value="Neurology" <?php selected($doctor['specialization'] ?? '', 'Neurology'); ?>>Neurology</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="experience">Experience (Years)</label></th>
                    <td><input type="number" id="experience" name="experience" value="<?php echo $doctor ? $doctor['experience'] : ''; ?>" class="small-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="rating">Rating</label></th>
                    <td><input type="number" id="rating" name="rating" value="<?php echo $doctor ? $doctor['rating'] : ''; ?>" step="0.1" min="0" max="5" class="small-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="fee">Consultation Fee (₹)</label></th>
                    <td><input type="number" id="fee" name="fee" value="<?php echo $doctor ? $doctor['fee'] : ''; ?>" class="small-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="original_fee">Original Fee (₹)</label></th>
                    <td><input type="number" id="original_fee" name="original_fee" value="<?php echo $doctor ? $doctor['original_fee'] : ''; ?>" class="small-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="qualifications">Qualifications</label></th>
                    <td><input type="text" id="qualifications" name="qualifications" value="<?php echo $doctor ? esc_attr($doctor['qualifications']) : ''; ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="languages">Languages</label></th>
                    <td><input type="text" id="languages" name="languages" value="<?php echo $doctor ? esc_attr($doctor['languages']) : ''; ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="expertise">Expertise</label></th>
                    <td><textarea id="expertise" name="expertise" rows="3" cols="50"><?php echo $doctor ? esc_textarea($doctor['expertise']) : ''; ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_url">Image URL</label></th>
                    <td><input type="url" id="image_url" name="image_url" value="<?php echo $doctor ? esc_url($doctor['image_url']) : ''; ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Available</th>
                    <td><label><input type="checkbox" name="available" value="1" <?php checked($doctor['available'] ?? 1, 1); ?> /> Available for consultation</label></td>
                </tr>
            </table>
            
            <?php submit_button($is_edit ? 'Update Doctor' : 'Add Doctor'); ?>
        </form>
    </div>
    <?php
}

/**
 * Specializations management page
 */
function doctor_consult_specializations_page() {
    global $wpdb;
    
    $specializations_table = $wpdb->prefix . 'specializations';
    
    // Handle form submission
    if (isset($_POST['submit'])) {
        $data = array(
            'name' => sanitize_text_field($_POST['name']),
            'description' => sanitize_textarea_field($_POST['description']),
            'icon' => sanitize_text_field($_POST['icon'])
        );
        
        $wpdb->insert($specializations_table, $data);
        echo '<div class="notice notice-success"><p>Specialization added successfully!</p></div>';
    }
    
    // Get all specializations
    $specializations = $wpdb->get_results("SELECT * FROM $specializations_table ORDER BY name ASC", ARRAY_A);
    
    ?>
    <div class="wrap">
        <h1>Specializations Management</h1>
        
        <h2>Add New Specialization</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="name">Name</label></th>
                    <td><input type="text" id="name" name="name" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description</label></th>
                    <td><textarea id="description" name="description" rows="3" cols="50"></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="icon">Icon (Emoji)</label></th>
                    <td><input type="text" id="icon" name="icon" class="regular-text" placeholder="👨‍⚕️" /></td>
                </tr>
            </table>
            
            <?php submit_button('Add Specialization'); ?>
        </form>
        
        <h2>Existing Specializations</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Icon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($specializations as $spec): ?>
                <tr>
                    <td><?php echo esc_html($spec['name']); ?></td>
                    <td><?php echo esc_html($spec['description']); ?></td>
                    <td><?php echo esc_html($spec['icon']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/**
 * Appointments management page
 */
function doctor_consult_appointments_page() {
    global $wpdb;
    
    $appointments_table = $wpdb->prefix . 'appointments';
    $doctors_table = $wpdb->prefix . 'doctors';
    
    // Get all appointments with doctor names
    $appointments = $wpdb->get_results("
        SELECT a.*, d.name as doctor_name 
        FROM $appointments_table a 
        LEFT JOIN $doctors_table d ON a.doctor_id = d.id 
        ORDER BY a.appointment_date DESC
    ", ARRAY_A);
    
    ?>
    <div class="wrap">
        <h1>Appointments Management</h1>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Doctor</th>
                    <th>Appointment Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?php echo $appointment['id']; ?></td>
                    <td><?php echo esc_html($appointment['patient_name']); ?></td>
                    <td><?php echo esc_html($appointment['doctor_name']); ?></td>
                    <td><?php echo date('M j, Y H:i', strtotime($appointment['appointment_date'])); ?></td>
                    <td><?php echo ucfirst($appointment['consultation_type']); ?></td>
                    <td>
                        <span class="status-<?php echo $appointment['status']; ?>">
                            <?php echo ucfirst($appointment['status']); ?>
                        </span>
                    </td>
                    <td><?php echo date('M j, Y', strtotime($appointment['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <style>
    .status-pending { color: #f56e28; }
    .status-confirmed { color: #00a32a; }
    .status-completed { color: #0073aa; }
    .status-cancelled { color: #d63638; }
    </style>
    <?php
}

