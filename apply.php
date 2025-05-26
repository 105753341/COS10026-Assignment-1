<?php
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

  <h1>Welcome to TechNova Job Application</h1>
  <hr />

  <main>
    <section>
      <h2>Job Application Form</h2>
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

        <fieldset>
          <legend>Gender:</legend>
          <label for="male">Male</label>
          <input type="radio" id="male" name="gender" value="Male" required />
          <label for="female">Female</label>
          <input type="radio" id="female" name="gender" value="Female" required />
        </fieldset><br />

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
          <label><input type="checkbox" name="skills[]" value="HTML" /> HTML</label><br />
          <label><input type="checkbox" name="skills[]" value="CSS" /> CSS</label><br />
          <label><input type="checkbox" name="skills[]" value="JavaScript" /> JavaScript</label><br />
          <label><input type="checkbox" name="skills[]" value="Python" /> Python</label><br />
          <label><input type="checkbox" name="skills[]" value="SQL" /> SQL</label><br />
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
