<?php
require_once "DB_creation.php";
require_once "Info_Validation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <link rel="stylesheet" href="CSS_Owner_Page/Dark_Theme.css">
    <link rel="stylesheet" href="CSS_Owner_page/Eye.css">
    <link rel="stylesheet" href="../Login_page/css/style-program.css">
    <link rel="shortcut icon" href="../Login_page/img/favicon.ico">
    <title>Adding_customer</title>
</head>
<body>
<nav class="navbar">
      <img src="../Login_page/img/4.png" alt="SND NET Logo" class="logo" />
      <div class="nav-links">
        <a href="index.php" class="nav-logo">Home</a>
        <a href="../Login_page/html/program.html" class="nav-item">Program</a>
        <a href="../Login_page/html/offers.php" class="nav-item">Offers</a>
        <a href="../Login_page/html/developers.html" class="nav-item">Developers</a>
      </div>
    </nav>

<!-- <button class="theme-toggle-btn" id="themeToggle">Dark Mode</button> -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6" >
                <!-- form starts here -->
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-container"
                    method="post">
                    <h2 class="text-center mb-3">Add Customer</h2>
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>" >
                            <small class="text-danger" ><?= $errors["fname_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" value="<?= $lname; ?>" required>
                            <small class="text-danger"><?= $errors["lname_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>" required>
                            <small class="text-danger"><?= $errors["email_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-12 password-container">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?= $password; ?>" required>
                            <div class="toggle-password" id="toggle-password">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-10a4 4 0 100 8 4 4 0 000-8z"/>
                            </svg>
                            </div>
                            <small class="text-danger"><?=$errors["password_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-6">
                            <label for="package" class="form-label">Choose package</label>
                            <select name="package" class="form-select" id="package">
                                <option selected disabled>Select Package</option>
                                <option value="100MB - $2"
                                    <?= (isset($package) && $package == "100MB - $2") ? "selected" : ""; ?>>
                                    100MB - $2 
                                </option>
                                <option value="1GB - $5"
                                    <?= (isset($package) && $package == "1GB - $5") ? "selected" : ""; ?>>
                                    1GB - $5
                                </option>
                                <option value="5GB - $10"
                                    <?= (isset($package) && $package == "5GB - $10") ? "selected" : ""; ?>>
                                    5GB - $10
                                </option>
                                <option value="10GB - $15"
                                    <?= (isset($package) && $package == "10GB - $15") ? "selected" : ""; ?>>
                                    10GB - $15
                                </option>
                                <option value="Unlimited - $30"
                                    <?= (isset($package) && $package == "Unlimited - $30") ? "selected" : ""; ?>>
                                    Unlimited - $30 
                                </option>
                                
                            </select>
                            <small class="text-danger"><?= $errors["package_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-6">
                            <label for="Joining_date" class="form-label">Joining Date</label>
                            <input type="date" class="form-control" name="Joining_date" id="Joining_date" value="<?= $Joining_date ; ?>" required>
                            <small class="text-danger"><?= $errors["Joining_date_error"] ?? ''; ?></small>
                        </div>
                        <div class="col-lg-12 d-grid">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </div>
                </form>
                <!-- form ends here -->
            </div>
        </div>
    </div>
    <script src="JS_Owner_Page/Eye.js"></script>

</body>
</html>