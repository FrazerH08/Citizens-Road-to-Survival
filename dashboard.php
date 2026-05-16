<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="nav.js" defer></script>
</head>
<body>
    
    <header class="header">
        <div class="header_content">
            <a href="index.html" class="logo">Citizens' Road to&nbsp;<b>Survival</b></a>
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
    header(header:"Location: login.php");
}

if($role !='admin' ){
    $stmt= $conn->prepare ("SELECT * FROM users WHERE id= ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
    echo '<h2>' . htmlspecialchars($row['username']).'</h2>';
    echo '<h2>Supplies Status: ' . htmlspecialchars($row['supplies_status']) . '</h2>';
    echo '<h2><a href="request_supplies.php" >Request More </a></h2>';
    echo '<h2>Shelter Location: ' . htmlspecialchars($row['shelter_location']) . '</h2>';
    echo '<h2><a href="local_forums.php" >View local forums</a></h2>';
    echo '<h2><a href="threads.php" >View National Threads</a></h2>';
    echo '<h2><a href="report_an_issue.php" >Report an issue</a></h2>';
    echo '<br>' .'<br>' .'<br>';
    echo '<h2><a href="request_shelter_change.php" >Request shelter change </a></h2>';
    echo '<h2><a href="start_quiz.php" >Start Quiz</a></h2>';
    echo '<h2><a href="thread_upload.php" >Create Thread </a></h2>';
    }
} else{
    $stmt= $conn->prepare ("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
    echo '<h2>' . htmlspecialchars($row['username']).'</h2>';
    echo '<h2>Supplies Status: ' . htmlspecialchars($row['supplies_status']) . '</h2>';
    echo '<h2><a href="request_supplies.php" >Request More </a></h2>';
    echo '<h2><a href="review_comments.php" >Review comments  </a></h2>';
    echo '<h2><a href="review_score.php" >Review score  </a></h2>';
    echo '<h2><a href="article_upload.php" >Create article  </a></h2>';
    echo '<br>' .'<br>' .'<br>';
    echo '<h2><a href="request_shelter_change.php" >Change shelter location </a></h2>';
    //echo '<h2><a href="update_shelter_status.php" >Update shelter status </a></h2>';
    echo '<h2><a href="threads.php" >Threads </a></h2>';
    echo '<h2><a href="thread_upload.php" >Create Thread </a></h2>';
    
    }

}



    ?>
</body>
</html>