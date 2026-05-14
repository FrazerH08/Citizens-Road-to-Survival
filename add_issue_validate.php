<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Issue validate</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="edit_news.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'connectdb.php';
session_start();
$id = $_POST['id'];
$score = $_POST['score'];

$stmt = $conn->prepare("SELECT score, weekly_reported_issues FROM users WHERE id = ?");
$weekly_reported_issues = $stmt->fetch_assoc()['weekly_reported_issues'];

if ($weekly_reported_issues > 1) {
    $score = $score - 15;
    $weekly_reported_issues = $weekly_reported_issues + 1;
} else {
    $score = $score + 5;
    $weekly_reported_issues = $weekly_reported_issues + 1;
}

$sql ="UPDATE users SET score='$score', weekly_reported_issues='$weekly_reported_issues' WHERE id = $id";
if ($conn->query(query: $sql) === TRUE) {
    echo "<h1>Thanks for letting us know.</h1>";
    echo "<p>We will look into the issue as soon as possible. But if this issue is false or unneeded your score will be reduced.</p>";
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $sql ."<br>" . $conn->error;
}
?>
</body>
</html>
<?php

