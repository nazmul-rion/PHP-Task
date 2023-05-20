<?php

include("./Handler/config.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
}
?>

<form class="addFileForm" action="./Handler/userFileHandle.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input id="oldFileID" type="text" name="oldFileID" hidden>
    <input id="oldFilePath" type="text" name="oldFilePath" hidden>


    <input id="fileDescriptionTxt" type="text" name="fileDes" placeholder="Enter File description" required>
    <input type="file" name="uploadfile" accept="application/pdf" required>
    <input id="fileUploadBtn" type="submit" name="file-submit" value="upload">

</form>

<a id="go_back_btn" onClick="backFileBtnEvent()" class="view-btn">Go Back</a>

<script>
    function backFileBtnEvent() {
        fileListSection.style.display = "inline";
        addFileListSection.style.display = "none";
    }
</script>