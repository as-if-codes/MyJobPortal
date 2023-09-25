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
$applicant = session()->get('applicant');
 
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
    <?php foreach ($data as $item): ?>
        <div class="dashboard-card">
    <h3 style="font-size: 18px; margin-bottom: 10px;"><strong><?= $item['job']->position ?></strong></h3>
    <p><strong>Location:</strong> <?= $item['job']->location ?></p>
    <p><strong>Skills Required:</strong> <?= $item['job']->skills_required ?></p>
    <?php if ($item['job']->salary <= 0): ?>
        <p><strong>Salary:</strong> Not Disclosed</p>
    <?php else: ?>
        <p><strong>Salary:</strong> <?= $item['job']->salary ?></p>
    <?php endif; ?>
    <p><strong>Recruiter:</strong> <?= $item['recruiter']->company_name ?></p>
    <p><strong>Experience:</strong> <?= $item['job']->experience ?></p>
    <a href="applyjob/<?= $item['job']->job_post_id ?>" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply Now</a>
</div>

<?php endforeach; ?>
    </div>
</div>



        </div>
    </div>

</body>

</html>