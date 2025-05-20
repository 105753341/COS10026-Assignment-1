<?php
include("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed");
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
<header>
    <a href="index.php"><img src="images/logo_cropped.png" alt="Company Logo"></a>
    <nav>
        <a href="index.php">Home Page</a>
        <a href="apply.php">Application Page</a>
        <a href="about.php">Group Details</a>
        <a href="mailto:info@technova.com.au">&#128231;</a>
    </nav>
    <hr>
</header>
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
<footer class="footer">
    <div class="footer-section">
        <h2>TechNova</h2>
        <p>TechNova Solutions offers innovative IT services since 2004 and seeks passionate talent to join its growth-focused team.</p>
    </div>
    <div class="footer-section">
        <h3>Pages</h3>
        <ul>
            <li><a href="index.php" class="webpages">Home</a></li>
            <li><a href="jobs.php" class="webpages">Jobs</a></li>
            <li><a href="apply.php" class="webpages">Apply</a></li>
            <li><a href="about.php" class="webpages">About us</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Developers</h3>
        <ul>
            <li>Alexander Giantsos</li>
            <li>Jashandeep Kaur</li>
            <li>Harri Strachan</li>
            <li>Sathil Chathwara Weerakkodi</li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>&copy;2025 TechNova All Rights Reserved</p>
        <p><a href="https://cos10026-web-project.atlassian.net" class="jira_proj" target="_blank">Jira</a></p>
    </div>
</footer>
</body>
</html>
<?php
mysqli_close($conn);
?>
<?php
include("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed");
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore job listings at TechNova. We're hiring Network Administrators and Cybersecurity Analysts.">
    <meta name="keywords" content="TechNova, job listings, cybersecurity analyst, network administrator, careers, IT jobs">
    <title>Job Listings</title>
    <link rel="icon" type="image/png" href="images/faviconlogo.png">
    <link rel="stylesheet" href="stylesheet/styles.css">
</head>
<body>
<header>
    <a href="index.php"><img src="images/logo_cropped.png" alt="Company Logo"></a>
    <nav>
        <a href="index.php">Home Page</a>
        <a href="apply.php">Application Page</a>
        <a href="about.php">Group Details</a>
        <a href="mailto:info@technova.com.au">&#128231;</a>
    </nav>
    <hr>
</header>

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

<footer class="footer">
    <div class="footer-section">
        <h2>TechNova</h2>
        <p>TechNova Solutions offers innovative IT services since 2004 and seeks passionate talent to join its growth-focused team.</p>
    </div>
    <div class="footer-section">
        <h3>Pages</h3>
        <ul>
            <li><a href="index.php" class="webpages">Home</a></li>
            <li><a href="jobs.php" class="webpages">Jobs</a></li>
            <li><a href="apply.php" class="webpages">Apply</a></li>
            <li><a href="about.php" class="webpages">About us</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Developers</h3>
        <ul>
            <li>Alexander Giantsos</li>
            <li>Jashandeep Kaur</li>
            <li>Harri Strachan</li>
            <li>Sathil Chathwara Weerakkodi</li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>&copy;2025 TechNova All Rights Reserved</p>
        <p><a href="https://cos10026-web-project.atlassian.net" class="jira_proj" target="_blank">Jira</a></p>
    </div>
</footer>
</body>
</html>
<?php
mysqli_close($conn);
?>
