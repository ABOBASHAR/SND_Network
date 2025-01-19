<?php
require_once "../../Owner_pages/DB_Connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname = trim($_POST['fname']);
    $password = trim($_POST['password']);
    $error = "";
    
    $sql = "SELECT * FROM Customer WHERE first_name = ? AND password = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ss",  $fname,$password);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // // Debug information
            // echo "Login attempt details:<br>";
            // echo "Username entered: '" . htmlspecialchars($username) . "'<br>";
            // echo "Password entered: '" . htmlspecialchars($password) . "'<br>";
            
            // Let's see what's in the database
            $check_sql = "SELECT * FROM Customer";
            $check_result = mysqli_query($link, $check_sql);
            while($row = mysqli_fetch_assoc($check_result)) {
              htmlspecialchars($row["first_name"]);
              htmlspecialchars($row["last_name"]);
              htmlspecialchars($row["email"]);
              htmlspecialchars($row["package"]);
              htmlspecialchars($row["password"]); 
              htmlspecialchars($row["Joining_date"]);
            }
            
            if(mysqli_num_rows($result) == 1){
                header("Location: ../../User_pages/index.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Error executing query: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
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

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php if(!empty($error)): ?>
                <div class="error-message" style="color: red; margin-bottom: 10px; text-align: center;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <div class="input-group">
              <input
                id="username"
                name="fname"
                type="text"
                required
                value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>"
                placeholder="Enter your first name"
              />
            </div>

            <div class="input-group">
              <input
                id="Password"
                name="password"
                type="password"
                required
                value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"
                placeholder="Enter your password"
              />
            </div>

            <div class="remember-section">
              <div class="remember">
              </div>
              <a href="../html/forget.php" class="forgot-password"
                >Forget Password?</a
              >
            </div>

            <button type="submit" class="login-btn">Log In</button>
          </form>

          <div class="divider">
            <span>Or</span>
          </div>

          <p class="register-link">
            Don't have an account? <a href="../html/index.php">Register</a>
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
