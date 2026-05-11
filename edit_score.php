<?php
    session_start();

    include 'connectdb.php';
    $id = $_GET['id'];

    $SQL = "SELECT * FROM users WHERE id = $id";

    $result= $conn->query($SQL);
    $logged_in = $_SESSION['logged_in'];
    $role = $_SESSION['role'];
    if( $logged_in == false || $role != 'admin') {
        header(header:"Location: login.php");
    }
    $row = $result->fetch_assoc();

    if($result->num_rows == 0) {
        echo "No User Found!";
    }else{
        $score =  html_entity_decode($row['title']);
        $name =  html_entity_decode($row['firstname', 'surname']);
    }

?>
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
</head>
<body>
<h1><u>Edit Score </u></h1>
<form action="edit_score_validate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label for="title">Name: <?php echo $name ?> </label><br>
        <label for="score"> Score: <?php echo $score ?></label>
        <input type="number" id="score" name="score" min="1" max="100" required><br>
        <br>
        <button type="submit" class="btn" onclick="alert('Thanks for submitting and making this civilians score fair!')">Submit</button>
    </form>
</body>
</html>
