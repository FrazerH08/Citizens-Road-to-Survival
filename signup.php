<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <script src="nav.js" defer></script>
</head>
<body>
    <header class="header">
        <div class="header_content">
            <a href="index.php" class="logo">Citizens' Road to&nbsp;<b>Survival</b></a>
            <nav class="nav">
                <ul class="nav_list">

                    <li class="nav_item"> <a href="list_articles.php" class="nav_link">News</a></li>
                    <li class="nav_item"> <a href="dashboard.php" class="nav_link">Dashboard</a></li>
                    <li class="nav_item"> <a href="login.php" class="nav_link">Login</a></li>
                    <li class="nav_item"> <a href="signup.php" class="nav_link">Sign up</a></li>
                    <li class="nav_item"> <a href="feedback.php" class="nav_link">Feedback</a></li>
                </ul>
            </nav>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </header>
     <h2 class="title"><u>Create Your account</u></h2>
    
    <!-- register form -->
    <section class="section">
    <div class="wrapper">
        <div class="logreg-box">
     <div class="form-box register">
                <div class="logreg-title">
                    <h2 class="title">Create your account</h2>
                    <p> if you want to survive. </p>
                </div>
        <form class="login-form" action="account_validation.php" method='POST'>
                <div class="input-box">
                    <input type="text" class="box" name="firstname" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="firstname"><b>First name:</b></label>
                </div>
                <div class="input-box">
                    <input type="text" class="box" name="lastname" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="lastname"><b>Surname:</b></label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-user"></i></span>
                    <input type="text" class="box" name="username" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="username"><b>Username:</b></label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-envelope"></i></span>
                    <input type="text" class="box" name="email" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="email"><b>Email:</b></label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-calendar"></i></span>
                    <input type="date" class="box" name="birthdate" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="dob"><b>Date of birth:</b></label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-lock"></i></span>
                    <input type="password" class="box"  name="password" required>
                    <!-- placeholder="Enter Password" -->
                    <label class="labels" for="password"><b>Password:</b></label>
                </div>
                <div class="remember-forgot">
                    <label class="labels"><input type="checkbox" class="terms-conditions-check" checked="unchecked" name="remember">I agree to the terms & conditions </label>
                </div>
                <div class="next">
                    <button type="submit" name= "submit" value="submit" class="btn" >Sign Up</button>
                </div>
                <div class="logreg-link">
                    <p>If you have an account already , <a href="login.php">Login</a></p>
                </div>
            </div>
</form>
</div>
</div>
</div>

<!-- <form action="account_validation.php" method='POST'>
        <p> if you want to survive </p>

        <label for="firstname"><b>First name:</b></label>
        <input type="text" class="box"placeholder="Enter First Name"name="firstname"required> <br>
        <br>
        <label for="lastname"><b>Surname:</b></label>
        <input type="text" class="box" placeholder="Enter last Name"name="lastname"required> <br>
        <br>
        <label for="username"><b>Username:</b></label>
        <input type="text" class="box" placeholder="Enter Username" name="username" required> <br>
        <br>
        <label for="email"><b>Email:</b></label>
        <input type="text" class="box" placeholder="Enter Email" name="email" required> <br><br>
        <label for="dob"><b>Date of birth:</b></label>
        <input type="date" class="box" id="birthdate"name="birthdate"> <br>
        <br> <label for="password"><b>Password:</b></label>
        <input type="password" class="box" placeholder="Enter Password" name="password" required>

        <label>
      <br> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <div class="next">
            <button type="submit" name= "submit" value="submit" class="signupbtn" >Submit</button>
        </div>
        <p> Already have an account? <a href="login.php"> Log in now</a></p>
    </form> -->
    <footer>
        <div class="f-container">
            <div class="footer-content">
                <h3>Contact Us</h3>
                <p>Email: citizensroadtosurvival@gmail.com</p>
            </div>
            <div class="footer-content">
                <h3> Quick links</h3>
                <ul class="f-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="social-icons">
                    <li><a href="https://x.com/Citizens_RoadTS"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/citizensroadtosurvival/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>This is a fictional student website.</p>
        </div>
    </footer>
</body>
</html>