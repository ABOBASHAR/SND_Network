<?php
//To include "DB_Connection.php" file
require_once "DB_Connection.php";
//To Ensure that Id's values is not null
//(if it was null all values will be deleted)
    $id = $_GET["id"] ?? null;
    if($id){
    //deleting using SQL
    $sql="DELETE from Customer WHERE id = ?";
//preparing statement
    $stmt=mysqli_prepare($link, $sql);
//Binding parameters
    mysqli_stmt_bind_param($stmt, "i", $id);
//Executing statement
    mysqli_stmt_execute($stmt);
//Closing statement
    mysqli_stmt_close($stmt);
    }
    header("Location: index.php");
    exit();
?>