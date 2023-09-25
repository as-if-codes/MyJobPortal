<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexus - Recruiter Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./asset/css/indexstyle.css">
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
                    <li><a href="home">Home</a></li>
                    <li><a href="home#job-search">Job Listings</a></li>
                    <li><a href="Register">SignUp</a></li>
                    <li><a href="Login">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>


    <section class="register-section">
        <div class="form-container">
            <h3>Register As A Recruiter  </h3>
            <br><br>
            <form action="RegisteringRecruiter" method="POST">

                 <input type="text" name="name" placeholder="Name" required class="input-field">
                <input type="password" name="password" placeholder="Password" required class="input-field">
                <input type="email" name="email" placeholder="Email" required class="input-field">
                <input type="tel" name="phone_number"  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)" placeholder="Phone Number" required class="input-field">
                <input type="text" name="company_name" placeholder="Company Name" required class="input-field">
                <input type="text" name="company_address" placeholder="Company Address" required class="input-field">
                <textarea name="about" placeholder="About the Company" required class="input-field"></textarea>

                <button type="submit" class="submit-button">Register</button>
            </form>
            <br>
            <p>Or <a href="Register">register as an applicant</a>.</p>
        </div>

    </section>

 
    <footer class="footer">
	<div class="copy">&copy; ASIF SAYYED</div>
	<div class="bottom-links">
		<div class="links">
			<span>More </span> <a href="./index.jsp">Home</a> <a href="./AboutUs.jsp">About</a> <a
				href="./Contact.jsp">Contact</a>
		</div>
		<div class="links">
			<span>Social Links</span> 
			
			<a href="https://github.com/as-if-codes"><i class="fab fa-github"></i></a>
			<a href="https://www.linkedin.com/in/asif-sayyedsd"><i class="fab fa-linkedin"></i></a> 
			<a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
			
		</div>
	</div>
</footer>
<style>
@import
	url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

body {
	margin: 0;
	box-sizing: border-box;
}

/* CSS for footer */
.footer {
    height: 200px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #000000;
    padding: 20px 90px;
}
.footer .copy {
    font-size: larger;
    color: #fff;
    font-family: math;
}
.bottom-links {
	display: flex;
	justify-content: space-around;
	align-items: center;
	padding: 40px 0;
}

.bottom-links .links {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 0 40px;
}

.bottom-links .links span {
	font-size: 20px;
	color: #fff;
	text-transform: uppercase;
	margin: 10px 0;
}

.bottom-links .links a {
	text-decoration: none;
	color: #a1a1a1;
	padding: 10px 20px;
}
</style>
</body>

</html>
