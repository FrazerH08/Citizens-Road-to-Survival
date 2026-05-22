<?php
include 'connectdb.php';
// $logged_in = $_SESSION['logged_in'];
session_start();  

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Forums</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="nav.js" defer></script>
    <style>
        .local-forum-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #000E10;
            border: 1px solid #b2b2b2;
            border-radius: 8px;
            text-align: center;
        }

        .forum-title {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .forum-description {
            font-size: 18px;
            margin-bottom: 20px;
        }

        @media (max-width: 650px) {
            .local-forum-container {
                max-width: 90%;
                padding: 15px;
            }
            .forum-title {
                font-size: 24px;
            }
            .forum-description {
                font-size: 16px;
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
                    <li class="nav_item" id="login"> <a href="login.php" class="nav_link">Login</a></li>
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

    <div class="local-forum-container">
        <h1 class="forum-title">Start Quiz</h1>
        <p class="forum-description">Test your knowledge and skills in various survival scenarios. Do this quiz to assess your preparedness and build your score.</p>
        <p class="forum-description">Unfortunately the quiz is unavailable at the moment.</p>
        <a href="dashboard.php" class="btn"> Return to dashboard </a>
    </div>
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