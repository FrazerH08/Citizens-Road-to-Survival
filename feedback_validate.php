<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Validate</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="feedback.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'connectdb.php';
$firstname = $_POST['firstname'];
$lastname =$_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$sanitisedfirstname =htmlentities(string: $firstname);
$sanitisedlastname = htmlentities(string: $lastname);
$sanitisedusername = htmlentities(string: $username);
$sanitisedemail =    htmlentities(string: $email);
$sanitisedsubject = htmlentities(string: $subject);

$sql ="INSERT INTO feedback (firstname, lastname, username, email, subject) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if($stmt){
    $stmt->bind_param("sssss", $sanitisedfirstname, $sanitisedlastname, $sanitisedusername, $sanitisedemail, $sanitisedsubject);
}
if($stmt->execute()) {
    echo "<h2 style='text-align:center'> Feedback Submitted! We will email you with the email you provided if we have any updates! </h2>";
    echo "<a text-align:center href='index.html' class='btn'>  Back to Home</a>";
} else{
    echo  "Error: " . $sql ."<br>" . $conn->error;
}
?>
</body>
</html>


