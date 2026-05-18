<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Supplies</title>
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
    $id=$_SESSION['user_id']; 
    //echo $id;

    $stmt = $conn->prepare("SELECT id,supplies_status , score, last_supply_request FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row =$result->fetch_assoc();
        $status = $row['supplies_status'];
        $score = $row['score'];
        $latestrequest = $row['last_supply_request'];

        if ($latestrequest != NULL){
            $lasttime = strtotime($latestrequest);
            $weekago = strtotime('-7 days ');
            if ($lasttime >$weekago){
                echo "<h1> You have already requested supplies this week";
                echo "<a class='btn' href='dashboard.php'>Back to dashboard</a>";
                $score = $score -10;
                exit();
             }
        }
    switch ($status) {
case "Very High":
    echo "Very High , so no need to increase supplies";
    $score =$score -10;
$sql ="UPDATE users SET score='$score'  WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}
    break;
case "High":
    echo "High, so no need to increase supplies";
 $score =$score -5;
$sql ="UPDATE users SET score='$score'  WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}
    break;
case "Medium":
    echo "Medium , supplies will increase";
    $sql ="UPDATE users SET supplies_status='High' , last_supply_request=NOW()  WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<h1>Changes have been made successfully</h1>";
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}

    break;
case "Low":
echo "Low , supplies will increase";
    $sql ="UPDATE users SET supplies_status='Medium' , last_supply_request=NOW()  WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<h1>Changes have been made successfully</h1>";
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}

    break;
case "Very Low":
echo "very low , supplies will increase";
    $sql ="UPDATE users SET supplies_status='Low' , last_supply_request=NOW()  WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<h1>Changes have been made successfully</h1>";
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}

    break;
default:
    echo "Your favorite color is neither red, blue, nor green!";
    //echo $result;
}
    // if ($stmt== 'medium'){
    //     echo 'medium';
    // }if ($stmt== 'Low'){
    //     echo ' low';
    // }else{
    //     echo 'etf';
    // }
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