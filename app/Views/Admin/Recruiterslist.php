<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Admin Dashboard</title>
   
    <link rel="stylesheet" href="/asset/css/indexstyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 

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
        </div></nav>
    </header>
    <style>
      
    </style>
    </head>
    <body>
    <div id="container">
    <div id="sidebar">
        <div id="navigation">
            <ul>
                <li><a href="/AdminDashboard">Dashboard</a></li>
                <li><a href="/joblist">Jobs</a></li>                <li><a href="/RecruitersList">Recruiters</a></li>

                 <li><a href="/SettingsAd">Settings</a></li>
                 <li><a href="/AdReport">Reports</a></li>

            </ul>
        </div>
    </div>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
 
    <?php 
 
$admin = $_SESSION['admin'];
?>

    <div id="content">
        
        <h1>Welcome Admin, <?= $admin['name'] ?>!</h1>
        <body>
    <h3>Recruiters List</h3>
    
  

 

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Company Name</th>
        <th>Company Address</th>
    </tr>
    
    <?php foreach ($recruiters as $recruiter): ?>
        <tr>
            <td><?= $recruiter['name'] ?></td>
            <td><?= $recruiter['email'] ?></td>
            <td><?= $recruiter['phone_number'] ?></td>
            <td><?= $recruiter['company_name'] ?></td>
            <td><?= $recruiter['company_address'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

</body>
 