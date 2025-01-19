<?php
session_start();
if(!isset($_SESSION['reset_email'])) {
    header("location: forget.php");
    exit();
}


$errors = isset($_SESSION['password_errors']) ? $_SESSION['password_errors'] : [];
unset($_SESSION['password_errors']);
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

          <form action="update_password.php" method="POST">
            <div class="input-group">
              <input
                id="password"
                name="password"
                type="password"
                required
                value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"
                placeholder="Enter your new Password"
              />
              <?php if(isset($errors["password_error"])): ?>
                <span class="error-message"><?php echo $errors["password_error"]; ?></span>
              <?php endif; ?>
              <?php if(isset($errors["db_error"])): ?>
                <span class="error-message"><?php echo $errors["db_error"]; ?></span>
              <?php endif; ?>
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
