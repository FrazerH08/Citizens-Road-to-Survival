<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="request_shelter_change.css">
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
$id = $_SESSION['user_id'];
$role=$_SESSION['role'];
$logged_in = $_SESSION['logged_in'];

if($logged_in == false) {
    header(header:"Location: login.php");
}

 $stmt = $conn->prepare("SELECT id, shelter_location, score FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row =$result->fetch_assoc();
        $shelterlocation = $row['shelter_location'];
        $score = $row['score'];
?> 
<form action="shelter_change_validation.php" method="POST" enctype="multipart/form-data">
    <?php
    echo "<h2> Your current shelter location is: <b> $shelterlocation </b> </h2>" ;
    echo "<p> If you are happy with your current location , return back to <a class='dashboard-link' href= dashboard.php > Dashboard </a> </p> ";
    ?>
    <h2> If you want to change your shelter location, select a new one from below: </h2>
<select name="shelter_location" required>
    <option value="" disabled selected>Select County</option>
    <option value="Bedfordshire">Bedfordshire</option>
    <option value="Berkshire">Berkshire</option>
    <option value="Bristol">Bristol</option>
    <option value="Buckinghamshire">Buckinghamshire</option>
    <option value="Cambridgeshire">Cambridgeshire</option>
    <option value="Cheshire">Cheshire</option>
    <option value="Cornwall">Cornwall</option>
    <option value="Cumbria">Cumbria</option>
    <option value="Derbyshire">Derbyshire</option>
    <option value="Devon">Devon</option>
    <option value="Dorset">Dorset</option>
    <option value="Durham">Durham</option>
    <option value="East Riding of Yorkshire">East Riding of Yorkshire</option>
    <option value="East Sussex">East Sussex</option>
    <option value="Essex">Essex</option>
    <option value="Gloucestershire">Gloucestershire</option>
    <option value="Greater London">Greater London</option>
    <option value="Greater Manchester">Greater Manchester</option>
    <option value="Hampshire">Hampshire</option>
    <option value="Herefordshire">Herefordshire</option>
    <option value="Hertfordshire">Hertfordshire</option>
    <option value="Isle of Wight">Isle of Wight</option>
    <option value="Kent">Kent</option>
    <option value="Lancashire">Lancashire</option>
    <option value="Leicestershire">Leicestershire</option>
    <option value="Lincolnshire">Lincolnshire</option>
    <option value="Merseyside">Merseyside</option>
    <option value="Middlesex">Middlesex</option>
    <option value="Norfolk">Norfolk</option>
    <option value="North Yorkshire">North Yorkshire</option>
    <option value="Northamptonshire">Northamptonshire</option>
    <option value="Northumberland">Northumberland</option>
    <option value="Nottinghamshire">Nottinghamshire</option>
    <option value="Oxfordshire">Oxfordshire</option>
    <option value="Rutland">Rutland</option>
    <option value="Shropshire">Shropshire</option>
    <option value="Somerset">Somerset</option>
    <option value="South Yorkshire">South Yorkshire</option>
    <option value="Staffordshire">Staffordshire</option>
    <option value="Suffolk">Suffolk</option>
    <option value="Surrey">Surrey</option>
    <option value="Tyne and Wear">Tyne and Wear</option>
    <option value="Warwickshire">Warwickshire</option>
    <option value="West Midlands">West Midlands</option>
    <option value="West Sussex">West Sussex</option>
    <option value="West Yorkshire">West Yorkshire</option>
    <option value="Wiltshire">Wiltshire</option>
    <option value="Worcestershire">Worcestershire</option>
</select>
<input type="submit" name="submit" class="btn" onclick="alert('Thanks for submitting!')">
</form>
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