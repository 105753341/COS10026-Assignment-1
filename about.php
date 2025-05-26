<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A web page to view general info about our group">
    <meta name="keywords" content="TechNova, about us, team, student group, developer roles, members, contributions, html5, php">
    <meta name="author" content="Alexander">
    <title>About us</title>
    <link rel="icon" type="image/png" href="images/faviconlogo.png">
    <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
</head>

<body>
    <?php include 'header.inc';?>

    <!-- Show's page name -->
    <h1 class="main-heads">About us</h1>
    <hr>

    
    <main id="about-main">
        <!-- Generic "who we are" section, not required -->
        <section class="about-section">
                <h2>Who are we</h2>
                <!-- The following was generated using copilot AI for a generic "who we are", the prompt was: "create a generic "about us" section for a company called "tech nova"" -->
                <div>
                    <p>
                        At <em>Tech Nova</em>, innovation is at the heart of everything we do. We are a dynamic technology company committed to pushing boundaries and delivering cutting-edge solutions that empower businesses and individuals alike.
                    </p>
                    <p>
                        Our team of forward-thinkers, engineers, and creators work tirelessly to develop next-generation tools and services that simplify complexity, enhance efficiency, and drive progress. Whether it's software development, AI integration, or digital transformation, we pride ourselves on staying ahead of industry trends and providing smart, scalable solutions.
                    </p>

                    <p>
                        At <em>Tech Nova</em>, we believe that technology should be an enabler, not a limitation. Our mission is to redefine possibilities, foster growth, and create a future where businesses thrive through seamless innovation.
                    </p>
                </div>
        </section>

        <!-- Group details aside -->
        <aside id="about-aside">
            <h2>Group details</h2>
            
            <!-- List containing various group details -->
            <ul>
                <li>Group name: N/A</li>
                <li>Class time/day: 14:30 on Thursdays</li>
                <li>Student ID's:
                        <ul>
                            <li>Alexander: 105873100</li>
                            <li>Jashandeep: 105709247</li>
                            <li>Harri: 105753341</li>
                            <li>Sathil: 105516324</li>
                        </ul>
                </li>
                <li>Tutor's name: Enrique Nicolas Ketterer (Nick)</li>
            </ul>
        </aside>

        <!-- Member contributions section -->
        <section class="about-section">
            <h2>Member contributions</h2>
            <div>
            <!-- A definition list containing our group member contributions -->
            <dl id ="about-definition-list">
                <dt>Alexander</dt>
                <dd>
                    <ul>
                        <li>Responsible for submitting deliverables (assignment etc.)</li> 
                        <li>Responsible for developing the about.php</li>
                        <li>Shared responsibility: CSS file, jira</li>
                        <li>Responsible for using PHP to modularise common sections (footer/header)</li>
                        <li>Mainting the settings.php file</li>
                        <li>Updating the about.php page</li>
                        <li>Providing various enhancements/QOL features (TBD)</li>
                    </ul>
                </dd>
                <dt>Jashandeep</dt>
                <dd>
                    <ul>
                        <li>Responsible for developing the jobs.php page</li> 
                        <li>Shared responsibility: CSS file, jira</li>
                        <li>Responsible for jobs table in the MYSQL database</li>
                    </ul>
                </dd>
                <dt>Harri</dt>
                <dd>
                    <ul>
                        <li>Responsible for asking questions on behalf of the group of Canvas</li> 
                        <li>Responsible for developing the index.php</li>
                        <li>Shared responsibility: CSS file, jira</li>
                        <li>Responsible for developing manage.php page</li>
                    </ul>
                </dd>
                <dt>Sathil</dt>
                <dd>
                    <ul>
                        <li>Responsible for developing apply.php page</li> 
                        <li>Shared responsibility: CSS file, jira</li>
                        <li>Responsible for creating the eoi table in the MYSQL database</li>
                        <li>Responsible for developing processing_eoi.php, which takes input from the apply pages and adds an EOI record to the table</li>
                    </ul>
                </dd>
            </dl>
            </div>
        </section>

        <!-- Photo of your group -->
        <figure id="about-group-photo">
            <img src="images/group_photo.png" alt="A group photo of our member. From left to right: Alexander, Harri, Sathil and Jashandeep.">
            <figcaption>A group photo of our members</figcaption>
        </figure>


        <!-- Our interests -->
        <!-- Notes: scope attributes assists nonvisual users (i.e. blind), whilst rowspan/colspan allows us to merge cells -->
        <section class="about-section">
        <h2>Our interests</h2>
        <div>
        <table id="about-table">
            <caption><em>Interested in who we are? Have a look at what we do!</em></caption>

            <!-- table head -->
            <thead>
                <tr>
                    <th rowspan="2" scope="col">Name</th>
                    <th colspan="2" scope="col">Information</th>
                </tr>
                <tr>
                    <th scope="col">Interests</th>
                    <th scope="col">Skills</th>
                </tr>
            </thead>

            <tbody  id="about-table-body">
                <!-- Alexander info -->
                <tr>
                    <td>Alexander</td>
                    <td>
                        <ul>
                            <li>Eating</li>
                            <li>Sleeping</li>
                            <li>Chilling</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>C#</li>
                            <li>HTML</li>
                        </ul>
                    </td>
                </tr>

                <!-- Harri info -->
                <tr>
                    <td>Harri</td>
                    <td>
                        <ul>
                            <li>Wearing hats</li>
                            <li>Buying hats</li>
                            <li>Chilling</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Python</li>
                            <li>HTML</li>
                        </ul>
                    </td>
                </tr>

                <!-- Sathil info -->
                <tr>
                    <td>Sathil</td>
                    <td>
                        <ul>
                            <li>Owning cool glasses</li>
                            <li>Buying cool glasses</li>
                            <li>Chilling</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>PHP</li>
                            <li>HTML</li>
                        </ul>
                    </td>
                </tr>

                <!-- Jashandeep info -->
                <tr>
                    <td>Jashandeep</td>
                    <td>
                        <ul>
                            <li>HTML</li>
                            <li>Coding</li>
                            <li>Chilling</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Objective C</li>
                            <li>HTML</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        </section>
    </main>

    <?php include 'footer.inc';?>
</body>
</html>
