<?php
include 'connectdb.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Validation</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
// if form isn't submitted
if(!isset($_POST['submit'])){
    header("Location: test.php");
    exit();
}

$id = $_SESSION['user_id'];
$shelter_location = $_POST['shelter_location'];
$score = $_SESSION['score'] -5;

            // shelter change validation
            $insert_stmt = $conn->prepare("UPDATE users SET shelter_location = '$shelter_location', score = '$score' WHERE id = ?");
            $insert_stmt->bind_param("i", $id);

            if($insert_stmt->execute()){
                echo "<h2 class='title'> Your new shelter location is: <b> $shelter_location </b> </h2><br>";
                echo "<div class='accvalid'><a href='dashboard.php' class='btn'>Back to Dashboard</a></div>";
            } else {
                echo "<h1 class='title'>Error: Shelter change failed</h1><br>";
                echo "Error: " . $insert_stmt->error;
            }
        ?>

</body>
</html>
