<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";  // Set your password if needed
$dbname = "job_application";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize form inputs
$jobRef = $_POST['jobRef'];
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = htmlspecialchars($_POST['address']);
$suburb = htmlspecialchars($_POST['suburb']);
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$otherSkills = htmlspecialchars($_POST['otherSkills']);

// Handle multiple skills checkboxes
$skills = "";
if (isset($_POST['skills'])) {
    if (is_array($_POST['skills'])) {
        $skills = implode(", ", $_POST['skills']);
    } else {
        $skills = $_POST['skills'];
    }
}

// Convert DOB from dd/mm/yyyy to yyyy-mm-dd
$dobFormatted = "";
if (preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $dob, $matches)) {
    $dobFormatted = "$matches[3]-$matches[2]-$matches[1]";
} else {
    die("Invalid date format. Please use dd/mm/yyyy.");
}

// Prepare and execute SQL INSERT statement
$sql = "INSERT INTO eoi (job_ref, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone, skills, other_skills)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}

$stmt->bind_param("sssssssssssss", $jobRef, $firstName, $lastName, $dobFormatted, $gender, $address, $suburb, $state, $postcode, $email, $phone, $skills, $otherSkills);

if ($stmt->execute()) {
    echo "<h1>Thank you! Your application has been submitted successfully.</h1>";
} else {
    echo "<h1>Error: " . $stmt->error . "</h1>";
}

$stmt->close();
$conn->close();
?>
