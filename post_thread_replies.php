<?php
include 'connectdb.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting Reply</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="retrieve_news.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    $user_id = $_SESSION['user_id'];
    $thread_id = $_POST['thread_id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO threads_replies (user_id, thread_id , text) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id , $thread_id, $text);
     if ($stmt->execute()) {
        header("Location: retrieve_thread.php?id=" . $thread_id); // redirect back to the thread
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    ?>
</body>
</html>