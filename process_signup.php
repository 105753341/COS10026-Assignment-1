<?php
    session_start();
    require_once("settings.php"); //opens the connection to the db
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    $_SESSION['error'] = null;
    $error = false;

    if (!$conn) {
        die("Database connection failed: " .mysqli_connect_error()); //if connection failed print generic error + error returned
        }   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
            $password = mysqli_real_escape_string($conn, $_POST['password']); //do not trim space in passwords, some people might have!
        
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            //$result = mysqli_query($conn, $query); not yet

            //not needed technically since form input can't be empty, but just incase for cybersec
            if (!isset($username)) {
                $_SESSION['error'] = "Username is required.";
                $error = true;
            }
            else {
                // check if username unique 
                $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ?"); //? will be replaced with username in next line
                $stmt->bind_param("s", $username); //binds param (username, of type string) to our sql statement, done to prevent sql injections
                $stmt->execute(); //now actually run the statement
                $stmt->store_result(); //store result, since we still need to check if a username is already in db
                if ($stmt->num_rows > 0) { //if more than 1 row matched, than our username inputted is taken
                    $_SESSION['error'] = "Username already taken.";
                    $error = true;
                }
            }

            // check if password meets our requirements 
            //reject password if under 8 charecters, or if it doesn't contain digit
            // '/\d/' means any digit
            // '[^a-zA-Z0-9]' means not a number or digit
            // preg means peform regex
            // remember ! is negation and || is or
            if (strlen($password) < 8 || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) { 
                $_SESSION['error'] = "Password must be at least 8 characters and contain a number and a special char.";
                $error = true;
            }


            if ($error == false)
            {
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)"); //now 2 params
                $stmt->bind_param("ss", $username, $password); //refer to previous, ss just means string string
                $_SESSION['error'] = "User succesfully signed up"; 
                $stmt->execute();
                
                header("Location: manager_signup.php");
                exit;
                //maybe bad practice to use "error" session, but serves the purpose we need
            }
            else {
                //no need to set session error, as will be set from previous conditionals
                header("Location: manager_signup.php");
                exit;
            }
        }
?>