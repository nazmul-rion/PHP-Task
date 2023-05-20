<?php
// Start the session
session_start();
include("config.php");
if (isset($_POST['regSubmit'])) {

  // validation CSRF Token
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Token mismatch");
  } else {
    // CSRF token is valid, process the form data.
    $username = mysqli_real_escape_string($con, htmlspecialchars($_POST['username']));
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $rPassword = mysqli_real_escape_string($con, $_POST['rPassword']);

    // Validate username or Email
    $sql = "SELECT id FROM users WHERE username = ? OR email = ?";

    if ($stmt = $con->prepare($sql)) {

      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("ss", $username,  $email);
      if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
          $_SESSION["reg-error-msg"] = "Sorry, This Username or Email is already taken.";
          header("Location: ../registrationPage.php");
        } else {

          // Hash and salt the password
          $salt = bin2hex(random_bytes(16)); // generate a random 16-byte salt
          $hashed_password = password_hash($password . $salt, PASSWORD_DEFAULT);

          // Prepare and bind the insert statement
          $stmt = $con->prepare("INSERT INTO users (username, email, password, saltPass) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $username, $email, $hashed_password,  $salt);

          // Execute the insert statement
          if ($stmt->execute() === TRUE) {
            // Registration successful, set session variables
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $con->insert_id;
            $_SESSION["email"] = $email;
            echo '<script>';
            echo 'alert("User registration successful.");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../profilePage.php";';
            echo '}, 10);';
            echo '</script>';
            exit();
          } else {
            echo "Error: " . $stmt->error;
          }

          // Close the database connection
          $stmt->close();
          $con->close();
        }
      }
    }
  }
}
