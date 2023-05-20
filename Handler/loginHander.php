<?php
// Start the session
session_start();
include("config.php");
if (isset($_POST['loginSubmit'])) {

    // validation CSRF Token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Token mismatch");
    } else {
        // CSRF token is valid, process the form data.
        $usernameORemail = $_POST['usernameORemail'];
        $password = $_POST['password'];


        // Validate username
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";

        if ($stmt = $con->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $usernameORemail,  $usernameORemail);
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind the result variables
                    $stmt->bind_result($id, $username, $email, $hashed_password, $salt);

                    if ($stmt->fetch()) {
                        // Verify the password
                        if (password_verify($password . $salt, $hashed_password)) {
                            // Password is correct, start the session
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            header("Location: ../profilePage.php");
                        } else {
                            //Password is not correct, show an error message
                            $_SESSION["login-error-msg"] = "Invalid password";
                            header("Location: ../loginPage.php");
                        }
                    }
                } else {
                    $_SESSION["login-error-msg"] = "Can't find your Username or Email address";
                    header("Location: ../loginPage.php");
                    // Close the database connection
                    $stmt->close();
                    $con->close();
                }
            }
        }
    }
}
