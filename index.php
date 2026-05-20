<?php
include 'connectdb.php';
// $logged_in = $_SESSION['logged_in'];
session_start();
$stmt = $conn->prepare("SELECT * FROM articles ORDER BY time_created DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizens' Road to Survival</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="home.css">
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
<div class="opening-message">
    <p class="welcomep">
        This website is an fictional scenario, set in 2067 after an environmental collapse after a lack of global care and a totalitarian government. Your aim is to survive and eventually gain enough score for safety and be a part of a government with a lot of control. 
       <br> Good luck, citizen. 
    </p>
</div>
    <div class="container">

    
        <?php
    
    // Limit to first 2 articles in the db , the for loop starts at the first article with the index being at 0 the loop stops after getting 3 articles
    for ($i = 0; $i < min(2, count($news)); $i++) {
        $article = $news[$i];
        $title = htmlspecialchars($article['title']);
        $image = !empty($article['picture']) ? htmlspecialchars($article['picture']) : 'uploads/default.png'; // if its not empty it will display the picture from the database but if it is it will just use the default one
        $link = 'retrieve_articles.php?id=' . htmlspecialchars($article['id']); // so users can click on the image and go to the article from there

        if ($i === 0) {
            // Latest article as the index is 0 
            echo '<div> <a href="' . $link . '"><img class="article-image" src="' . $image . '" alt=""></a> <h1 class="big-article-title"><a href="' . $link . '">' . $title . '</a></h1>';'';
            echo '</div>';
        } else {
            // Smaller articles
            echo '<div> <a href="' . $link . '"><img class="article-image" src="' . $image . '" alt=""></a> <h1 class="big-article-title"><a href="' . $link . '">' . $title . '</a></h1>';'';
            echo '</div>';
            // echo '<a href="' . $link . '"><img class="smaller-article-image" src="' . $image . '" alt=""></a>';
            // echo '<h2 class="big-article-title"><a href="' . $link . '">' . $title . '</a></h2>';
            // echo '</div>';
        }
    }
    ?>
    </div>
    <!-- <div class="container">
        <div><img src="picture-placeholder.svg"></div>
        <div><img src="picture-placeholder.svg"></div>
        <div> <a class="btn" href="listnews.php"> News</a></div>
        <div> <a class="btn" href="listguides.php">Guides</a></div>
    </div> -->
    <div class="read-more-btn-container">
        <a class="read-more-btn" style="text-align: center;" href="list_articles.php">Read More</a>
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