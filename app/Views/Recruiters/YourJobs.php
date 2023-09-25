<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Recruiter Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="/asset/css/indexstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<?php
 
session_start();


$recruiter = $_SESSION['recruiter'];
?>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="/asset/img/logoJN.jpg" alt="JobNexus Logo">
                <h1>JobNexus</h1>
            </div>
            <div class="asdf">
                <ul class="menu">
                    <div class="cta-buttons">
                        <a href="/Logout" class="btn btn-primary">Logout</a>
                    </div>

                </ul>
            </div>
        </nav>
    </header>

    <div id="container">
        <div id="sidebar">
            <div id="navigation">
                <ul>
                <li><a href="/Rdashboard">Dashboard</a></li>
                    <li><a href="/PostJob">Post Job</a></li>
                    <li><a href="/YourJob">Your Jobs</a></li>
                    <li><a href="/RAccountSettings">Settings</a></li>
                    <li><a href="/Logout">Logout</a></li>
                     </ul>
            </div>
        </div>
        <style>
            table {
                width: 90%;
                 height: 0;
            }

            td {
                border: outset;
                
    text-align: center;
            }
            
            th {
                border-style: ridge;
            }
        </style>

<table style="padding: 5px">
    <thead>
        <tr>
            <th>Job ID</th>
            <th>Location</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Experience</th>
            <th>Applications</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $job->job_post_id ?></td>
                <td><?= $job->location ?></td>
                <td><?= $job->position ?></td>
                <td><?= $job->salary ?></td>
                <td><?= $job->experience ?></td>
                <td><?= $job->application_count ?></td>
                <td>
                <a href="<?= ('/AppView/' . $job->job_post_id . '/' . $recruiter['recruiter_id']) ?>">View Applications</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>


</body>

</html>