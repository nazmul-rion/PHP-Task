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
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

    <div class="container">
        <div class="title">Registration</div>
        <div class="content">

            <form action="./Handler/registrationHander.php" method="post">

                <div class="user-details">

                    <div class="input-box">
                        <label>Username</label>
                        <input onkeyup="validateUsername()" id="username" name="username" type="text"
                            placeholder="Enter your username" required>
                        <span id="username-error" style="display:none; color:red;"></span>
                    </div>

                    <div class="input-box">
                        <label>Email</label>
                        <input name="email" type="email" placeholder="Enter your email" required>
                    </div>

                    <div class="input-box">
                        <label>Password</label>
                        <input onkeyup="validatePassword()" id="password" name="password" type="password"
                            placeholder="Enter your password" required>
                        <span id="password-error" style="display:none; color:red;"></span>
                    </div>

                    <div class="input-box">
                        <label>Confirm Password</label>
                        <input onkeyup="validateRpassword()" id="rPassword" name="rPassword" type="password"
                            placeholder="Confirm your password" required>
                        <span id="rPassword-error" style="display:none; color:red;"></span>
                    </div>
                </div>

                <?php
if(isset($_SESSION["reg-error-msg"]))
echo "<span style='color:red;'>" . $_SESSION["reg-error-msg"] . "</span>";
        ?>

                <div class="button">
                    <input id="submitBtn" name="regSubmit" type="submit" value="Register">
                </div>

                <div class="have-Account">Already have an account? <a href="loginPage.php" id="login">Login Now</a>
                </div>

            </form>

        </div>

    </div>

    <script src="./js/validation.js"></script>
</body>

</html>