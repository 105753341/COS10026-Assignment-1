<?php 
    session_start();
    if (!isset($_SESSION['username'])) { //if username isnt set, return
        header("Location: manager_login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="managment page for HR deperartment to view EOI and other various functions">
    <meta name="keywords" content="HTML5, PHP, management">
    <meta name="author" content="Harrison Strachan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage - TechNova</title>
    <link rel="icon" type="image/png" href="images/faviconlogo.png">
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
</head>
 
<body>
    <!-- not modularised header here since we want to remove the linebreak -->
    <header>
        <a href="index.php"><img src="images/logo_cropped.png" alt="Company Logo"></a>
        <nav>
            <a href="index.php">Home Page</a> 
            <a href="jobs.php">Job Descriptions</a> 
            <a href="apply.php">Application Page</a>
            <a href="manager_login.php">Management</a>
            <a href="enhancements.php">Enhancements</a>
            <a href="about.php">Group details</a>
            <a href="mailto:info@technova.com.au">&#128231;</a> 
            </nav>
    </header>
    <section class="login-section">
        <h1>Welcome <u><em><?php echo htmlspecialchars($_SESSION['username']); ?></em></u></h1>
        <a href="process_logout.php" class="btn">Logout</a>
    </section>
    <hr>
    <h1 class="main-heads">Manage EOIs</h1>
    <hr>

    <form method="POST" action="manage.php">
        <h2>List EOIs</h2>
        <input type="submit" name="list_all" value="List All EOIs">

        <h2>List EOIs by Job Reference</h2>
        <label for="job_ref">Job Reference:</label>
        <input type="text" id="job_ref" name="job_ref">
        <input type="submit" value="Search by Job Reference">

        <h2>List EOIs by Name</h2>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name">
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name">
        <input type="submit" value="Search by Name">

        <h2>Delete EOIs by Job Reference</h2>
        <label for="delete_job_ref">Job Reference:</label>
        <input type="text" id="delete_job_ref" name="delete_job_ref">
        <input type="submit" value="Delete by Job Reference">

        <h2>Update Status of an EOI</h2>
        <label for="update_job_ref">EOI number:</label>
        <input type="text" id="update_job_ref" name="update_job_ref">
        <label for="statuss">Status:</label>
        <select id="statuss" name="statuss">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <input type="submit" value="Update Status">
    </form>

    <?php
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db); //opens connection to db

    if ($conn) {
        $result = null;

        if (isset($_POST['list_all'])) {  // If "List All" button is pressed, read all fields in EOI table

            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);
        }
                        
        // Lists EOI according to entered job reference number
        elseif (isset($_POST['job_ref']) && !empty($_POST['job_ref'])) {
            $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
            $query = "SELECT * FROM eoi WHERE job_ref_number LIKE '%$job_ref%'";
            $result = mysqli_query($conn, $query);
        }
        // Lists all EOI from a selected first/last name
        elseif (isset($_POST['first_name']) && !empty($_POST['first_name']) || isset($_POST['last_name']) && !empty($_POST['last_name'])) {
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $query = "SELECT * FROM eoi WHERE first_name LIKE '%$first_name%' OR last_name LIKE '%$last_name%'";
            $result = mysqli_query($conn, $query);
        }
        //all selected EOI deleted
        elseif (isset($_POST['delete_job_ref']) && !empty($_POST['delete_job_ref'])) {
            $delete_job_ref = mysqli_real_escape_string($conn, $_POST['delete_job_ref']);
            $query = "DELETE FROM eoi WHERE job_ref_number LIKE '%$delete_job_ref%'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<br>All EOI's with job reference number $delete_job_ref have been deleted. <br>";

                $query = "SELECT * FROM eoi";
                $result = mysqli_query($conn, $query);
            } else {
                echo "Error deleting EOI." . mysqli_error($conn);
            }
        }
        elseif (isset($_POST['update_job_ref']) && !empty($_POST['update_job_ref']) && isset($_POST['statuss']) && !empty($_POST['statuss'])) {
            $update_job_ref = mysqli_real_escape_string($conn, $_POST['update_job_ref']);
            $status = mysqli_real_escape_string($conn, $_POST['statuss']);
            $query = "UPDATE eoi SET status = '$status' WHERE EOInumber = '$update_job_ref'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<br>Status updated for EOI number: $update_job_ref. <br> ";

                $query = "SELECT * FROM eoi WHERE EOInumber = '$update_job_ref'";
                $result = mysqli_query($conn, $query);
            } else {
                echo "Error updating status." . mysqli_error($conn);
            }
        }

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<br>
            <div>
            <table id='manager-table' >
                    <thead>
                    <tr><th>EOI</th></tr>
                    </thead>
                        <tr>
                            <th>EOI Number</th>
                            <th>Job Reference</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Street Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>HTML</th>
                            <th>CSS</th>
                            <th>JS</th>
                            <th>Python</th>
                            <th>SQL</th>
                            <th>Other Skills</th>
                            <th>Status</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                            <td>" . $row["EOInumber"] . "</td>
                            <td>" . $row["job_ref_number"] . "</td>
                            <td>" . $row["first_name"] . "</td>
                            <td>" . $row["last_name"] . "</td>
                            <td>" . $row["dob"] . "</td>
                            <td>" . $row["gender"] . "</td>
                            <td>" . $row["street_address"] . "</td>
                            <td>" . $row["suburb"] . "</td>
                            <td>" . $row["state"] . "</td>
                            <td>" . $row["postcode"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td>" . $row["skill_html"] . "</td>
                            <td>" . $row["skill_css"] . "</td>
                            <td>" . $row["skill_js"] . "</td>
                            <td>" . $row["skill_python"] . "</td>
                            <td>" . $row["skill_sql"] . "</td>
                            <td>" . $row["other_skills"] . "</td>
                            <td>" . $row["status"] . "</td>
                        </tr>";
            }
            echo "</table>";
        }

        mysqli_close($conn); //closes database connection
    }

    else {
        echo "<p>Unable to connect to the database..</p>";  //prints this if can't connect to db
    }
    ?>

<?php include 'footer.inc';?>

</body>

</html>