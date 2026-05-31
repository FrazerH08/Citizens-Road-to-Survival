<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
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
include 'connectdb.php';
session_start();
$user_id = $_SESSION['user_id'];
$role=$_SESSION['role'];
$logged_in = $_SESSION['logged_in'];

if($logged_in == false) {
    header("Location: login.php");
}
echo '<div class="logout-btn">';
echo '<a href="logout.php" class="btn">Logout</a>';
echo '</div>';
if($role !='admin' ){
    echo '<section class="dashboard">';
    $stmt= $conn->prepare ("SELECT * FROM users WHERE id= ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $status = $row['supplies_status'];
    echo '<div class="header" style="z-index: 0; position: relative;">';
        echo '<h2>' . htmlspecialchars($row['username']).'</h2>';
    echo '</div>';
    echo '<div class="menu">';
    switch ($status) {
case "Very High":
    echo "<div class='status-box' style='background-color: #088429; color: white;'>Supplies Status: Very High</div>";
    break;
case "High":
    echo "<div class='status-box' style='background-color: #2BE25C; color: black;'>Supplies Status: High</div>";
    break;
case "Medium":
    echo "<div class='status-box' style='background-color: #E2952B; color: white'>Supplies Status: Medium</div>";
    break;
case "Low":
echo "<div class='status-box' style='background-color: #FF5e5e; color: white;'>Supplies Status: Low</div>";
    break;
case "Very Low":
echo "<div class='status-box' style='background-color: #E42A2A; color: white;'>Supplies Status: Very Low</div>";
    break;
default:
    echo "<div class='status-box' style='background-color: #e2952b; color:white;'> Supplies Status: Not set</div>";
    break;
    }
    // echo '<h2>Supplies Status: ' . htmlspecialchars($row['supplies_status']) . '</h2>';
    echo '<h2 ><a class="dash-btn" href="request_supplies.php" >Request More </a></h2>';
    echo '</div>';
    echo '<div class="content">';
    if ($row['shelter_location'] == NULL){
     echo '<h2> Shelter Location: <a class="user-n-f"> 404: Location Not found'. '</h2>';
    } else{
        echo '<h2>Shelter Location: ' . htmlspecialchars($row['shelter_location']) . '</h2>';
    }
    echo '<h2><a class="dash-btn" href="request_shelter_change.php" >Request shelter change </a></h2>';
    echo '<h2><a class="dash-btn" href="local_forums.php" >View local forums</a></h2>';
    echo '<h2><a class="dash-btn" href="threads.php" >View National Threads</a></h2>';
    // echo '<br>' .'<br>' .'<br>';
    echo '</div>';
    echo '<div class="footer">';
    echo '<h2><a class="dash-btn" href="report_an_issue.php" >Report an issue</a></h2>';
    echo '<h2><a class="dash-btn" href="start_quiz.php" >Start Quiz</a></h2>';
    echo '<h2><a class="dash-btn" href="thread_upload.php" >Create Thread </a></h2>';
    echo '</div>';
    echo '</section>';

} else{
    echo '<section class="dashboard">';
    $stmt= $conn->prepare ("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $status = $row['supplies_status'];
    echo '<div class="header" style="z-index: 0; position: relative;">';
        echo '<h2>' . htmlspecialchars($row['username']).'</h2>';
    echo '</div>';
echo '<div class="menu">';
    switch ($status) {
case "Very High":
    echo "<div class='status-box' style='background-color: #088429; color: white;'>Supplies Status: Very High</div>";
    break;
case "High":
    echo "<div class='status-box' style='background-color: #2BE25C; color: black;'>Supplies Status: High</div>";
    break;
case "Medium":
    echo "<div class='status-box' style='background-color: #E2952B; color: white'>Supplies Status: Medium</div>";
    break;
case "Low":
echo "<div class='status-box' style='background-color: #FF5e5e; color: white;'>Supplies Status: Low</div>";
    break;
case "Very Low":
echo "<div class='status-box' style='background-color: #E42A2A; color: white;'>Supplies Status: Very Low</div>";
    break;
default:
     echo "<div class='status-box' style='background-color: #e2952b; color:white;'> Supplies Status: Not set</div>";
    }
    // echo '<h2>Supplies Status: ' . htmlspecialchars($row['supplies_status']) . '</h2>';
    echo '<h2 ><a class="dash-btn" href="request_supplies.php" >Request More </a></h2>';
    echo '</div>';
    echo '<div class="content">';
    echo '<h2><a class="dash-btn" href="review_comments.php" >Review comments  </a></h2>';
    echo '<h2><a class="dash-btn" href="review_score.php" >Review score  </a></h2>';
    echo '<h2><a class="dash-btn" href="article_upload.php" >Create article  </a></h2>';
    echo '<br>' .'<br>' .'<br>';
    echo '</div>';
    echo '<div class="footer">';
       if ($row['shelter_location'] == NULL){
     echo '<h2> Shelter Location: <a class="user-n-f"> 404: Location Not found'. '</h2>';
    } else{
        echo '<h2>Shelter Location: ' . htmlspecialchars($row['shelter_location']) . '</h2>';
    }
    echo '<h2><a class="dash-btn" href="request_shelter_change.php" >Change shelter location </a></h2>';
    echo '<h2><a class="dash-btn" href="update_shelter_status.php" >Update shelter status </a></h2>';
    echo '<h2><a class="dash-btn" href="threads.php" >Threads </a></h2>';
    echo '<h2><a class="dash-btn" href="thread_upload.php" >Create Thread </a></h2>';
    echo '</div>';
    echo '</section>';
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