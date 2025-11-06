<?php
/**
 * Update Popular Conditions Data
 * 
 * This script fixes the popular conditions data to match original
 * Run this once by visiting: http://localhost:8000/update-popular-conditions.php
 * 
 * IMPORTANT: Delete this file after successful update for security!
 */

// Load WordPress
require_once('wp-load.php');

// Security check
if (!current_user_can('administrator')) {
    die('Access denied. Please login as administrator first.');
}

global $wpdb;

echo '<!DOCTYPE html>
<html>
<head>
    <title>Update Popular Conditions</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; }
        .info { background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>🔄 Update Popular Conditions Data</h1>';

$table_name = $wpdb->prefix . 'popular_conditions';

echo '<div class="step"><h3>Updating data to match original...</h3>';

// Clear existing data
$wpdb->query("TRUNCATE TABLE `$table_name`");

// Insert correct data
$conditions = [
    ['Back pain', 'doctor.svg', '#back-pain'],
    ['Stress', 'doctor.svg', '#stress'],
    ['Indigestion', 'doctor.svg', '#indigestion'],
    ['Fever', 'doctor.svg', '#fever'],
    ['Skin rashes', 'doctor.svg', '#skin-rashes'],
    ['PCOS', 'doctor.svg', '#pcos'],
    ['Diabetes', 'doctor.svg', '#diabetes'],
    ['Back Pain', 'doctor.svg', '#back-pain-2'],
    ['Headache', 'doctor.svg', '#headache'],
    ['Cold & Cough', 'doctor.svg', '#cold-cough'],
    ['Acne', 'doctor.svg', '#acne'],
    ['Constipation', 'doctor.svg', '#constipation'],
    ['Menstrual Disorders', 'doctor.svg', '#menstrual'],
    ['Depression', 'doctor.svg', '#depression']
];

$inserted_count = 0;
foreach ($conditions as $condition) {
    $result = $wpdb->insert(
        $table_name,
        [
            'title' => $condition[0],
            'image' => $condition[1],
            'link' => $condition[2]
        ],
        ['%s', '%s', '%s']
    );
    
    if ($result !== false) {
        $inserted_count++;
    }
}

echo '<div class="success">✓ Successfully updated ' . $inserted_count . ' conditions</div>';
echo '</div>';

$count = $wpdb->get_var("SELECT COUNT(*) FROM `$table_name`");

echo '<div class="success">
    <h2>✓ Update Complete!</h2>
    <p>Total records: <strong>' . $count . '</strong></p>
    <p><strong>Next steps:</strong></p>
    <ol>
        <li>Go back to your WordPress site and refresh</li>
        <li>Conditions should now show correct names</li>
        <li><strong style="color: #d63384;">DELETE this file (update-popular-conditions.php)!</strong></li>
    </ol>
</div>';

echo '</body></html>';
?>

