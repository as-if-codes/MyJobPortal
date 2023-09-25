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
$user = session()->get('applicant');
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
            <div id="settings" style="flex-grow: 1; padding: 20px; overflow-y: auto;">
                <style>
                    .container {
                        display: grid;
                        grid-template-columns: repeat(2, 1fr);
                        grid-gap: 20px;
                        margin-bottom: 20px;
                    }

                    .section {
                        background-color: #f5f5f5;
                        padding: 20px;
                        border-radius: 5px;
                    }

                    .section h3 {
                        margin-top: 0;
                        color: #333;
                    }

                    .section form {
                        margin-top: 10px;
                    }

                    .section label {
                        display: block;
                        margin-bottom: 5px;
                        color: #555;
                    }



                    .section button[type="submit"] {
                        margin-top: 10px;
                        padding: 8px 16px;
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        border-radius: 3px;
                        cursor: pointer;
                    }

                    .section button[type="submit"]:hover {
                        background-color: #1976D2;
                    }
                </style>

                <div class="container">
                    <div class="section">
                        <h3>Update Profile</h3>
                        <form action="/updateAccount" method="post">
                            <label for="name">Name:</label>
                            <input type="text" class="input-field" name="name" id="name" value="<?= $user['name'] ?>"
                                required>
                            <label for="email">Email:</label>
                            <input type="email" class="input-field" name="email" id="email"
                                value="<?= $user['email'] ?>" required>
                            <label for="gender">Gender:</label>
                            <select name="gender" class="input-field" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" <?= $user['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= $user['gender'] === 'female' ? 'selected' : '' ?>>Female
                                </option>
                                <option value="other" <?= $user['gender'] === 'other' ? 'selected' : '' ?>>Other</option>
                            </select> <label for="phone_number">Phone Number:</label>
                            <input type="text" pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)" class="input-field" name="phone_number" id="phone_number"
                                value="<?= $user['phone_number'] ?>" required>
                            <label for="address">Address:</label>
                            <textarea name="address" class="input-field" id="address" rows="3"
                                required><?= $user['address'] ?></textarea>
                            <label for="date_of_birth">Date of Birth:</label>
                            <input type="date" class="input-field" name="date_of_birth" id="date_of_birth"
       value="<?= $user['date_of_birth'] ?>" required max="<?= date('Y-m-d') ?>"><br>

                            <button type="submit">Update Account</button>
                        </form>
                    </div>

                    <div class="section">
                        <h3>Change Password</h3>
                        <form action="/AChangePassword" method="post">
                            <label for="current_password">Current Password:</label>
                            <input type="password" class="input-field" name="current_password" id="current_password"
                                required>
                            <label for="new_password">New Password:</label>
                            <input type="password" class="input-field" name="new_password" id="new_password" required>
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="input-field" name="confirm_password" id="confirm_password"
                                required><br>
                            <button type="submit">Change Password</button>
                        </form>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
</body>

</html>