<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="feedback.css">
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
<h1 class="title"><u>Feedback Form</u></h1>
<div class="container">
  <form action="feedback_validate.php" method="post">
    <label class="labels" for="fname">First Name:</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label class="labels" for="lname">Last Name:</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label class="labels" for="username">Username:</label>
    <input type="text" id="usrname" name="username" placeholder="Your username..">

    <label class="labels" for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Your email..">

    <label class="labels" for="subject">Subject:</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
  
</body>
</html>