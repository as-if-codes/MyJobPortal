<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Recruiter Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./asset/css/indexstyle.css">
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
            <img src="./asset/img/logoJN.jpg" alt="JobNexus Logo">
            <h1>JobNexus</h1>
        </div>
        <div class="asdf">
            <ul class="menu"> 
                <div class="cta-buttons">
                <a href="Logout" class="btn btn-primary">Logout</a>
             </div>

            </ul>
        </div></nav>
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
   <div id="content">
    <h1>Welcome, <?php echo $recruiter['name']; ?>!</h1>
    <section class="dashboard-section">
            <div class="dashboard-content">
                <div class="dashboard-card">
                    <h3>Total Applicants</h3>
                    <p><?= count($applicants)  ?></p>
 
                </div>
                <div class="dashboard-card">
                    <h3>Total Recruiters</h3>
                    <p><?= count($recruiters) ?></p>
 
                </div>
                <div class="dashboard-card">
                    <h3>Total Jobs</h3>
                    <p><?=count($jobs) ?></p>
                </div>
                
        <div class="dashboard-card">
            <h3>Applicants Placed</h3>
            <p><?=$approvedApplicantsCount ?></p>
        </div>
      
       
        </div>
    </div>
    

</body>
</html>
