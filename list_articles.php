<?php
session_start();
include 'connectdb.php';
$logged_in = $_SESSION['logged_in'] ?? false;
$role = $_SESSION['role'] ?? '';

// Search functionality
$news = [];
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    
    // Prepared statement for safer search
    $stmt = $conn->prepare("SELECT * FROM articles WHERE title LIKE ? ORDER BY time_created DESC");
    $searchTerm = "%$search%"; 
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}

// If no search performed, fetch all articles
if (empty($news)) {
    $stmt = $conn->prepare("SELECT * FROM articles ORDER BY time_created DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List News</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="listnews.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <script src="nav.js" defer></script>
    <style>
        i {
            margin-left: 5px;
        }
        .bx bx-search{
            padding: 20px;
        }
        .search-icon{
            padding: 20px;
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
<div style="margin-left: 10px;">
<h1 class="title"><u>All Articles</u></h1>
<br>
<p class="welcome-message"> This page contains Latest articles and updates to help your survival chances</p>
<?php
if($role === 'admin'){
    echo '<a href="article_upload.php" style="margin-bottom: 10px;" class="btn">Create Article</a>'; 
}
?>
<br>
    <div class="search-button">
        <form method='POST'>
            <input type="text" class="search-btn" placeholder=" Search for an article" name="search">
            <button class="src-button" name="submit">
            <span> Search</span>
            </button>
                <!-- <i class="bx bx-search" id="search-icon"></i>    -->
        </form>
    </div>

</div>

    <div class="posts-container">
        <?php
        // Display posts
        if (!empty($news)) {
            foreach ($news as $row) {
                echo '<section class="newsCard">';
                  if (!empty($row['picture'])) {
                    echo '<img src="' . htmlspecialchars($row['picture']) . '" alt="Article image" class="listnews-article-image">';
                }
                echo '<p><a class=article-title href="retrieve_articles.php?id=' . htmlspecialchars($row['id']) . '">' .  '<b>' . htmlspecialchars($row['title']) . '</b>' . '</a></p>';

                if($role === 'admin'){
                    echo '<p>
                        <a class=edit-btn href="edit_article.php?id=' . htmlspecialchars($row['id']) . '">Edit</a> |
                        <a class=delete-btn onclick="return confirm(\'Do You Really Want To Delete This?\')" href="delete_articles.php?id=' . htmlspecialchars($row['id']) . '">Delete</a>
                    </p>';
                }

                // echo '<p>Description: ' . htmlspecialchars($row['description']) . '</p>';
                if (htmlspecialchars($row['username']) == null) {
                    echo '<p>Created By: <a class="user-n-f"> 404: User Not Found</a></p>';
                } else {
                    echo '<p>Created By: ' . htmlspecialchars($row['username']) . '</p>';
                    }
                    echo "<p>". date("F j, Y, g:i a", strtotime($row['time_created'])) . "</p>";
                
                // echo '<p>Article written: ' . htmlspecialchars($row['time_created']) . '</p>';
                echo '</section>';
            }
        } else {
            echo "<p>No articles found.</p>";
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
