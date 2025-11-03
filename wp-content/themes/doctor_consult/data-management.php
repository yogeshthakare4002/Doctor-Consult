<?php
/**
 * Data Management Script for Doctor Consult Theme
 * Use this script to add, update, or manage doctor data
 * 
 * Usage: 
 * 1. Access via WordPress admin: /wp-admin/admin.php?page=doctor-management
 * 2. Or run this script directly (make sure WordPress is loaded)
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('Access denied. Admin privileges required.');
}

echo "<h1>Doctor Consult Data Management</h1>";

// Function to add a doctor
function add_doctor($name, $specialization, $experience, $rating, $fee, $original_fee = null, $available = true, $qualifications = '', $languages = '', $expertise = '', $image_url = '') {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    
    $data = array(
        'name' => $name,
        'specialization' => $specialization,
        'experience' => $experience,
        'rating' => $rating,
        'fee' => $fee,
        'original_fee' => $original_fee,
        'available' => $available ? 1 : 0,
        'qualifications' => $qualifications,
        'languages' => $languages,
        'expertise' => $expertise,
        'image_url' => $image_url
    );
    
    $result = $wpdb->insert($doctors_table, $data);
    
    if ($result) {
        echo "<p style='color: green;'>✓ Doctor '$name' added successfully (ID: {$wpdb->insert_id})</p>";
        return $wpdb->insert_id;
    } else {
        echo "<p style='color: red;'>✗ Failed to add doctor '$name': {$wpdb->last_error}</p>";
        return false;
    }
}

// Function to update a doctor
function update_doctor($id, $name, $specialization, $experience, $rating, $fee, $original_fee = null, $available = true, $qualifications = '', $languages = '', $expertise = '', $image_url = '') {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    
    $data = array(
        'name' => $name,
        'specialization' => $specialization,
        'experience' => $experience,
        'rating' => $rating,
        'fee' => $fee,
        'original_fee' => $original_fee,
        'available' => $available ? 1 : 0,
        'qualifications' => $qualifications,
        'languages' => $languages,
        'expertise' => $expertise,
        'image_url' => $image_url
    );
    
    $result = $wpdb->update($doctors_table, $data, array('id' => $id));
    
    if ($result !== false) {
        echo "<p style='color: green;'>✓ Doctor '$name' updated successfully</p>";
        return true;
    } else {
        echo "<p style='color: red;'>✗ Failed to update doctor '$name': {$wpdb->last_error}</p>";
        return false;
    }
}

// Function to delete a doctor
function delete_doctor($id) {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    
    $result = $wpdb->delete($doctors_table, array('id' => $id));
    
    if ($result) {
        echo "<p style='color: green;'>✓ Doctor with ID $id deleted successfully</p>";
        return true;
    } else {
        echo "<p style='color: red;'>✗ Failed to delete doctor with ID $id: {$wpdb->last_error}</p>";
        return false;
    }
}

// Function to get all doctors
function get_all_doctors() {
    global $wpdb;
    
    $doctors_table = $wpdb->prefix . 'doctors';
    $doctors = $wpdb->get_results("SELECT * FROM $doctors_table ORDER BY name ASC", ARRAY_A);
    
    echo "<h2>All Doctors in Database</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Name</th><th>Specialization</th><th>Experience</th><th>Rating</th><th>Fee</th><th>Available</th></tr>";
    
    foreach ($doctors as $doctor) {
        echo "<tr>";
        echo "<td>{$doctor['id']}</td>";
        echo "<td>{$doctor['name']}</td>";
        echo "<td>{$doctor['specialization']}</td>";
        echo "<td>{$doctor['experience']} years</td>";
        echo "<td>{$doctor['rating']}</td>";
        echo "<td>₹{$doctor['fee']}</td>";
        echo "<td>" . ($doctor['available'] ? 'Yes' : 'No') . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

// Handle form submissions
if ($_POST) {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add':
            add_doctor(
                $_POST['name'],
                $_POST['specialization'],
                intval($_POST['experience']),
                floatval($_POST['rating']),
                intval($_POST['fee']),
                !empty($_POST['original_fee']) ? intval($_POST['original_fee']) : null,
                isset($_POST['available']),
                $_POST['qualifications'],
                $_POST['languages'],
                $_POST['expertise'],
                $_POST['image_url']
            );
            break;
            
        case 'update':
            update_doctor(
                intval($_POST['id']),
                $_POST['name'],
                $_POST['specialization'],
                intval($_POST['experience']),
                floatval($_POST['rating']),
                intval($_POST['fee']),
                !empty($_POST['original_fee']) ? intval($_POST['original_fee']) : null,
                isset($_POST['available']),
                $_POST['qualifications'],
                $_POST['languages'],
                $_POST['expertise'],
                $_POST['image_url']
            );
            break;
            
        case 'delete':
            delete_doctor(intval($_POST['id']));
            break;
    }
}

// Display current doctors
get_all_doctors();

?>

<h2>Add New Doctor</h2>
<form method="post">
    <input type="hidden" name="action" value="add">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Specialization:</td>
            <td>
                <select name="specialization" required>
                    <option value="">Select Specialization</option>
                    <option value="General Medicine">General Medicine</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Gynecology">Gynecology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Psychiatry">Psychiatry</option>
                    <option value="Neurology">Neurology</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Experience (years):</td>
            <td><input type="number" name="experience" required></td>
        </tr>
        <tr>
            <td>Rating (0-5):</td>
            <td><input type="number" name="rating" step="0.1" min="0" max="5" required></td>
        </tr>
        <tr>
            <td>Fee (₹):</td>
            <td><input type="number" name="fee" required></td>
        </tr>
        <tr>
            <td>Original Fee (₹):</td>
            <td><input type="number" name="original_fee"></td>
        </tr>
        <tr>
            <td>Qualifications:</td>
            <td><input type="text" name="qualifications"></td>
        </tr>
        <tr>
            <td>Languages:</td>
            <td><input type="text" name="languages"></td>
        </tr>
        <tr>
            <td>Expertise:</td>
            <td><textarea name="expertise" rows="3" cols="50"></textarea></td>
        </tr>
        <tr>
            <td>Image URL:</td>
            <td><input type="url" name="image_url"></td>
        </tr>
        <tr>
            <td>Available:</td>
            <td><input type="checkbox" name="available" checked></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add Doctor"></td>
        </tr>
    </table>
</form>

<h2>Update Doctor</h2>
<form method="post">
    <input type="hidden" name="action" value="update">
    <table>
        <tr>
            <td>Doctor ID:</td>
            <td><input type="number" name="id" required></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Specialization:</td>
            <td>
                <select name="specialization" required>
                    <option value="">Select Specialization</option>
                    <option value="General Medicine">General Medicine</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Gynecology">Gynecology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Psychiatry">Psychiatry</option>
                    <option value="Neurology">Neurology</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Experience (years):</td>
            <td><input type="number" name="experience" required></td>
        </tr>
        <tr>
            <td>Rating (0-5):</td>
            <td><input type="number" name="rating" step="0.1" min="0" max="5" required></td>
        </tr>
        <tr>
            <td>Fee (₹):</td>
            <td><input type="number" name="fee" required></td>
        </tr>
        <tr>
            <td>Original Fee (₹):</td>
            <td><input type="number" name="original_fee"></td>
        </tr>
        <tr>
            <td>Qualifications:</td>
            <td><input type="text" name="qualifications"></td>
        </tr>
        <tr>
            <td>Languages:</td>
            <td><input type="text" name="languages"></td>
        </tr>
        <tr>
            <td>Expertise:</td>
            <td><textarea name="expertise" rows="3" cols="50"></textarea></td>
        </tr>
        <tr>
            <td>Image URL:</td>
            <td><input type="url" name="image_url"></td>
        </tr>
        <tr>
            <td>Available:</td>
            <td><input type="checkbox" name="available"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update Doctor"></td>
        </tr>
    </table>
</form>

<h2>Delete Doctor</h2>
<form method="post">
    <input type="hidden" name="action" value="delete">
    <table>
        <tr>
            <td>Doctor ID:</td>
            <td><input type="number" name="id" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Delete Doctor" onclick="return confirm('Are you sure?')"></td>
        </tr>
    </table>
</form>

<style>
table { border-collapse: collapse; margin: 20px 0; }
th, td { padding: 8px; text-align: left; }
th { background-color: #f2f2f2; }
input, select, textarea { padding: 5px; margin: 2px; }
</style>
