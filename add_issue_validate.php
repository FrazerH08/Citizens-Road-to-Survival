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
$id = $_SESSION['user_id'];
$score = $_SESSION['score'];
$title = $_POST['title'];
$content = $_POST['content'];
$username = $_SESSION['username'];
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header(header:"Location: login.php");
}

if (empty($_POST['title']) || empty($_POST['content'])) {
    echo "<h1>Title and content cannot be empty.</h1>";
    echo "<a class=btn href='report_issue.php'>Back to report issue</a>";
    exit();
}



$stmt = $conn->prepare("SELECT score, weekly_reported_issues FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$weekly_reported_issues = $user['weekly_reported_issues'];
$score = $user['score'];

$stmt2 = $conn->prepare("INSERT INTO issues ( title, content, username ) VALUES ( ?, ?, ? )");
$stmt2->bind_param("sss", $title, $content, $username);
$stmt2->execute();
if ($weekly_reported_issues > 1) {
    $score = $score - 15;
    $weekly_reported_issues = $weekly_reported_issues + 1;
} else {
    $score = $score + 5;
    $weekly_reported_issues = $weekly_reported_issues + 1;
}
$stmt3 = $conn->prepare("UPDATE users SET score= ?, weekly_reported_issues= ? WHERE id=?");
$stmt3->bind_param("iii", $score, $weekly_reported_issues, $id);
$stmt3->execute();

if ($stmt3->execute() === TRUE) {
    echo "<h1>Thanks for letting us know.</h1>";
    echo "<p>We will look into the issue as soon as possible. But if this issue is false or unneeded your score will be reduced.</p>";
    echo "<a class=btn href='dashboard.php'>Back to dashboard</a>";
} else{
    echo "Error: " . $stmt3->error ."<br>" . $conn->error;
}   
?>
</body>
</html>
<?php

