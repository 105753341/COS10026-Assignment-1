<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

// Use settings.php for DB connection details
require_once("settings.php"); //opens the connection to the db

// Connect to DB
$conn = new mysqli($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "
CREATE TABLE IF NOT EXISTS eoi (
  EOInumber INT AUTO_INCREMENT PRIMARY KEY,
  job_ref_number VARCHAR(5) NOT NULL,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  street_address VARCHAR(40) NOT NULL,
  suburb VARCHAR(40) NOT NULL,
  state ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  postcode CHAR(4) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(12) NOT NULL,
  dob VARCHAR(10) NOT NULL,
  gender ENUM('Male', 'Female') NOT NULL,
  skill_html VARCHAR(3),
  skill_css VARCHAR(3),
  skill_js VARCHAR(3),
  skill_python VARCHAR(3),
  skill_sql VARCHAR(3),
  other_skills TEXT,
  status ENUM('New', 'Current', 'Final') DEFAULT 'New'
)";
$conn->query($table_sql);

// Ensure AUTO_INCREMENT is set correctly (optional, for dev safety)
$conn->query("ALTER TABLE eoi AUTO_INCREMENT = 1");

// Helper: sanitize input
function clean_input($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}

// Get and validate inputs
$errors = [];
$jobRef = $_POST['jobRef'] ?? '';
$firstName = clean_input($_POST['firstName'] ?? '');
$lastName = clean_input($_POST['lastName'] ?? '');
$dob = clean_input($_POST['dob'] ?? '');
$gender = $_POST['gender'] ?? '';
$address = clean_input($_POST['address'] ?? '');
$suburb = clean_input($_POST['suburb'] ?? '');
$state = $_POST['state'] ?? '';
$postcode = $_POST['postcode'] ?? '';
$email = clean_input($_POST['email'] ?? '');
$phone = preg_replace('/\s+/', '', $_POST['phone'] ?? '');
$otherSkills = clean_input($_POST['otherSkills'] ?? '');
$status = 'New';

// Skill processing
$skill_html   = isset($_POST['skill_html'])   ? 'Yes' : 'No';
$skill_css    = isset($_POST['skill_css'])    ? 'Yes' : 'No';
$skill_js     = isset($_POST['skill_js'])     ? 'Yes' : 'No';
$skill_python = isset($_POST['skill_python']) ? 'Yes' : 'No';
$skill_sql    = isset($_POST['skill_sql'])    ? 'Yes' : 'No';

// Server-side validation
if (!preg_match("/^[A-Za-z]{1,20}$/", $firstName)) $errors[] = "Invalid first name.";
if (!preg_match("/^[A-Za-z]{1,20}$/", $lastName)) $errors[] = "Invalid last name.";
if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob)) $errors[] = "DOB must be in yyyy-mm-dd.";
if (!in_array($gender, ["Male", "Female", "Other"])) $errors[] = "Gender is required.";
if (strlen($address) > 40 || strlen($address) == 0) $errors[] = "Invalid street address.";
if (strlen($suburb) > 40 || strlen($suburb) == 0) $errors[] = "Invalid suburb.";
$valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (!in_array($state, $valid_states)) $errors[] = "Invalid state.";
if (!preg_match("/^\d{4}$/", $postcode)) $errors[] = "Postcode must be 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";
if (!preg_match("/^\d{8,12}$/", $phone)) $errors[] = "Phone must be 8–12 digits.";

// Match postcode to state
$state_postcode_rules = [
    "VIC" => "/^(3|8)/", "NSW" => "/^(1|2)/", "QLD" => "/^(4|9)/",
    "NT" => "/^0/", "WA" => "/^6/", "SA" => "/^5/", "TAS" => "/^7/", "ACT" => "/^0/"
];
if (!preg_match($state_postcode_rules[$state], $postcode)) {
    $errors[] = "Postcode does not match state.";
}

// Show errors if any
if (!empty($errors)) {
    echo "<h1>Submission Failed</h1><ul>";
    foreach ($errors as $err) echo "<li>$err</li>";
    echo "</ul><a href='apply.php'>Go back</a>";
    exit();
}

// Prepare & bind
$sql = "INSERT INTO eoi (job_ref_number, first_name, last_name, street_address, suburb, state, postcode, email, phone, dob, gender,
                         skill_html, skill_css, skill_js, skill_python, skill_sql, other_skills, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) die("Prepare failed: " . $conn->error);

$stmt->bind_param("ssssssssssssssssss", $jobRef, $firstName, $lastName, $address, $suburb, $state, $postcode, $email, $phone, $dob, $gender,
                  $skill_html, $skill_css, $skill_js, $skill_python, $skill_sql, $otherSkills, $status);

// Execute and confirm
if ($stmt->execute()) {
    $eoi_id = $conn->insert_id; // Use $conn->insert_id instead of $stmt->insert_id
    echo "<h1>Thank you!</h1><p>Your application has been submitted.</p><p>Your EOI number is <strong>$eoi_id</strong>.</p>";
} else {
    echo "<h1>Error:</h1><p>" . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>