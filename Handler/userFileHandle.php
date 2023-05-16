<!-- Add File Handle  -->
<?php
session_start(); 
   include("./config.php");
if(isset($_POST['file-submit'])){
   $oldFileID = $_POST['oldFileID'];
   $oldFilePath = $_POST['oldFilePath'];
   $filedescription = $_POST['fileDes'];
   $fileName = $_FILES["uploadfile"]["name"];
   $tempName = $_FILES["uploadfile"]["tmp_name"];
   $random_number = mt_rand(10000, 99999); //genarate 5digit random number
   $saveFileName = $_SESSION['user_id'].$random_number.$fileName;
   $folder = "../userFiles/";

   if($oldFileID && $oldFilePath )
   {
    $stmt = $con->prepare("UPDATE `userfile` SET `filedescription`= ?,`path`= ? WHERE  `id`=?  ");

   $stmt->bind_param("sss", $filedescription, $saveFileName, $oldFileID);

   move_uploaded_file($tempName,$folder.$saveFileName);
   $OldfileLocation = "../userFiles/".$oldFilePath;
   if(file_exists($OldfileLocation)) { // checks if the file exists
    unlink($OldfileLocation); // deletes the file from folder
    echo "File deleted successfully.";
} else {
    echo "File not found.";
}
   }
else

   {
    $stmt = $con->prepare("INSERT INTO userfile (`userid`, `filedescription`, `path`) VALUES (?, ?, ?)");
   $stmt->bind_param("sss", $_SESSION['user_id'], $filedescription, $saveFileName);
   move_uploaded_file($tempName,$folder.$saveFileName);
}
   
   // Execute the insert statement
   if ($stmt->execute() === TRUE) {
     // File upload successful
      echo "<script>alert('File uploaded successfully!');</script>";
     header("Location: ../profilePage.php");
      // Close the database connection
  $stmt->close();
  $con->close();
     exit();


   } else {
     echo "Error: " . $stmt->error;
   }
}


// DELETE FILE 
if((isset($_GET['delId'])))
{
    // query to delete the file from the database by ID
    $sql = "DELETE FROM userfile WHERE id = ?";

echo $_GET['delId'];

$fileLocation = "../userFiles/".$_GET['filePath'];

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $_GET['delId']);

    if ($stmt->execute()) {
        // file successfully deleted from the database
        echo "File deleted successfully from database";

        if(file_exists($fileLocation)) { // checks if the file exists
         unlink($fileLocation); // deletes the file from folder
         echo "File deleted successfully.";
     } else {
         echo "File not found.";
     }

       header("Location: ../profilePage.php");

    } else {
        // error deleting file from the database
        echo "Error deleting file";
    }
}




?>