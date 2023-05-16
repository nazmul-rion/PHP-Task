<?php
// logout the user and destroy the session
if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("location: ../loginPage.php");
    exit;
}
?>