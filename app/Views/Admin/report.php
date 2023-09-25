<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="/asset/css/indexstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

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
                    <li><a href="/AdminDashboard">Dashboard</a></li>
                    <li><a href="/joblist">Jobs</a></li>
                    <li><a href="/RecruitersList">Recruiters</a></li>

                    <li><a href="/SettingsAd">Settings</a></li>
                    <li><a href="/AdReport">Reports</a></li>
                </ul>
            </div>
        </div>    
         <div id="content" style="flex-grow: 1; padding: 20px; overflow-y: auto; text-align: center;">
       

            <h2>Job Postings Report</h2>
            <?php if (!empty($jobPostingsReport)): ?>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px;">Month</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Job Postings Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobPostingsReport as $row): ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?= date('F', strtotime('2000-' . $row->month . '-01')) ?>
                                </td>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?= $row->job_postings_count ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No job postings in the current month.</p>
            <?php endif; ?><br>



<h2>Application Report</h2>
            <?php if (!empty($applicationReport)): ?>
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px;">Month</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Application Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applicationReport as $row): ?>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?= date('F', strtotime('2000-' . $row->month . '-01')) ?>
                                </td>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?= $row->application_count ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No applications in the current month.</p>
            <?php endif; ?>
            
            
            <button class="btn btn-primary" style="font-size: 16px;
    text-decoration: none; margin-top: 20px;padding: 8px;
    color: #fff;
    background-color: #007bff;border: none;
    border-radius: 4px;  display: inline-block;
    margin-right: 10px;" onclick="printPage()">Print</button>

<div id="content" style="flex-grow: 1; padding: 20px; overflow-y: auto; text-align: center;">
         <a href="/otherReport" style="
    display: flex;
    align-items: left;">View Top Recruiters and Applicant Statistics</a>
            <script>
                function printPage() {
                    window.print();
                }
            </script>
        </div>

    </div>
    </div>
</body>

</html>