<?php 
    session_start();
    if (!isset($_SESSION['username'])) { //if username isnt set, return with error
        $_SESSION['error'] = "Please login first before trying to access the manage pages.";
        header("Location: manager_login.php");
        exit();
    }

    // grab error message from session (if any)
    $error = $_SESSION['error'] ?? "When signing up, please make sure both the username is unique, as well as the password containing a minumum of 8 charecters, a number and a special char."; 
    //shorthand conditional, if set and not null, assign session error to local error var
    //otherwise display generic message about unique username and password following rules
    unset($_SESSION['error']); // clear error after storing it
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
    <?php include 'header_manager.inc';?>

    <hr>
    <h1 class="main-heads">Manager Sign Up</h1>
    <hr>

    <form method="post" action="process_signup.php">
        <?php include 'user_credentials_box.inc';?>
        <input type="submit" value="Sign up">
    </form>

    <?php include 'footer.inc';?>
</body>
</html>