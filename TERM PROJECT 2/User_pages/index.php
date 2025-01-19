<?php
require_once "../Owner_pages/DB_Connection.php";
require_once "../Login_page/html/create_validate.php";
$userfName = $userlName = $userEmail = $Starth = $Pprice = "";
$errors = [];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname = trim($_POST["fname"]);
    $password = trim($_POST["password"]);
    
    // Fetch user data from database
    $sql = "SELECT * FROM Customer WHERE first_name = ? AND password = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $fname, $password);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $userfName = $row["first_name"];
                $userlName = $row["last_name"];
                $userEmail = $row["email"];
                $Starth = $row["Joining_date"];
                $Pprice = $row["package"];
                mysqli_free_result($result);
            } else {
                echo "<script>" . "alert('No matching records found.');" . "</script>";
            }
        } else {
            echo "<script>" . "alert('Error executing query: " . mysqli_error($link) . "');" . "</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Information</title>
<link rel="stylesheet" href="style-info.css">
<link rel="shortcut icon" href="../Login_page/img/favicon.ico">
</head>
<body>
    <div class="container">
        <div class="profile-icon" onclick="showProfile()">
            <img src="profile-icon.png" alt="Profile">
        </div>
        <h1>Data Information</h1>
        <table>
            <tr>
                <td>UserName:</td>
                <td>mohammed</td>
            </tr>
            <tr>
                <td>User Email :</td>
                <td><?php htmlspecialchars($userEmail); ?></td>
            </tr>
            <tr>
                <td>User Package  :</td>
                <td>5GB-10$</td>
            </tr>
            <tr>
                <td>Subscription Date :</td>
                <td>2025-01-14</td>
            </tr>
        </table>
        
        <div class="buttons">
            <button onclick="window.location.href='../Login_Page/html/auth-login.php'">Logout</button>
        </div>
    </div>

    <div class="profile-popup" id="profilePopup">
        <span class="close-btn" onclick="closeProfile()">X</span>
        <h2>Personal Information</h2>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($userfName); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
        <button onclick="closeProfile()">Close</button>
    </div>

    <script src="Showing_Info.js"></script>
</body>
</html>
