<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "project2_jobs_db";

// Connect to DB
$conn = new mysqli($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
$jobRef = $_POST['jobRef'];
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$address = htmlspecialchars($_POST['address']);
$suburb = htmlspecialchars($_POST['suburb']);
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$otherSkills = htmlspecialchars($_POST['otherSkills']);
$status = "New";

$html = "No";
$css = "No";
$javascript = "No";
$python = "No";
$sql = "No";

if (isset($_POST['skills']) && is_array($_POST['skills'])) {
    foreach ($_POST['skills'] as $skill) {
        switch ($skill) {
            case "HTML":
                $html = "Yes";
                break;
            case "CSS":
                $css = "Yes";
                break;
            case "JavaScript":
                $javascript = "Yes";
                break;
            case "Python":
                $python = "Yes";
                break;
            case "SQL":
                $sql = "Yes";
                break;
        }
    }
}


// Prepare SQL INSERT
$sql = "INSERT INTO eoi (job_ref_number, first_name, last_name, street_address, suburb, state, postcode, email, phone,
                         skill_html, skill_css, skill_js, skill_python, skill_sql, other_skills, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}

$stmt->bind_param("ssssssssssssssss", $jobRef, $firstName, $lastName, $address, $suburb, $state, $postcode, $email, $phone,
                  $skill_html, $skill_css, $skill_js, $skill_python, $skill_sql, $otherSkills, $status);

if ($stmt->execute()) {
    echo "<h1>Thank you! Your application has been submitted successfully.</h1>";
} else {
    echo "<h1>Error: " . $stmt->error . "</h1>";
}

$stmt->close();
$conn->close();
?>
