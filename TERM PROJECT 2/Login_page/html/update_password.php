<?php
session_start();
require_once "../../Owner_pages/DB_connection.php";

// Check if user is coming from password reset process
if(!isset($_SESSION['reset_email'])) {
    header("location: forget.php");
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate password
    $password = trim($_POST["password"]);
    if (strlen($password) < 8) {
        $errors["password_error"] = "Password must be at least 8 characters long.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors["password_error"]= "Password must contain at least one uppercase letter.";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errors["password_error"]= "Password must contain at least one lowercase letter.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors["password_error"]= "Password must contain at least one number.";
    } elseif (!preg_match("/[\W_]/", $password)) {
        $errors["password_error"]= "Password must contain at least one special character (e.g. @, #, $, etc.).";
    } else {
        // Update password in database - Fix the column order
        $sql = "UPDATE Customer SET Password = ? WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $password, $_SESSION['reset_email']);
            
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully
                session_destroy(); // Clear all session variables
                header("location: auth-login.php?password_updated=true");
                exit();
            } else {
                $errors["db_error"] = "Something went wrong. Please try again later.";
            }
            
            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
    
    // If there are errors, redirect back to newpass.php with error messages
    if(!empty($errors)){
        $_SESSION['password_errors'] = $errors;
        header("location: newpass.php");
        exit();
    }
}
?> 