<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['package'])) {
    $selectedPackage = urlencode($_POST['package']);
    header("Location: index.php?package=" . $selectedPackage);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SND</title>
  <link rel="shortcut icon" href="../img/favicon.ico" />
  <link rel="stylesheet" href="../css/style-offers.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <img src="../img/4.png" alt="SND NET Logo" class="logo" />
    <div class="nav-links">
        <a href="../html/auth-login.php" class="nav-logo">Home</a>
        <a href="../html/program.html" class="nav-item">Program</a>
        <a href="../html/offers.php" class="nav-item active">Offers</a>
        <a href="../html/developers.html" class="nav-item">Developers</a>
      </div>
  </nav>
  <form action="index.php" method="GET" id="packageForm">
  <!-- Main Content -->
  <main class="offers-container">
    <h1>Our Exclusive Offers</h1>
    <div class="offers-grid">
      <div class="offer-card">
        <h2>100MB</h2>
        <p>Price: $2</p>
        <p>Validity: 7 Days</p>
        <button type="submit" name="package" value="100MB - $2" class="btn">Select</button>
      </div>
      <div class="offer-card">
        <h2>1GB</h2>
        <p>Price: $5</p>
        <p>Validity: 15 Days</p>
        <button type="submit" name="package" value="1GB - $5" class="btn">Select</button>
      </div>
      <div class="offer-card">
        <h2>5GB</h2>
        <p>Price: $10</p>
        <p>Validity: 30 Days</p>
        <button type="submit" name="package" value="5GB - $10" class="btn">Select</button>
      </div>
      <div class="offer-card">
        <h2>10GB</h2>
        <p>Price: $15</p>
        <p>Validity: 60 Days</p>
        <button type="submit" name="package" value="10GB - $20" class="btn">Select</button>
      </div>
      <div class="offer-card">
        <h2>Unlimited</h2>
        <p>Price: $30</p>
        <p>Validity: 30 Days</p>
        <button type="submit" name="package" value="Unlimited - $50" class="btn">Select</button>
      </div>
    </div>
  </main>
</form>
  <footer class="footer">
    <p>
      Developed & Powered By <span class="highlight">SND NET</span> &copy;
      2025
    </p>
  </footer>
</body>
</html>
