<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
     <h2 class="title"><u>Create Your account</u></h2>
<form action="account_validation.php" method='POST'>
        <p> if you want to survive </p>

        <label for="firstname"><b>First name:</b></label>
        <input type="text" class="box"placeholder="Enter First Name"name="firstname"required> <br>
        <br>
        <label for="lastname"><b>Surname:</b></label>
        <input type="text" class="box" placeholder="Enter last Name"name="lastname"required> <br>
        <br>
        <label for="username"><b>Username:</b></label>
        <input type="text" class="box" placeholder="Enter Username" name="username" required> <br>
        <br>
        <label for="email"><b>Email:</b></label>
        <input type="text" class="box" placeholder="Enter Email" name="email" required> <br><br>
        <label for="dob"><b>Date of birth:</b></label>
        <input type="date" class="box" id="birthdate"name="birthdate"> <br>
        <br> <label for="password"><b>Password:</b></label>
        <input type="password" class="box" placeholder="Enter Password" name="password" required>

        <label>
      <br> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <div class="next">
            <button type="submit" name= "submit" value="submit" class="signupbtn" >Submit</button>
        </div>
        <p> Already have an account? <a href="login.php"> Log in now</a></p>
    </form>
</body>
</html>