<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Dark Theme/Dark_Theme.css">
    <link rel="stylesheet" href="CSS_Owner_page/Eye.css">
    <!-- <link rel="stylesheet" href="../Login_page/css/style-program.css"> -->
    <link rel="stylesheet" href="CSS_Owner_Page/index_nav.css">
    <link rel="shortcut icon" href="../Login_page/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Customers Management</title>
    
</head>

<body>
<nav class="navbar0">
    <img src="../Login_page/img/4.png" alt="SND NET Logo" class="logo" />
    <div class="nav-links">
        <a href="../Login_page/html/auth-login.php" class="nav-logo">Home</a>
        <a href="../Login_page/html/program.html" class="nav-item">Program</a>
        <a href="../Login_page/html/offers.php" class="nav-item">Offers</a>
        <a href="../Login_page/html/developers.html" class="nav-item">Developers</a>
    </div>
    </nav>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Customers List</h2>
            <a href="Adding_Customer.php" class="btn btn-secondary">
                <i class="bi bi-plus-circle-fill"></i> Add Customer
            </a>
        </div>
<!-- Table starts here -->
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Package</th>
                    <th>Password</th>
                    <th>Joining Date</th>
                    <th>Actions</th>
                    
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
// Include connection
                require_once "DB_Connection.php";
// Fetch records from database
                $sql = "SELECT * FROM Customer";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $count++; ?></td>
                    <td><?= htmlspecialchars($row["first_name"]); ?></td>
                    <td><?= htmlspecialchars($row["last_name"]); ?></td>
                    <td><?= htmlspecialchars($row["email"]); ?></td>
                    <td><?= htmlspecialchars($row["package"]); ?></td>
                    <td><?= htmlspecialchars($row["password"]); ?></td>
                    <td><?= htmlspecialchars($row["Joining_date"]); ?></td>
                    <td>
                        <a href="Editing_Customer.php?id=<?= htmlspecialchars($row["id"]); ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="Deleting_Customer.php?id=<?= htmlspecialchars($row["id"]); ?>"
                            class="btn btn-danger btn-sm delete-btn">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php }
                        mysqli_free_result($result);
                    } else { ?>
                <tr>
                    <td class="text-center text-danger fw-bold" colspan="9">No records found.</td>
                </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='9' class='text-center text-danger'>Error fetching data.</td></tr>";
                }
                // Close connection
                mysqli_close($link);
                ?>
            </tbody>
        </table>
    </div>
    <script src="Delete_Confirmation.js"></script>
</body>
</html>