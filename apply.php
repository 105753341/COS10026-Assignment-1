<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Apply for jobs at TechNova. Submit your job application to join our innovative IT team." />
  <meta name="keywords" content="TechNova, job application, apply online, tech jobs, IT careers" />
  <title>Job Application - TechNova</title>
  <link rel="icon" type="image/png" href="images/faviconlogo.png" />
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css" />
</head>
<body>

  <?php include 'header.inc'; ?>

  <h1 class="main-heads">Welcome to TechNova Job Application</h1>
  <hr />

  <main>
    <section>
      <h2 class="main-heads">Job Application Form</h2>
      <form action="process_eoi.php" method="POST" novalidate="novalidate">
        <label for="jobRef">Job Reference Number:</label>
        <select id="jobRef" name="jobRef" required>
          <option value="" disabled selected>Select a job reference</option>
          <option value="CYB71">CYB71</option>
          <option value="NET17">NET17</option>
        </select><br />

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" maxlength="20" pattern="[A-Za-z]+" required title="Only letters are allowed" /><br />

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" maxlength="20" pattern="[A-Za-z]+" required title="Only letters are allowed" /><br />

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required /><br />

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
          <option value="">--Select--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select><br />

        <label for="address">Street Address:</label>
        <input type="text" id="address" name="address" maxlength="40" required /><br />

        <label for="suburb">Suburb/Town:</label>
        <input type="text" id="suburb" name="suburb" maxlength="40" required /><br />

        <label for="state">State:</label>
        <select id="state" name="state" required>
          <option value="" disabled selected>Select a state</option>
          <option value="VIC">VIC</option>
          <option value="NSW">NSW</option>
          <option value="QLD">QLD</option>
          <option value="NT">NT</option>
          <option value="WA">WA</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="ACT">ACT</option>
        </select><br />

        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode" maxlength="4" pattern="\d{4}" title="Enter a 4-digit postcode" required /><br />

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required /><br />

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="\d{8,12}" title="Phone number must be 8 to 12 digits" required /><br />

        <fieldset>
          <legend>Skills:</legend>
          <label><input type="checkbox" name="skill_html" value="1"> HTML</label><br />
          <label><input type="checkbox" name="skill_css" value="1"> CSS</label><br />
          <label><input type="checkbox" name="skill_js" value="1"> JavaScript</label><br />
          <label><input type="checkbox" name="skill_python" value="1"> Python</label><br />
          <label><input type="checkbox" name="skill_sql" value="1"> SQL</label><br />
        </fieldset><br />

        <label for="otherSkills">Other Skills:</label><br />
        <textarea id="otherSkills" name="otherSkills" rows="4" cols="50"></textarea><br />

        <button type="submit">Apply</button>
        <button type="reset">Reset</button>
      </form>
    </section>
  </main>

  <?php include 'footer.inc'; ?>
</body>
</html>
