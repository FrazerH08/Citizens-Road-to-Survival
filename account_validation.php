<?php
include 'connectdb.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Validation</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
    <?php
// if form isn't submitted
if(!isset($_POST['submit'])){
    header("Location: signup.php");
    exit();
}

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$score = 50;

// email check
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<h1 class='title'>Invalid email format</h1>");
}

// Validate username
if (strlen($username) < 3 || strlen($username) > 20) {
    die("<h1 class='title'>Username must be between 3 and 20 characters</h1>");
}

// Additional username validation (only alphanumeric)
if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
    die(" <h1 class='title'>Username can only contain letters, numbers, and underscores</h1>");
}

// Password check 
if (strlen($password) < 8) {
    die(" <h1 class='title'> Password must be at least 8 characters long</h1>");
}

        // Check if email already exists
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            echo "<h1 class='title'>Email is already taken,change email, stop making this confusing we are trying our best to keep you safe and you cant even get your email correct!</h1><br>";
            echo "<div class='accvalid'><a href='javascript:self.history.back()' class='btn'> Go Back</a></div>";
        } else {
            // Hash the password , incase it gets hacked, based on testscript file
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into db
            $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password, firstname, lastname, birthdate, score ) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert_stmt->bind_param("sssssss", $username, $email, $hashed_password, $firstname, $lastname, $birthdate , $score );

            if($insert_stmt->execute()){
                echo "<h2 class='title'> Personal details matched with our records, Registration was successful</h2><br>";
                echo "<div class='accvalid'><a href='login.php' class='btn'>Login</a></div>";
            } else {
                echo "<h1 class='title'>Error: Registration failed</h1><br>";
                echo "Error: " . $insert_stmt->error;
            }
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
