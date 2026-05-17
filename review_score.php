<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review score </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.css">
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
include 'connectdb.php';
session_start();
$user_id = $_SESSION['user_id'];
$role=$_SESSION['role'];
$logged_in = $_SESSION['logged_in'];

if($role!='admin' || $logged_in == false) {
    header(header:"Location: dashboard.php");
}

    $stmt= $conn->prepare ("SELECT * FROM users WHERE role!='admin';");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
        $scores[]=$row;
    }
'<div class=test-container>';
    // Display scores
    if (!empty($scores)) {
        foreach ($scores as $row) {
            echo '<section class="newsCard">';
            echo '<h2> id: '  . htmlspecialchars($row['id']).'</h2>';
            echo '<h2> Username: '  . htmlspecialchars($row['username']).'</h2>';
            echo '<h2>Score: ' . htmlspecialchars($row['score']) . '</h2>';
            echo '<p>
                    <a class=btn onclick="return confirm(\'Do You Really Want To Edit This?\')"href="edit_score.php?id=' . htmlspecialchars($row['id']) . '">Edit</a>
            </p>';
            echo '<br>' .'<br>';
            echo '</section>';
        }
    } else {
        echo "<p>No users found.</p>";
    }
'</div>';
    // echo '<h2> id: '  . htmlspecialchars($row['id']).'</h2>';
    // echo '<h2> Username: '  . htmlspecialchars($row['username']).'</h2>';
    // echo '<h2>Score: ' . htmlspecialchars($row['score']) . '</h2>';
    // echo '<br>' .'<br>';
    // echo '<h2><a href="request_supplies.php" >Request More </a></h2>';
    // echo '<h2><a href="review_comments.php" >Review comments  </a></h2>';
    // echo '<h2><a href="review_score.php" >Review score  </a></h2>';
    // echo '<h2><a href="article_upload.php" >Create article  </a></h2>';
    // echo '<br>' .'<br>' .'<br>';
    // echo '<h2><a href="update_shelter_status.php" >Update shelter status </a></h2>';
    // echo '<h2><a href="threads.php" >Threads </a></h2>';
    // echo '<h2><a href="thread_upload.php" >Create Thread </a></h2>';


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
            <p>&copy; 2026 Citizens' Road to Survival. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>