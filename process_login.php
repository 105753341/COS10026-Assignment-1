<?php
    session_start();
    require_once("settings.php"); //opens the connection to the db
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    $_SESSION['error'] = null;

    if (!$conn) {
        die("Database connection failed: " .mysqli_connect_error()); //if connection failed print generic error + error returned
        }   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            //prepare statement to prevent sql injection attacks
            $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    

            //if a user is found with the entered username
            // ($user is now an associative array, $user['password'] returns retrieved hashed password)
            // ($user['username'] would return username)
            if ($user = $result->fetch_assoc()) {
                // verify the entered password with the hashed password in the database
                if (password_verify($password, $user['password'])) {
                    // regenerate session ID to prevent session fixation attacks
                    session_regenerate_id(true);
                    // save the username in the session to track the user login status
                    $_SESSION['username'] = $user['username'];
                    header('Location:manage.php'); //redirects to managers page (manage.php)
                    exit;
                }
            }
            // If login fails, store an error message (no details revealed for security), this will only executed if the any of the above conditionals arent met
            $_SESSION['error'] = "Invalid username or password. Please try again.";
            header('Location:manager_login.php');
            exit;
        }
?>