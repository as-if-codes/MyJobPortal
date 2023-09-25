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
    <h2>Gender Distribution of Applicants</h2>
    <?php if (!empty($gender_distribution)): ?>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px;">Gender</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Count</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Percentage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gender_distribution as $row): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= $row->gender ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= $row->gender_count ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= number_format($row->gender_percentage, 2) ?>%
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data available for gender distribution.</p>
    <?php endif; ?>
    
    <h2>Top Recruiters</h2>
    <?php if (!empty($top_recruiters)): ?>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px;">Company Name</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Recruiter Name</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Total Jobs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_recruiters as $row): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= $row->company_name ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= $row->name ?>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <?= $row->total_jobs ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data available for top recruiters.</p>
    <?php endif; ?>

    <button class="btn btn-primary" style="font-size: 16px;
        text-decoration: none; margin-top: 20px;padding: 8px;
        color: #fff;
        background-color: #007bff;border: none;
        border-radius: 4px;  display: inline-block;
        margin-right: 10px;" onclick="printPage()">Print</button>

     <a href="/AdReport" style="
    display: flex;
    align-items: left;">View Application and Job Statistics</a></div></div><script>
                function printPage() {
                    window.print();
                }
            </script>
</body>

</html>