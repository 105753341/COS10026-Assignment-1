<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "job_application";

// Connect to database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
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

// Handle multiple checkbox values
$skills = "";
if (isset($_POST['skills'])) {
    if (is_array($_POST['skills'])) {
        $skills = implode(", ", $_POST['skills']);
    } else {
        $skills = $_POST['skills'];
    }
}

// Convert dd/mm/yyyy to yyyy-mm-dd
$dobParts = explode("/", $dob);
$dobFormatted = $dobParts[2] . "-" . $dobParts[1] . "-" . $dobParts[0];

// Prepare SQL query
$sql = "INSERT INTO eoi (job_ref, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone, skills, other_skills)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssss", $jobRef, $firstName, $lastName, $dobFormatted, $gender, $address, $suburb, $state, $postcode, $email, $phone, $skills, $otherSkills);

if ($stmt->execute()) {
    echo "<h1>Thank you! Your application was submitted successfully.</h1>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
