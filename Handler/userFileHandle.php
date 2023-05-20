<!-- Add File Handle  -->
<?php
session_start();
include("./config.php");
if (isset($_POST['file-submit'])) {

    // validation CSRF Token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Token mismatch");
    } else {
        // CSRF token is valid, process the form data.
        $oldFileID = $_POST['oldFileID'];
        $oldFilePath = $_POST['oldFilePath'];
        $filedescription = $_POST['fileDes'];
        $fileName = $_FILES["uploadfile"]["name"];
        $tempName = $_FILES["uploadfile"]["tmp_name"];
        $random_number = mt_rand(10000, 99999); //genarate 5digit random number
        $saveFileName = $_SESSION['user_id'] . $random_number . $fileName;
        $folder = "../userFiles/" . $saveFileName;
        $allowedTypes = ['application/pdf'];
        $fileType = mime_content_type($_FILES["uploadfile"]["tmp_name"]);

        if (in_array($fileType, $allowedTypes)) {
            if ($oldFileID && $oldFilePath) {
                $stmt = $con->prepare("UPDATE `userfile` SET `filedescription`= ?,`path`= ? WHERE  `id`=?  ");

                $stmt->bind_param("sss", $filedescription, $saveFileName, $oldFileID);

                move_uploaded_file($tempName, $folder);
                $OldfileLocation = "../userFiles/" . $oldFilePath;
                if (file_exists($OldfileLocation)) { // checks if the file exists
                    unlink($OldfileLocation); // deletes the file from folder
                }
            } else {
                $stmt = $con->prepare("INSERT INTO userfile (`userid`, `filedescription`, `path`) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $_SESSION['user_id'], $filedescription, $saveFileName);
                move_uploaded_file($tempName, $folder);
            }

            // Execute the insert statement
            if ($stmt->execute() === TRUE) {
                // File upload successful
                echo '<script>';
                echo 'alert("File uploaded successfully!");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../profilePage.php";';
                echo '}, 10);';
                echo '</script>';


                // Close the database connection
                $stmt->close();
                $con->close();
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo '<script>';
            echo 'alert("Invalid PDF file");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../profilePage.php";';
            echo '}, 1000);';
            echo '</script>';
        }
    }
}

// DELETE FILE 
if (isset($_GET['delId']) && isset($_GET['filePath']) && isset($_SESSION['user_id'])) {
    $delId = $_GET['delId'];
    $filePath = $_GET['filePath'];
    $userId = $_SESSION['user_id'];

    // Query to check if the file belongs to the logged-in user
    $query = "SELECT id FROM userfile WHERE id = ? AND userid = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $delId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // The file belongs to the logged-in user, proceed with deletion
        $sql = "DELETE FROM userfile WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $delId);

        if ($stmt->execute()) {
            $fileLocation = "../userFiles/" . $filePath;

            if (file_exists($fileLocation)) {
                unlink($fileLocation); // Deletes the file from the folder
            }
            header("Location: ../profilePage.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // The file does not belong to the logged-in user, redirect to profilePage
        header("Location: ../profilePage.php");
    }
} else {
    // Redirect to a login page for unauthorized access
    header("Location: ../loginPage.php");
}

?>