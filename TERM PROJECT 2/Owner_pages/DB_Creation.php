<?php
//To include "DB_Connection.php" file
require_once "DB_Connection.php";
//To include "Info_Validation.php" file
require_once "Info_Validation.php";
//Defining & initializing variables
$fname=$lname=$email=$package=$password=$Joining_date="";
$errors=[];
//When submitting form
if($_SERVER["REQUEST_METHOD"] == "POST"){
# Ensuring that there is no errors before inserting data into database
if(validate_customer_data($fname,$lname,$email, $password, $package,$Joining_date, $errors)){
    $sql="INSERT INTO Customer (first_name, last_name, email, password, package, Joining_date) VALUES ( ?, ?, ?, ?, ?, ?)";
    if($stmt=mysqli_prepare($link,$sql)){
        //Binding variables
                mysqli_stmt_bind_param($stmt,"ssssss",$fname,$lname,$email,$password,$package,$Joining_date);
        //======the "S" refers to string
        //======the "i" refers to int 
        //Executing Javascript
                if(mysqli_stmt_execute($stmt)){
                    echo "<script>" . "alert('New record created successfully.');" . "</script>";
                    echo "<script>" . "window.location.href='./'" . "</script>";
                    
                    exit;
                    } else {
                    echo "Oops! Something went wrong. Please try again later."."<br>";
                    echo "Error: " . mysqli_stmt_error($stmt);
                    }
        #Closing statement
                    mysqli_stmt_close($stmt);
                }else {
                    echo "Oops! Something went wrong. Please try again later.";
                    echo "Error: " . mysqli_error($link);
                }
                }
#Closing connection
    mysqli_close($link);
    
    }

?>
