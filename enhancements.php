<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="List the various enhancements made to the website" />
  <meta name="keywords" content="TechNova, enhancements, improvement" />
  <title>Enhancements - TechNova</title>
  <link rel="icon" type="image/png" href="images/faviconlogo.png" />
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css" />
</head>
<body>
    <?php include 'header.inc';?>
        
    <!-- Show's page name -->
    <h1 class="main-heads">Enhancements</h1>
    <hr>

    <!-- inherited styles from about page, since style of this page is very similar, not need to write new css -->
    <main id="about-main">
    <!-- Generic "who we are" section, not required -->
    <section class="about-section">
            <h2>Implemented suggested changes</h2>
            <!-- The following was generated using copilot AI for a generic "who we are", the prompt was: "create a generic "about us" section for a company called "tech nova"" -->
            <div>
                <ul>
                    <li>Increase whitespace / break up text in the index and jobs pages</li>
                    <li>Meta description/keywords for each page</li>
                    <li>Reduce image sizes to less than 300kb to improve peformance</li>
                    <!-- safetly display the <, >, and " chars -->
                    <li>Should use &lt;input type=&quot;date&quot;&gt; on the apply page</li> 
                    <li>Update checkbox naming so that all selections are captured</li>
                    <li>Use shorthand font property</li>
                </ul>
            </div>
    </section>
    </main>

    <?php include 'footer.inc';?>
</body>
</html>