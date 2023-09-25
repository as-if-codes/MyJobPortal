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

<?php    { 
    $recruiter = session()->get('recruiter');

}
 
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
                <a href="/Logout" class="btn btn-primary">Logout</a>
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
      
        <section class="register-section">
    <div class="form-container">
        <h3>Post a Job</h3>
      
        <form action="SaveJobPost" method="POST">
        <input type="text" name="position" placeholder="Position" required class="input-field">
        <textarea name="description" placeholder="Job Description" required class="input-field"></textarea>

            <input type="text" name="skills_required" placeholder="Skills Required" required class="input-field">
            <input type="text" name="salary" placeholder="Salary (0 if don't want to desclose)"   class="input-field">
            <input type="text" name="experience" placeholder="Experience" required class="input-field">
            <input type="text" name="location" placeholder="Location" required class="input-field">
            <input type="hidden" name="recruiter_id" value="<?= $recruiter['recruiter_id'] ?>"  placeholder="Recruiter ID" required class="input-field">
            <button type="submit" class="submit-button">Post Job</button><br>
 
        </form>
    </div> 
    </div>
</div>

</body>
</html>
