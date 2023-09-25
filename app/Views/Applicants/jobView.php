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
        <img src="/asset/img/logoJN.jpg" alt="JobNexus Logo">
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


      <div class="container">
        <div class="job-info">
        <h3><strong><?= $job->position ?></strong></h3>
<p>Company: <?= $job->company_name ?></p>
<p>Location: <?= $job->location ?></p>
<p>Skills Required: <?= $job->skills_required ?></p>
<p>Salary: <?= ($job->salary <= 0) ? 'Not Disclosed' : 'Rs. ' . $job->salary . '/month' ?></p>
<p>Experience: <?= ($job->experience == 0) ? "freshers" : $job->experience . " year" ?></p>
<p>Description: <?= $job->description ?></p>
<p>About Us: <?= $job->about ?></p>

        </div>
        <div class="apply-form">
  <form action="/submitApplication" method="post" enctype="multipart/form-data">
    <input type="hidden" name="job_post_id" value="<?= $job->job_post_id ?>">
    <input type="hidden" name="applicant_id" value="<?= $applicant['applicant_id'] ?>">

    <div class="form-group" style="font-size: large;">
      <label for="experience">Experience:</label>
      <input type="text" style="font-size: large;" name="experience" id="experience">
    </div>

    <div class="form-group">
      <label for="resume">Resume: <span style="color: red">*</span></label>
      <input type="file" name="resume" id="resume" accept=".pdf" style="font-size: large;" required>
      <small style="font-size: 12px; color: #999;"> <br>Do include all your Educational Qualifications and work experience in it.<br>Please upload your resume in PDF format.</small>
    </div>

    <div class="cta-buttons">
      <button type="submit" class="btn btn-primary"
        style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Apply
        Now</button>
    </div>
  </form>
</div>
 
 
      </div>

      <style>
        .container {
          display: flex;
          justify-content: space-between;
          align-items: flex-start;
        }

        .job-info {

          border-bottom-style: solid;
          padding: 20px;
          border-top-style: solid;
          color: #717b7b;
          font-family: system-ui;

          flex-basis: 50%;
          padding-right: 20px;
        }

        .apply-form {

          padding-left: 20px;
          flex-basis: 50%;
          padding: 30px 20px 20px 40px;
        }

        .job-info h3 {
          font-size: 24px;
          margin-bottom: 10px;
        }

        .job-info p {
          margin-bottom: 5px;
        }

        .apply-form form {
          max-width: 400px;
        }

        .apply-form label {
          display: block;
          margin-bottom: 10px;
        }

        .apply-form input[type="text"],
        .apply-form input[type="email"],
        .apply-form input[type="tel"] {
          width: 100%;
          padding: 8px;
          margin-bottom: 10px;
          border-radius: 4px;
          border: 1px solid #ccc;
        }

        .apply-form input[type="submit"] {
          padding: 10px 20px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 5px;
          font-size: 14px;
          cursor: pointer;
        }
      </style>


    </div>
  </div>

</body>

</html>