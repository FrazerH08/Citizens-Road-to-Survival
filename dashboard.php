<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php
include 'connectdb.php';
session_start();
$user_id = $_SESSION['user_id'];
$role=$_SESSION['role'];

if($role !='admin' ){
    $stmt= $conn->prepare ("SELECT * FROM users WHERE id= ?");
    //$stmt = $conn->prepare("SELECT * FROM articles WHERE title LIKE ? ORDER BY time_created DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
     echo $row['supplies_status'];
    }
} else{

}



    ?>
</body>
</html>