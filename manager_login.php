<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Header">
    <meta name="keywords" content="HTML5, PHP">
    <meta name="author" content="Harrison Strachan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/styles.css">
    
</head>


    <?php
        session_start();
        require_once("settings.php"); //opens the connection to the db
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($conn) {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
            
                $query = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    
                    $row = mysqli_fetch_assoc($result);

                    if($username == $row['username'] && $password == $row['password']) {
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;

                        header("Location:manage.php"); //redirects to managers page (manage.php)
                        die();
                    }
                    else {
                        echo "<p>Invalid username or password.</p>"; 
                        //prints invalid username or password on failed log in attempt
                    }
                }

                mysqli_close($conn); //ends connection to db
            }
        }
    ?>

    
<body>
    <h1>Manager LOGIN</h1>

    <form method="post" action="login_manager.php">
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <br>

        <input type="hidden" name="token" value="manager">
        <input type="submit" value="Login">
    </form>
</body>
</html>