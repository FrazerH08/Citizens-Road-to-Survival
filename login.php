<?php
session_start();
include 'connectdb.php';
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
<section class="section">
    <div class="wrapper">
        <div class="logreg-box">
            <div class="form-box login">
                <div class="logreg-title">
                    <h2 class="title">Access your account</h2>
                    <p> Your Road to <b>Survival</b> <br> starts here. </p>
                </div>
        <form class="login-form" action="login_validation.php" method='POST'>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-user"></i></span>
                    <input type="text" class="box" name="username" required>
                    <!-- placeholder="Enter Username" -->
                    <label class="labels" for="username"><b>Username:</b></label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bx bx-lock"></i></span>
                    <input type="password" class="box"  name="password" required>
                    <!-- placeholder="Enter Password" -->
                    <label class="labels" for="password"><b>Password:</b></label>
                </div>
                <div class="remember-forgot">
                    <label class="labels"><input type="checkbox" class="remember-me" checked="checked" name="remember"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="next">
                    <button type="submit" name= "submit" value="submit" class="btn" >Login</button>
                </div>
                <div class="logreg-link">
                    <p>If you haven't already, <br> <a href="signup.php">Sign up</a></p>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
<?php
    if(isset($_POST['submit'])){
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password =mysqli_real_escape_string($conn,$_POST['password']);

        // Use Prepared Statements... e.g. $SQL = "insert your query" then use bind and then execute

        $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'") or die("Error");
        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)){
            $_SESSION['valid'] = $row['username'];
            $_SESSION['valid'] = $row['password'];
        }else{
            echo "<h1>username or password is incorrect  please go back</h1><br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        }
        if(isset($_SESSION['valid'])){
            echo "You are logged in! Welcome back {$username}";
            header("Location: dashboard.php");
        }
    }else{
    }
    ?>
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
