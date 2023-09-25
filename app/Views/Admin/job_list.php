<?php
session_start();
if (!isset($_SESSION['admin'])) {
   
    $admin = $_SESSION['admin'];
}

$admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Admin Dashboard</title>
   
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
                <li><a href="/AdminDashboard">Dashboard</a></li>
                <li><a href="/joblist">Jobs</a></li>        
                        <li><a href="/RecruitersList">Recruiters</a></li>

                 <li><a href="/SettingsAd">Settings</a></li>
                 <li><a href="/AdReport">Reports</a></li>
                </ul>
            </div>
        </div>

        <div id="content">
            <h1>Welcome Admin, <?= $admin['name'] ?>!</h1>
             
            <style>
                .job-list-table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .job-list-table th,
                .job-list-table td {
                    padding: 8px;
                    border: 1px solid #ddd;
                }

                .job-list-table th {
                    background-color: #f2f2f2;
                }

                .job-list-table tr:hover {
                    background-color: #f5f5f5;
                }

                .job-list-table td.actions {
                    text-align: center;
                }

                .job-list-table form {
                    display: inline;
                }

                .job-list-table button {
                    padding: 6px 10px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    cursor: pointer;
                }

                .job-list-table button:hover {
                    background-color: #c82333;
                }
            </style>

<style>
  .job-list-table {
    width: 100%;
    border-collapse: collapse;
  }

  .job-list-table th,
  .job-list-table td {
    padding: 8px;
    border: 1px solid #ddd;
  }

  .job-list-table th {
    background-color: #f2f2f2;
  }

  .job-list-table tr:hover {
    background-color: #f5f5f5;
  }

  .job-list-table td.actions {
    text-align: center;
  }

  .job-list-table form {
    display: inline;
  }

  .job-list-table button {
    padding: 6px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .job-list-table button:hover {
    background-color: #c82333;
  }
</style>

<table class="job-list-table">
  <thead>
    <tr>
      <th>Position</th>
      <th>Company Name</th>
      <th>Location</th>
      <th>Salary</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $result): ?>
      <tr>
        <td><?= $result->position ?></td>
        <td><?= $result->company_name ?></td>
        <td><?= $result->location ?></td>
        <td><?= ($result->salary <= 0) ? 'Not Disclosed' : 'Rs. ' . $result->salary . '/month' ?></td>
        <td class="actions">
          <form action="/AdeleteJob" method="post">
            <input type="hidden" name="job_post_id" value="<?= $result->job_post_id ?>">
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>
    </div>
</body>
</html>
