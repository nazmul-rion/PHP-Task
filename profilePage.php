<?php 
   session_start();

   include("./Handler/config.php");
   if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="./css/profilePage.css">
</head>

<body>

    <div class="nav-container">
        <h1>Hi <?php echo $_SESSION['username'] ?></h1>

        <form action="./Handler/logout.php" method="POST">
            <button class="del-btn" type="submit" name="logout">Logout</button>
        </form>

    </div>
    <div class="container">

        <section class="section1">


            <div class="profile-card">
                <img src="./image/avatar.png" alt="Profile Picture">
                <h2> <?php echo $_SESSION['username'] ?></h2>

                <div id="view-profile" class="view-profile">
                    <p><b>Email:</b> <?php echo $_SESSION['email'] ?></p>
                    <p><b>Username:</b> <?php echo $_SESSION['username'] ?></p>


                    <?php
if(isset($_SESSION["edit-error-msg"]))
echo "<span style='color:red;'>" . $_SESSION["edit-error-msg"] . "</span>";
        ?>

                    <button onClick="editProfile()" id="edit-profile-btn" class="edit-btn">Edit Profile</button>
                </div>

                <div id="edit-profile" class="edit-profile">

                    <?php include("./editProfilePage.php") ?>

                </div>

        </section>

        <section class="section2">

            <button onClick="addFileBtnEvent()" id="add-file-btn" style="float: right; margin:5px 10px">Add New
                File</button>


            <div id="file-list" class="file-list">

                <?php include("./FileListSection.php") ?>

            </div>

            <div id="add-file-section" class="add-file-section">

                <?php include("./addFilePage.php") ?>

            </div>


        </section>
    </div>


    <script src="./js/validation.js"></script>
    <script src="./js/buttonEvent.js"></script>
</body>

</html>