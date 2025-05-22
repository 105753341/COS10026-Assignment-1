<?php
include("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <link rel="icon" type="image/png" href="images/faviconlogo.png">
    <link rel="stylesheet" href="stylesheet/styles.css">
</head>
<body>
<?php include 'header.inc';?>
<main class="description">
    <div id="jobs-content">
        <section id="jobs">
            <h2 class="hiring"><a href="#target-section" id="scroll-link">We're Hiring!</a></h2>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<article id="target-section">';
                    echo "<h2 class='main-heads'>" . htmlspecialchars($row['title']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<h3>Position Reference: </h3><p>" . htmlspecialchars($row['reference']) . "</p>";
                    echo "<h3>Reporting To: </h3><p>" . htmlspecialchars($row['reporting_to']) . "</p>";
                    echo "<h3 class='main-heads'>Key Responsibilities:</h3>" . $row['responsibilities'];
                    echo "<h3 class='main-heads'>Required Skills and Qualifications:</h3>" . $row['qualifications'];
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><strong>Salary:</strong> " . htmlspecialchars($row['salary']) . "</p>";
                    echo "<p><strong>Job Type:</strong> " . htmlspecialchars($row['job_type']) . "</p>";
                    echo '<a href="apply.php" class="btn">Apply Now</a>';
                    echo '</article>';
                }
            } else {
                echo "<p>No jobs available at the moment.</p>";
            }
            ?>
        </section>
        <aside>
            <h4>How to apply for a job?</h4>
            <ol>
                <li>Find the job you are interested in</li>
                <li>Check out requirements</li>
                <li>Get the Job Reference number</li>
                <li>Fill out the application form, and wait for the response</li>
            </ol>
        </aside>
    </div>
</main>
<?php include 'footer.inc';?>
</body>
</html>
<?php
mysqli_close($conn);
?>
