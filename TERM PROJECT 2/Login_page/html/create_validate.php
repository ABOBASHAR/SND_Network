<?php
function validate_customer_dataI(&$fname,&$email,&$package,&$password,&$errors){
    $errors=["fname_error" => "", "email_error" => "", "package_error" => "", "password_error" => ""];
#First name validation
    if(empty(trim($_POST["fname"]))){
        $errors["fname_error"]="Error ... first name field required";
    }
    else{ 
        $fname=ucfirst(trim($_POST["fname"]));
//Ensure using the alphabetic character
    if(!preg_match("/[a-z]/", $fname)){
            $errors["fname_error"]="Invalid first name format.";
        }
    }
#Email validation
    if(empty(trim($_POST["email"]))){
    $errors["email_error"]="Error ... Email field required.";
    }
    else{
    $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors["email_error"]="Invalid Email format.";
    }
}
#Password validation
        $password = trim($_POST["password"]);
        if (strlen($password) < 8) {
            $errors["password_error"] = "Password must be at least 8 characters long.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $errors["password_error"]= "Password must contain at least one uppercase letter.";
        } elseif (!preg_match("/[a-z]/", $password)) {
            $errors["password_error"]= "Password must contain at least one lowercase letter.";
        }elseif (!preg_match("/[0-9]/", $password)) {
            $errors["password_error"]= "Password must contain at least one number.";
        } elseif (!preg_match("/[\W_]/", $password)) {
            $errors["password_error"]= "Password must contain at least one special character (e.g. @, #, $, etc.).";
        } else {
            $password = trim($_POST["password"]);
        }
#Package validation
        if(empty(trim($_POST["package"]))){
            $errors["package_error"]= "Error ... Package field required.";
        }else{
            $package=trim($_POST["package"]);
        }
        return empty(array_filter($errors));
}




















?>