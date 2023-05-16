<?php
        // Start the session
        session_start(); 
        if(isset($_SESSION['username'])){
          header("Location: profilePage.php");
         }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Login Form</title>
</head>

<body>

    <div class="container">
        <div class="title">Login</div>
        <div class="content">

            <form action="./Handler/loginHander.php" method="post">

                <div class="user-details">

                    <div class="input-box">
                        <label>Username / Email</label>
                        <input name="usernameORemail" type="text" placeholder="Enter your username or email" required>
                    </div>

                    <div class="input-box">
                        <label>Password</label>
                        <input onkeyup="validatePassword()" id="password" name="password" type="password"
                            placeholder="Enter your password" required>
                        <span id="password-error" style="display:none; color:red;"></span>
                    </div>

                </div>

                <?php
if(isset($_SESSION["login-error-msg"]))
echo "<span style='color:red;'>" . $_SESSION["login-error-msg"] . "</span>";
        ?>

                <div class="button">
                    <input id="submitBtn" type="submit" name="loginSubmit" value="Login Now">
                </div>

                <div class="have-Account">Don't have any account? <a href="registrationPage.php" id="login">Signup
                        Now</a></div>

            </form>


        </div>
    </div>

    <script src="./js/validation.js"></script>
</body>

</html>