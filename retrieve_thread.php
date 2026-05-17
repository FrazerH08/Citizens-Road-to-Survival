<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thread </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="retrieve_news.css">
    <link rel="stylesheet" href="feedback.css">
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
$thread_id = $_GET['id'];
$score= $_SESSION['score'];

if($score < 20){
    header(header:"Location: index.php");
}
    
$sql = "SELECT title, description, content, username FROM threads WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $thread_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        echo "<h1>" . html_entity_decode($row['title']) . "</h1>";
        echo '<h2> Created By: ' . html_entity_decode($row['username']) . "</h2>";
        echo '<section class="postCard2">';
        echo "<h3>" . html_entity_decode($row['description']) . "</h3>";
        echo "<p>" . html_entity_decode($row['content']) . "</p>";
        // Check if picture exists and is not null
        echo '</section>';
    }
} else {
    echo "Sorry, 0 Results Returned";
}


?>

<?php
if (isset($_SESSION['user_id'])){
    echo '
    <section class="comment-form">
        <form method="POST" action="post_thread_replies.php">
            <textarea name="text" placeholder="What would you like to comment..." required></textarea><br>
            <input type="hidden" name="thread_id" value="'. htmlspecialchars($thread_id) . '">
            <button class=btn type="submit">Post Comment</button>
        </form>
    </section>';
} else{
    echo '<p>Please <a href="login.php" class="btn">Log In</a> to comment </p>';
}

$commentQuery = "SELECT t.text, t.date_created, u.username
                 FROM threads_replies t
                 JOIN users u ON t.user_id = u.id
                 WHERE t.thread_id = ?
                 ORDER BY t.date_created ASC";
$commentStmt = $conn->prepare($commentQuery);
$commentStmt->bind_param("i", $thread_id);
$commentStmt->execute();
$commentResult = $commentStmt->get_result();

echo '<section class="comments">';
echo '<h3>Comments:</h3>';
while ($comment = $commentResult->fetch_assoc()) {
    echo "<div class='comment-box'>";
    echo "<strong>" . htmlspecialchars($comment['username']) . "</strong><br>";
    echo "<p>" . nl2br(htmlspecialchars($comment['text'])) . "</p>";
    echo "<small>" . $comment['date_created'] . "</small>";
    echo "</div><hr>";
}
echo '</section>';
$stmt->close();
$conn->close();
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
<?php
