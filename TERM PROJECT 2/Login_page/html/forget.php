<?php
require_once "../../Owner_pages/DB_connection.php";
require_once "../../Owner_pages/Info_Validation.php";

$email1 = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["email"]))){
        $errors["email_error"] = "Error ... Email field required.";
    } else {
        $email1 = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
            $errors["email_error"] = "Invalid Email format.";
        } else {
            // Check if email exists in database
            $sql = "SELECT email FROM Customer WHERE email = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email1);
                
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Email exists, start session and proceed
                        session_start();
                        $_SESSION['reset_email'] = $email1;
                        
                        header("location: newpass.php");
                        exit();
                    } else {
                        $errors["email_error"] = "This email is not registered in our system.";
                    }
                } else {
                    $errors["email_error"] = "Database error. Please try again later.";
                }
                
                mysqli_stmt_close($stmt);
            }
        }
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>SND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="A fully featured Tailwind CSS AUth Page Template."
      name="description"
    />
    <meta content="MyraStudio" name="author" />
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="../css/styles.css" />
  </head>

  <body>
    <nav class="navbar">
      <img src="../img/4.png" alt="SND NET Logo" class="logo" />
      <div class="nav-links">
        <a href="../html/auth-login.php" class="nav-logo">Home</a>
        <a href="../html/program.html" class="nav-item">Program</a>
        <a href="../html/offers.php" class="nav-item">Offers</a>
        <a href="../html/developers.html" class="nav-item">Developers</a>
      </div>
    </nav>

    <div class="login-container">
      <div class="login-box">
        <div class="image-section">
          <img src="../img/1.jpg" alt="background" class="image" />
        </div>
        <div class="form-section">
          <div class="logoh1">
            <h2 class="brand-name">SND Network</h2>
          </div>

          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="input-group">
              <input
                id="email"
                type="email"
                name="email"
                value="<?= htmlspecialchars($email1) ?>"
                required
                placeholder="Enter your email"
              />
            </div>


            <button type="submit" class="login-btn">Reset Password</button>
          </form>

          <div class="divider">
            <span>Or</span>
          </div>

          <p class="register-link">
            Remember your password? <a href="../html/auth-login.php">Log In</a>
          </p>
        </div>
      </div>
      <footer class="footer">
        <p>
          Developed & Powered By <span class="highlight">SND NET</span> &copy;
          2025
        </p>
      </footer>
    </div>
  </body>
</html>
