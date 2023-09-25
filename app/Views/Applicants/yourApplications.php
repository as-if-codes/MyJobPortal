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
        <h2>Your Applications</h2>
<?php if (empty($applications)) { ?>
    <h3 style ="color :blueviolet">You haven't applied for any job yet.</h3>
<?php } else { ?>
    <table>
        <thead>
            <tr>
                <th>Application ID</th> 
                <th>Status</th>
                <th>Date Applied</th>
                <th>Resume</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application) { ?>
                <tr>
                    <td>
                        <?php echo $application->application_id; ?>
                    </td>
                
                    <td>
                        <?php echo $application->status; ?>
                    </td>
                    
                    <td>
                        <?php echo $application->applied_date; ?>
                    </td> 
                    <td>
                        <a href="/resumes/<?php echo $application->applicant_id."/".$application->resume; ?>" target="_blank" class="btn btn-primary">View Resume</a>
                    </td>
                    <td>
                        <form action="/deleteApplication" method="post" onsubmit="return confirm('Are you sure you want to delete this application?')">
                            <input type="hidden" name="application_id" value="<?= $application->application_id ?>">
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
        </tbody>
    </table>
</div>

<style>
    #content {
        flex-grow: 1;
        padding: 20px;
        overflow-y: auto;
    }

    #content h2 {
        margin-bottom: 10px;
    }

    #content table {
        width: 100%;
        border-collapse: collapse;
    }
    button.btn.btn-primary {
    padding: 5px 9px;
    font-size: 16px;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}
    #content th,
    #content td {
        text-align-last: center;
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }
</style>

</body>

</html>