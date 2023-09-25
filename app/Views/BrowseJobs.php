<!DOCTYPE html>
<html lang="en"
 <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JobNexus - Find Your Dream Job</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="/asset/css/indexstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>
        <nav>
            <div class="logo">
                <img src="/asset/img/logoJN.jpg" alt="JobNexus Logo">
                <h1>JobNexus</h1>
            </div>

            <div class="asdf">
                <ul class="menu">
                    <li><a href="home">Home</a></li>
                    <li><a href="#job-search">Job Listings</a></li>
                    <li><a href="Register">SignUp</a></li>
                    <li><a href="Login">Login</a></li>

                </ul>
            </div>
        </nav>
    </header>
<center>
   
        
<div id="content" style="flex-grow: 1; padding: 20px; overflow-y: auto;">


<section id="job-search" class="job-search">
    <h3>Search for Jobs</h3>
    <form action="BrowseJobs" method="POST">
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
                    <a href="ApplyRequest" class="btn btn-primary"
                        style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply
                        Now</a>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div></center>
</div>
    </div>

</html>