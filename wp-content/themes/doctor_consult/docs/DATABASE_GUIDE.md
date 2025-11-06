# Doctor Consult Theme - Database Guide

## Database Structure

The theme creates **3 custom database tables** when activated:

### 1. `wp_doctors` Table
Stores all doctor information:

| Field | Type | Description |
|-------|------|-------------|
| `id` | int(11) | Primary key, auto-increment |
| `name` | varchar(255) | Doctor's full name |
| `specialization` | varchar(100) | Medical specialization |
| `experience` | int(3) | Years of experience |
| `rating` | decimal(2,1) | Rating (0.0 to 5.0) |
| `fee` | int(6) | Current consultation fee in ₹ |
| `original_fee` | int(6) | Original fee (for discounts) |
| `available` | tinyint(1) | 1 = Available, 0 = Busy |
| `image_url` | varchar(500) | Doctor's photo URL |
| `qualifications` | text | Medical qualifications (MD, MBBS, etc.) |
| `languages` | varchar(255) | Languages spoken |
| `expertise` | text | Areas of expertise |
| `created_at` | datetime | Record creation time |
| `updated_at` | datetime | Last update time |

### 2. `wp_specializations` Table
Stores medical specializations:

| Field | Type | Description |
|-------|------|-------------|
| `id` | int(11) | Primary key, auto-increment |
| `name` | varchar(100) | Specialization name |
| `description` | text | Specialization description |
| `icon` | varchar(50) | Emoji icon for display |
| `created_at` | datetime | Record creation time |

### 3. `wp_appointments` Table
Stores appointment bookings:

| Field | Type | Description |
|-------|------|-------------|
| `id` | int(11) | Primary key, auto-increment |
| `doctor_id` | int(11) | Foreign key to doctors table |
| `patient_name` | varchar(255) | Patient's name |
| `patient_email` | varchar(255) | Patient's email |
| `patient_phone` | varchar(20) | Patient's phone number |
| `appointment_date` | datetime | Scheduled appointment time |
| `status` | enum | pending, confirmed, completed, cancelled |
| `consultation_type` | enum | video, audio, chat |
| `notes` | text | Additional notes |
| `created_at` | datetime | Booking creation time |
| `updated_at` | datetime | Last update time |

## How to Add/Manage Data

### Method 1: WordPress Admin Interface (Recommended)

1. **Access Admin Panel:**
   - Go to your WordPress admin: `/wp-admin/`
   - Look for "Doctors" menu in the sidebar

2. **Manage Doctors:**
   - Click "Doctors" to view all doctors
   - Click "Add Doctor" to add new doctors
   - Click "Edit" next to any doctor to modify
   - Click "Delete" to remove doctors

3. **Manage Specializations:**
   - Click "Specializations" to manage medical specializations

4. **View Appointments:**
   - Click "Appointments" to see all bookings

### Method 2: Direct Database Access

1. **Using phpMyAdmin:**
   - Access your database via phpMyAdmin
   - Navigate to your WordPress database
   - Find tables: `wp_doctors`, `wp_specializations`, `wp_appointments`

2. **Using MySQL Command Line:**
   ```sql
   -- View all doctors
   SELECT * FROM wp_doctors;
   
   -- Add a new doctor
   INSERT INTO wp_doctors (name, specialization, experience, rating, fee, available, qualifications, languages, expertise) 
   VALUES ('Dr. John Smith', 'Cardiology', 10, 4.8, 500, 1, 'MD, MBBS', 'English, Hindi', 'Heart conditions, Hypertension');
   
   -- Update a doctor
   UPDATE wp_doctors SET fee = 600 WHERE id = 1;
   
   -- Delete a doctor
   DELETE FROM wp_doctors WHERE id = 1;
   ```

### Method 3: Data Management Script

1. **Access the script:**
   - Navigate to: `/wp-content/themes/doctor_consult/data-management.php`
   - Make sure you're logged in as admin

2. **Use the web interface:**
   - Add new doctors with the form
   - Update existing doctors
   - Delete doctors
   - View all current data

## Code That Points to Database

### 1. Database Functions (in `includes/database-setup.php`)

```php
// Get doctors with filters
$doctors = doctor_consult_get_doctors_from_db($filters);

// Get single doctor
$doctor = doctor_consult_get_doctor_by_id($doctor_id);

// Get specializations
$specializations = doctor_consult_get_specializations_from_db();

// Create appointment
$appointment_id = doctor_consult_create_appointment($appointment_data);
```

### 2. Template Usage (in `page-doctors.php`)

```php
// Get filters from URL
$filters = array();
if (!empty($_GET['specialization'])) {
    $filters['specialization'] = sanitize_text_field($_GET['specialization']);
}

// Get doctors from database
$doctors = doctor_consult_get_doctors_from_db($filters);

// Display doctors
foreach ($doctors as $doctor) {
    get_template_part('template-parts/doctor-card', null, array('doctor' => $doctor));
}
```

### 3. REST API Endpoints

```php
// Get doctors via REST API
GET /wp-json/doctor-consult/v1/doctors

// With filters
GET /wp-json/doctor-consult/v1/doctors?specialization=Cardiology&rating=4.5
```

## Sample Data

The theme automatically inserts sample data when activated:

### Sample Doctors:
- Dr. Harleen Xo (General Medicine, 11 years, ₹199)
- Dr. Rajesh Kumar (Cardiology, 8 years, ₹299)
- Dr. Priya Sharma (Dermatology, 12 years, ₹399)
- Dr. Vikram Patel (Pediatrics, 10 years, ₹250)
- Dr. Meera Joshi (Gynecology, 15 years, ₹350)
- Dr. Suresh Gupta (Psychiatry, 9 years, ₹500)

### Sample Specializations:
- General Medicine
- Cardiology
- Dermatology
- Pediatrics
- Gynecology
- Orthopedics
- Psychiatry
- Neurology

## Database Location

The database tables are created in your **WordPress database** with the prefix `wp_` (or your custom prefix).

**Full table names:**
- `wp_doctors`
- `wp_specializations` 
- `wp_appointments`

## Security Notes

1. **Data Sanitization:** All user inputs are sanitized using WordPress functions
2. **SQL Injection Protection:** Uses `$wpdb->prepare()` for safe queries
3. **Access Control:** Admin interface requires `manage_options` capability
4. **Data Validation:** Input validation on all forms

## Troubleshooting

### If tables don't exist:
1. Deactivate and reactivate the theme
2. Check WordPress error logs
3. Ensure database user has CREATE TABLE permissions

### If data doesn't show:
1. Check if sample data was inserted
2. Verify database connection
3. Check for PHP errors in WordPress debug log

### To reset all data:
```sql
-- Clear all data (be careful!)
DELETE FROM wp_appointments;
DELETE FROM wp_doctors;
DELETE FROM wp_specializations;
```

## API Usage Examples

### Get all doctors:
```javascript
fetch('/wp-json/doctor-consult/v1/doctors')
  .then(response => response.json())
  .then(doctors => console.log(doctors));
```

### Get doctors by specialization:
```javascript
fetch('/wp-json/doctor-consult/v1/doctors?specialization=Cardiology')
  .then(response => response.json())
  .then(doctors => console.log(doctors));
```

### Filter by rating:
```javascript
fetch('/wp-json/doctor-consult/v1/doctors?rating=4.5')
  .then(response => response.json())
  .then(doctors => console.log(doctors));
```

This database structure provides a complete foundation for managing doctors, specializations, and appointments in your WordPress theme!

