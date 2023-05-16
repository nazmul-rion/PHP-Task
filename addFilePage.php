<?php 

   include("./Handler/config.php");
   if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
   }
?>


<form class="addFileForm" action="./Handler/userFileHandle.php" method="post" enctype="multipart/form-data">

    <input id="oldFileID" type="text" name="oldFileID" hidden>
    <input id="oldFilePath" type="text" name="oldFilePath" hidden>
    <input id="fileDescriptionTxt" type="text" name="fileDes" placeholder="Enter File description" required>
    <input type="file" name="uploadfile" required>
    <input id="fileUploadBtn" type="submit" name="file-submit" value="upload">

</form>

<a class="view-btn" href="./profilePage.php">Go Back</a>