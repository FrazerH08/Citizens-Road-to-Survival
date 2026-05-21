
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Score </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="edit_news.css">
    <link rel="stylesheet" href="feedback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="nav.js" defer></script>
    <style>
        .comment-container {
        display: grid;
        grid-template-areas: "thread_id user_id text time edit";
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        gap: 10px;
        background-color: #000E10;
        border: 1px solid #316E74;
        padding: 20px;
        margin-bottom: 20px;
        column-count: 5;
        column-gap: 10px;
        column-rule: 1px solid white;
        margin-top: 30px;
    }

    
    @media (max-width: 650px) {
        .comment-container {
            grid-template-areas: "thread_id"
                                 "user_id"
                                 "text"
                                 "time"
                                 "edit";
            grid-template-columns: auto;
            column-count: 1;
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
    <h1 class=>Review Comments</h1>
    <p>If any comments are found, they will be displayed below:</p>
    <p> Comments which you find need to be reported manage their score with the edit score button.</p>
    <?php
    session_start();

    include 'connectdb.php';

    $stmt = $conn->prepare("SELECT * FROM threads_replies ORDER BY date_created DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $logged_in = $_SESSION['logged_in'];
    $role = $_SESSION['role'];
    if( $logged_in == false || $role != 'admin') {
        header(header:"Location: login.php");
    }
        while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    if($result->num_rows == 0) {
        echo "No User Found!";
    }else{ 
        foreach($comments as $row) {
            $thread_id =  html_entity_decode($row['thread_id']);
            $user_id =  html_entity_decode($row['user_id']);
            $text =  html_entity_decode($row['text']);
            $time =  html_entity_decode($row['date_created']);

            echo "<div class='comment-container'>";
            echo "<p><strong>Thread ID:</strong> $thread_id</p>";
            echo "<p><strong>User ID:</strong> $user_id</p>";
            echo "<p><strong>Comment:</strong> $text</p>";
            echo "<p>". date("F j, Y, g:i a", strtotime($time)) . "</p>";
            echo '<a class="btn" onclick="return confirm(\'Do You Really Want To Edit This?\')" href="edit_score.php?id=' . htmlspecialchars($row['user_id']) . '">Edit Score</a>';
            echo "</div>";
        }
    }
    ?>
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
