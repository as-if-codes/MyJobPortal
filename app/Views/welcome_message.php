<!DOCTYPE html>
<html lang="en"
 <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JobNexus - Find Your Dream Job</title>
<link rel="stylesheet" href="./indexstyles.css">
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

    <section class="hero">
        <div class="hero-content">
            <h2>Find Your Dream Job</h2>
            <p>Search and apply for thousands of job opportunities</p>
            <div class="cta-buttons">
                <a href="#job-search" class="btn btn-primary">Search Jobs</a>
                <a href="RegisterRecruiter" class="btn btn-secondary">Post a Job</a>
            </div>
        </div>
    </section>

    <section id="job-search" class="job-search">
        <h3>Search for Jobs</h3>
        <form action="BrowseJobs" method="POST">
            <input type="text" name="keywords" placeholder="Keywords">
            <input type="text" name="location" placeholder="Location">
            <button type="submit">Search</button>
        </form>
    </section>

    <section class="featured-jobs">
        <h3>Featured Job Listings</h3>
        <div class="dashboard-section">
    <div class="dashboard-content">

        
                            <div class="dashboard-card">
                    <h3>
                        <strong>
                            Technical Support                        </strong>
                    </h3>
                    <p>
                        <strong>Company Name:</strong>
                        XYZ Solution                    </p>
                    <p>
                        <strong>Location:</strong>
                        Delhi , Pune , Ahmednagar                    </p>
                                            <p>
                            <strong>Salary:</strong> Rs.
                            50000.00/month
                        </p>
                                        <a href="ApplyRequest" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply
                        Now</a>

                </div>
                            <div class="dashboard-card">
                    <h3>
                        <strong>
                            Technical Support                        </strong>
                    </h3>
                    <p>
                        <strong>Company Name:</strong>
                        XYZ Solution                    </p>
                    <p>
                        <strong>Location:</strong>
                        Delhi , Pune , Ahmednagar , Hyderabad                    </p>
                                            <p>
                            <strong>Salary:</strong> Not Disclosed
                        </p>
                                        <a href="loginpopup" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply
                        Now</a>

                </div>
            
            </div>
</div>

        </div>
    </section>
    <br><br>
    <footer class="footer">
        <div class="copy">&copy; JOB.NEXUS@ASIF.SAYYED</div>
        <div class="bottom-links">
            <div class="links">
                <span>More </span> <a href="home">Home</a> <a href="">About</a> <a href="">Contact</a>
            </div>
            <div class="links">
                <span>Social Links</span>

                <a href="https://github.com/as-if-codes"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/asif-sayyedsd"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>

            </div>
        </div>
    </footer>
    
</body>

</html>