<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
</head>
<body>
<h1 class="title">Access your account</h1>
<form class="login-form" action="login_validation.php" method='POST'>
        <br> <label class="labels" for="username"><b>Username:</b></label>
        <br><input type="text" class="box"placeholder="Enter Username" name="username" required> <br>
        <br> <br> <label class="labels" for="password"><b>Password:</b></label>
        <br><input type="password" class="box" placeholder="Enter Password" name="password" required>
        <label class="labels">
      <br> <input type="checkbox" class="remember-me" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
        <div class="next">
            <button type="submit" name= "submit" value="submit" class="signupbtn" >Login</button>
        </div>
    </form>

    <p>If you haven't already,<a href="signup.php"> Sign up </a></p>
    <?php
    if(isset($_POST['submit'])){
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password =mysqli_real_escape_string($conn,$_POST['password']);

        // Use Prepared Statements... e.g. $SQL = "insert your query" then use bind and then execute

        $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'") or die("Error");
        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)){
            $_SESSION['valid'] = $row['username'];
            $_SESSION['valid'] = $row['password'];
        }else{
            echo "<h1>username or password is incorrect  please go back</h1><br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        }
        if(isset($_SESSION['valid'])){
            echo "You are logged in! Welcome back {$username}";
            header("Location: welcome.php");
        }
    }else{
    }
    ?>
</body>
</html>
