<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Validate</title>
    <link rel="stylesheet" href="list_news.css">
    <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include 'connectdb.php';
    session_start();
    if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Use prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Add debugging
    // echo "Debug - User found: ";
    // var_dump($user);
    // echo "<br>";

    // Check password using existing method from signup (hashed password)
    if($user && password_verify($password, $user['password'])){
        // Regenerate session ID for security
        session_regenerate_id(true);

        // Store username , id and role, score in session
        $_SESSION['user_id'] =$user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in']= true;
        $_SESSION['score'] =$user['score'];

        // Add debugging
        // echo "Debug - Session username set: " . $_SESSION['username'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<h1 class='title'>Invalid username or password</h1>";
        echo "<a class='btn' text-align:center href='javascript:self.history.back()'> Go Back</a>";
    }
}
        ?>
</body>
</html>
<script>
    console.log("Validation script has ran")

</script>