<?php
    session_start();

    // If user is already logged in, redirect to manage page
    if (isset($_SESSION['username'])) {
        header("Location: manage.php");
        exit();
    }

    // grab error message from session (if any)
    $error = $_SESSION['error'] ?? ''; //shorthand conditional, if set and not null, assign session error to local error var
    //otherwise empty string (we want the empty string so when we store local $error in label, if there's nothing in the var nothing will be shown)
    unset($_SESSION['error']); // clear error after storing it
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="A page for people to login to the manage.php page">
    <meta name="keywords" content="HTML5, PHP, login, managment">
    <meta name="author" content="Harrison Strachan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager login - TechNova</title>
    <link rel="icon" type="image/png" href="images/faviconlogo.png">
    <link rel="stylesheet" href="stylesheet/styles.css">
    
</head>    
<body>

    <?php include 'header.inc';?>

    <h1 class="main-heads">Manager LOGIN</h1>
    <hr>

    <form method="post" action="process_login.php">
        
        <?php include 'user_credentials_box.inc';?>
        <input type="submit" value="Login">
    </form>

    <?php include 'footer.inc';?>
</body>
</html>