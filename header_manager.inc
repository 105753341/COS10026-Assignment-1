<!-- why not just use header.inc for first part? because we don't want the hr in the original header.inc -->
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
    <div>
        <a href="manage.php" class="btn">Manage</a>
        <a href="manager_signup.php" class="btn">Manager registration</a>
        <a href="process_logout.php" class="btn">Logout</a>
    </div>
</section>