<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Validate</title>
    <link rel="stylesheet" href="list_news.css">
    <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="nav.js" defer></script>
    <style>
        .login-validation {
            display: flex;
            padding: 20px;
            background-color: #000E10;
            border: 1px solid #b2b2b2;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-height:30% ;
            max-width: 50%;
            margin: 50px auto;
            margin-bottom: 100px;
        }
        .login-validation .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        @media (max-width: 650px) {
            .login-validation {
                max-width: 90%;
            }
            .login-validation .title {
                font-size: 18px;
            }
            .login-validation a.btn {
                max-width: 100%;
            }
        }
    </style>
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
    include 'connectdb.php';
    session_start();
    if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Use prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    echo '<div class="login-validation">';
    // Add debugging
    // echo "Debug - User found: ";
    // var_dump($user);
    // echo "<br>";

    // Check password using existing method from signup (hashed password)
    if($user && password_verify($password, $user['password'])){
        // Regenerate session ID for security
        session_regenerate_id(true);

        // Store username , id and role, score , shelter location in session
        $_SESSION['user_id'] =$user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in']= true;
        $_SESSION['score'] =$user['score'];
        $_SESSION['shelter_location'] =$user['shelter_location'];

        // Add debugging
        // echo "Debug - Session username set: " . $_SESSION['username'];
        echo "<h1 class='title'>Login successful! Welcome, " . htmlspecialchars($_SESSION['username']) . ".</h1>";
        echo "<p style='text-align: center; color: #7A7A7A; font-size:20px;' >  Your experience is being <b>monitored</b>. </p> ";
        echo "<p style='text-align: center; font-size:20px;' >Your choices will impact your score , so <b>comply</b> to our rules .</p>";
        echo "<a class='btn' text-align:center href='dashboard.php'> Go to Dashboard</a>";
        header("refresh:7;url=dashboard.php");
        // exit();
    } else {
        echo "<h1 class='title'>Invalid username or password</h1>";
        echo "<a class='btn' text-align:center href='javascript:self.history.back()'> Go Back</a>";
    }
}
echo '</div>';
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
<script>
    console.log("Validation script has ran")

</script>