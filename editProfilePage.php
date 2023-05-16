<?php 
   include("./Handler/config.php");
   if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
   }
?>

<form action="./Handler/editProfileHandler.php" method="post">
    <div class="user-details">

        <div class="input-box">
            <label>Username</label>
            <input onkeyup="validateUsername()" id="username" name="username" type="text"
                placeholder="Enter your username" value="<?php echo $_SESSION['username'] ?>" required>
            <span id="username-error" style="display:none; color:red;"></span>
        </div>

        <div class="input-box">
            <label>Email</label>
            <input name="email" type="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Enter your email"
                required>
        </div>

        <div class="input-box">
            <label>Your Current Password</label>
            <input id="oldPassword" name="oldPassword" type="password" placeholder="Enter your current password"
                required>
        </div>
        <a style="text-decoration:underline; color:purple; cursor: pointer;" id="changePassBtn"
            onclick="changePassEvent()">change password</a>
        <div id="changePassword" class="changePassword">


            <div class="input-box">
                <label>New Password</label>
                <input onkeyup="validatePassword()" id="password" name="newPassword" type="password"
                    placeholder="Enter your new password">
                <span id="password-error" style="display:none; color:red;"></span>
            </div>

            <div class="input-box">
                <label>Reenter Password</label>
                <input onkeyup="validateRpassword()" id="rPassword" name="rNewPassword" type="password"
                    placeholder="Confirm your password">
                <span id="rPassword-error" style="display:none; color:red;"></span>
            </div>

        </div>

    </div>


    <div class="action-container">
        <button id="submitBtn" type="submit" class="view-btn" name="edit-profile">Done</button>
        <button onClick="viewProfile()" class="del-btn">Cancel</button>
    </div>

</form>