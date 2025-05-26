<?php
    session_start();
?>

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
<body>

    <?php include 'header.inc';?>

    <h1 class="main-heads">Manager LOGIN</h1>
    <hr>

    <form method="post" action="process_login.php">
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <br>

        <input type="hidden" name="token" value="manager">
        <input type="submit" value="Login">
    </form>

    <?php include 'footer.inc';?>
</body>
</html>