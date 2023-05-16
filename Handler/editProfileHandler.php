<?php 
   session_start();
   include("./config.php");

   if(isset($_POST['edit-profile'])){
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $rNewPassword = $_POST['rNewPassword'];

    // Validate password
$sql = "SELECT * FROM users WHERE id = ?";

if ($stmt = $con->prepare($sql)) {

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("s", $_SESSION['user_id']);
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();

        if ($stmt->num_rows == 1) {

             // Bind the result variables
             $stmt->bind_result($id, $username, $email, $hashed_password, $salt);
            
             if ($stmt->fetch()) {
                 // Verify the password
                 if (password_verify($oldPassword . $salt, $hashed_password)) {


                     // Password is correct and updating details

                      // Validate username

        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $con->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $newUsername);
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();


                if ( ($newUsername != $_SESSION['username']) && ($stmt->num_rows == 1)) {
                    $_SESSION["edit-error-msg"] = "this username already exist";
                    header("Location: ../profilePage.php");
                } 
                
                else {
                   
                       // Validate Email
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = $con->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s",$newEmail);
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();
                if ( ($newEmail != $_SESSION['email']) && $stmt->num_rows == 1) {
                    $_SESSION["edit-error-msg"] = "this email already exist";
                    header("Location: ../profilePage.php");
                } 
                
                else {
                   
                                        if($newPassword && $rNewPassword){
// Hash and salt the password
  $salt = bin2hex(random_bytes(16)); // generate a random 16-byte salt
  $hashed_password = password_hash($newPassword . $salt, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET username=?, email=?, password=?, saltPass=? WHERE id=?";  // Prepare an update statement with new password
        
}
            else{ 
                    $sql = "UPDATE users SET username=?, email=? WHERE id=?";  // Prepare an update statement
                }

        if($stmt = $con->prepare($sql)){

            // Bind variables to the prepared statement as parameters
            if($newPassword && $rNewPassword)
            $stmt->bind_param("ssssi", $newUsername, $newEmail, $hashed_password, $salt, $_SESSION["user_id"]);
            else
            $stmt->bind_param("ssi", $newUsername, $newEmail, $_SESSION["user_id"]);


            // Attempt to execute the prepared statement
            if($stmt->execute() === TRUE){
                $_SESSION["edit-error-msg"]="";
                // Redirect to profile page
                $_SESSION["username"] = $newUsername;
                $_SESSION["email"] = $newEmail;
                header("Location: ../profilePage.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }}}}}}}}}
         
         else {
                     //Password is not correct, show an error message
                     $_SESSION["edit-error-msg"] = "wrong password";
                     
                     if(isset($_SESSION["edit-error-msg"]))
                     echo "<span style='color:red;'>" . $_SESSION["edit-error-msg"] . "</span>";
                             
                     header("Location: ../profilePage.php");
         }}}}}}
?>