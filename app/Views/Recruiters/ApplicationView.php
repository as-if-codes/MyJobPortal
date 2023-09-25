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

<style>
    .status-dropdown {
        width: 100%;
        padding: 5px;
        text-align: center;
        border: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

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

    th,
    td {
        padding: 8px;

        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

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


        <table style="margin:20px">
            <thead>
                <tr>
                    <th>Applicant Name</th>
                    <th>Experience</th>
                    <th>Applicant Email</th>
                    <th>Applicant Address</th>
                    <th>Applied On</th>
                    <th>Status</th>
                     
                    <th>Resume</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td>
                            <?= $item['applicant']->name ?>
                        </td>
                        <td>
                            <?= $item['application']->Experience . " year" ?>
                        </td>
                        <td>
                            <?= $item['applicant']->email ?>
                        </td>
                        <td>
                            <?= $item['applicant']->address ?>
                        </td>
                        <td>
                            <?= date('Y-m-d H:i:s', strtotime($item['application']->applied_date)) ?>
                        </td>
                         
                        <td>
                            <form action="/updateStatus" method="post">
                                <input type="hidden" name="application_id"
                                    value="<?= $item['application']->application_id ?>">
                                    <select name="status" class="status-dropdown" onchange="confirmStatusChange(this)">
                                    <option value="pending" <?= $item['application']->status == 'pending' ? 'selected' : '' ?>>
                                        Pending</option>
                                    <option value="approved" <?= $item['application']->status == 'approved' ? 'selected' : '' ?>>
                                        Approved</option>
                                    <option value="rejected" <?= $item['application']->status == 'rejected' ? 'selected' : '' ?>>
                                        Rejected</option>
                                    <option value="shortlisted" <?= $item['application']->status == 'shortlisted' ? 'selected' : '' ?>>
                                        Shortlisted</option>
                                       
                                </select>
                            </form>
                        </td>

                        <script>
                            function confirmStatusChange(selectElement) {
                                var confirmed = confirm("Are you sure you want to change the status?");
                                if (confirmed) {
                                    selectElement.parentNode.submit();
                                }
                            }
                        </script>



                        <td>
                            <a href="/resumes/<?= $item['applicant']->applicant_id ?>/<?= $item['application']->resume ?>"
                                target="_blank" class="btn btn-primary">View Resume</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>

</html>
</div>