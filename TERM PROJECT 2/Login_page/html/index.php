<?php
require_once "../../Owner_pages/DB_Connection.php";
// require_once "../../Owner_pages/Info_Validation.php";
require_once "create_validate.php";
$fname=$email=$package=$password="";
date_default_timezone_set("Asia/Amman");
$Joining_date=date("Y-m-d");
$errors=[];
//When submitting form
if($_SERVER["REQUEST_METHOD"] == "POST"){

# Ensuring that there is no errors before inserting data into database
if(validate_customer_dataI($fname,$email, $package, $password, $errors)){
    $sql="INSERT INTO Customer (first_name, email, password, package,Joining_date) VALUES ( ?, ?, ?, ?, ?)";
    if($stmt=mysqli_prepare($link,$sql)){
        //Binding variables
                mysqli_stmt_bind_param($stmt,"sssss",$fname,$email,$password,$package,$Joining_date);
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SND</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">  
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link rel="stylesheet" href="../css/style-form.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <img src="../img/4.png" alt="SND NET Logo" class="logo" />
      <div class="nav-links">
        <a href="../html/auth-login.php" class="nav-logo">Home</a>
        <a href="../html/program.html" class="nav-item">Program</a>
        <a href="../html/offers.php" class="nav-item">Offers</a>
        <a href="../html/developers.html" class="nav-item">Developers</a>
      </div>
    </nav>
    <br/>
    <!-- Main Content -->
    <div class="row justify-content-center mt-5 form-container">
      
      <h1>Create Your Account</h1>
      
      <form class="account-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row gy-3">
        <div class=" col-lg-6 form-group">
          <label for="username" class="form-label">Username</label>
          <input
            type="text"
            id="username"
            placeholder="Enter your username"
            required
            name="fname"
          />
        </div>
        <div class="col-lg-6 form-group">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            id="email"
            placeholder="Enter your email"
            required
            name="email"
          /></div>
        </div>
        <div class="row gy-3">
          
        <div class="col-lg-6 form-group">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            id="password"
            placeholder="Enter your password"
            required
            name="password"
          />
        </div>
        <div class="col-lg-6 form-group">
          <label for="offers" class="form-label">Select Offer</label>
          <?php
            $selectedPackage = $_GET['package'] ?? '';
            ?>
          <select id="offers" name="package">
            <option value="100MB - $2" <?= $selectedPackage == '100MB - $2' ? 'selected' : ''; ?>>100MB - $2</option>
            <option value="1GB - $5" <?= $selectedPackage == '1GB - $5' ? 'selected' : ''; ?>>1GB - $5</option>
            <option value="5GB - $10" <?= $selectedPackage == '5GB - $10' ? 'selected' : ''; ?>>5GB - $10</option>
            <option value="10GB - $20" <?= $selectedPackage == '10GB - $20' ? 'selected' : ''; ?>>10GB - $20</option>
            <option value="Unlimited - $50" <?= $selectedPackage == 'Unlimited - $50' ? 'selected' : ''; ?>>Unlimited - $50</option>
        </select>
        </div>
      </div>
        <div class="form-group">
          <label for="visa" class="form-label">Visa Card Details</label>
          <div class="row gy-3">
            <div class="col-lg-6">
          <input
            type="text"
            id="card-number"
            placeholder="Card Number"
          /></div>
          <div class="col-lg-6">
          <input type="text" id="cvv" placeholder="CVV"  />
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-lg-12">
        <input
            type="text"
            id="expiry-date"
            placeholder="Expiry Date (MM/YY)"
          /></div>
      </div>
      <div class="row justify-content-center mt-3">
        
        <button type="submit" class="btn submit-btn">Create Account</button>
      </div>
    </div>
      </form>
      
    </div>
  </div>


    <footer class="footer">
      <p>
        Developed & Powered By <span class="highlight">SND NET</span> &copy;
        2025
      </p>
    </footer>
    
  </body>
</html>
