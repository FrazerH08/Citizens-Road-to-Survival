<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article Validate</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="nav.js" defer></script>
    <style>
        .add-article-validation {
            display: flex;
            padding: 20px;
            background-color: #000E10;
            border: 1px solid #b2b2b2;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-height:30% ;
            max-width: 50%;
            margin: 50px auto;
        }
        .add-article-validation .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        @media (max-width: 650px) {
            .add-article-validation {
                max-width: 90%;
            }
            .add-article-validation .title {
                font-size: 18px;
            }
            .add-article-validation a.btn {
                max-width: 100%;
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
<?php
include 'connectdb.php';
session_start();
//put a foreach loop to find out the keys in $_POST / $_FILES
// foreach ($_FILES as $key => $value){
//     echo($key . ' this is adams debug test');
//   }
$target_dir = "uploads/";
$target_file = $target_dir . basename ($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType =strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Below Checks if an  image file is a actual image or fake image.
echo '<div class="add-article-validation">';
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"]. ".";
        $uploadOk = 1;
    } else{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// check if file already exists
if (file_exists($target_file)){
    echo "Sorry this file already exists.";
    $uploadOk = 0;
}

// file size check
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo " Sorry this file is too large";
    $uploadOk = 0;
}
// file type check
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif"){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
}

// upload ok check
if ($uploadOk == 0 ){
    echo "Sorry your file was not uploaded.";
} else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "The file". htmlspecialchars ( basename($_FILES["fileToUpload"]["name"])). "has been updated.";
    } else{
        echo "Sorry they was an error uploading your file.";
    }
}
$title = $_POST['title'];
$description =$_POST['description'];
$content = $_POST['content'];
$picture = basename($_FILES['fileToUpload']['name']);
$username = $_SESSION['username'];


$sanitisedTitle = htmlentities(string: $title);
$sanitisedDescription = htmlentities(string: $description);
$sanitisedPost = htmlentities(string: $content);

$sql ="INSERT INTO articles (title, description, content , picture , username) VALUES ('$sanitisedTitle', '$sanitisedDescription', '$sanitisedPost', '$target_file', '$username')";
?>

    <?php
    if ($conn->query(query: $sql) === TRUE) {
        echo "<h1 class='title' >New record created successfully</h1>";
        echo "<a class=btn href='list_articles.php' text-align:center '>Back to news</a>";
    } else{
        echo "Error: " . $sql ."<br>" . $conn->error;
    }
    echo '</div>';
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
