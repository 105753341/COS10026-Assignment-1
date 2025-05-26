<?php
    session_start();
    require_once("settings.php"); //opens the connection to the db
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    $_SESSION['error'] = null;

    if (!$conn) {
        die("Database connection failed: " .mysqli_connect_error()); //if connection failed print generic error + error returned
        }   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
            $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
        
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                
                $row = mysqli_fetch_assoc($result);

                if($username == $row['username'] && $password == $row['password']) {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password; //compares input to db
                    $_SESSION['error'] = null;

                    header("Location:manage.php"); //redirects to managers page (manage.php)
                    exit;
                    //die();
                }
                else {
                    $_SESSION['error'] = "Invalid username or password. Please try again";
                    header('Location: manager_login.php');
                    exit;
                    //prints invalid username or password on failed log in attempt
                }
            }

             else {
                    $_SESSION['error'] = "Invalid username or password. Please try again";
                    header('Location: manager_login.php');
                    exit;
                    //prints invalid username or password on failed log in attempt
                }
            mysqli_close($conn); //ends connection to db
        }
?>