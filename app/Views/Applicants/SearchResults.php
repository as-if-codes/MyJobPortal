<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Applicant Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="/asset/css/indexstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
$recruiter = session()->get('applicant');

$applicant = $_SESSION['applicant'];
?>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="./asset/img/logoJN.jpg" alt="JobNexus Logo">
                <h1>JobNexus</h1>
            </div>
            <div class="asdf">
                <ul class="menu">
                    <div class="cta-buttons">
                        <a href="Logout" class="btn btn-primary">Logout</a>
                    </div>
                </ul>
            </div>
        </nav>
    </header>

    <div id="container">
        <div id="sidebar">
            <div id="navigation">
                <ul>
                    <li><a href="/Adashboard">Dashboard</a></li>
                    <li><a href="/SearchJobs">Search Jobs</a></li>
                    <li><a href="/YourApplications">Your Applications</a></li>
                    <li><a href="/AccountSettings">Settings</a></li>
                    <li><a href="/Logout">Logout</a></li>
                </ul>
            </div>
        </div>

        <div id="content" style="flex-grow: 1; padding: 20px; overflow-y: auto;">


            <section id="job-search" class="job-search">
                <h3>Search for Jobs</h3>
                <form action="SearchingJobs" method="POST">
                    <input type="text" name="keywords" placeholder="Job title">
                    <input type="text" name="location" placeholder="Location">
                    <button type="submit">Search</button>
                </form>
            </section>
            <div class="dashboard-section">
                <div class="dashboard-content">

                    <?php if (empty($results)): ?>
                        <p>No results found.</p>
                    <?php else: ?>

                        <?php foreach ($results as $result): ?>
                            <div class="dashboard-card">
                                <h3>
                                    <strong>
                                        <?= $result->position ?>
                                    </strong>
                                </h3>
                                <p>
                                    <strong>Company Name:</strong>
                                    <?= $result->company_name ?>
                                </p>
                                <p>
                                    <strong>Location:</strong>
                                    <?= $result->location ?>
                                </p>
                                <?php if ($result->salary <= 0): ?>
                                    <p>
                                        <strong>Salary:</strong> Not Disclosed
                                    </p>
                                <?php else: ?>
                                    <p>
                                        <strong>Salary:</strong> Rs.
                                        <?= $result->salary ?>/month
                                    </p>
                                <?php endif; ?>
                                <a href="applyjob/<?= $result->job_post_id ?>" class="btn btn-primary"
                                    style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply
                                    Now</a>

                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>