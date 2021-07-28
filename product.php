<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>COMP 3340 Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/comp3340/project">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comp3340/project/browse.php">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comp3340/project/contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                            } else {
                                echo "Account";
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo '<li><a class="dropdown-item" href="/comp3340/project/account.php">Account</a></li>';
                                echo '<li><a class="dropdown-item" href="/comp3340/project/logout.php">Log Out</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="/comp3340/project/login.php">Log In</a></li>';
                                echo '<li><a class="dropdown-item" href="/comp3340/project/signup.php">Sign Up</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comp3340/project/cart.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    // Arrays to store loaded data
    $servername = "localhost";
    $username = "namuro_comp3340";
    $password = "comp3340";
    $dbname = "namuro_comp3340";
    // Create connection
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Store schedule data
    $sql = "SELECT id, name, price, subtitle, img FROM project_products WHERE id=" . $_GET['id'];
    $result = $conn->query($sql);
    ?>

    <div class="container">
        <div class="row align-items-center">
            <div class='col-12 col-lg-6'>
                <?php
                $row = $result->fetch_assoc();
                echo "<img src='" . $row['img'] . "' width='100%'>";
                ?>
            </div>
            <div class='col-1 col-lg-0'></div>
            <div class='col-12 col-lg-5'>
                <?php
                if (isset($_POST['product-add']) and isset($_SESSION['email'])) {
                    $sql = "SELECT id, email, quantity FROM project_cart WHERE id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $item = $result->fetch_assoc();
                        if ((int)$_POST['product-quantity'] + $item['quantity'] >= 10) {
                            $sql = "UPDATE project_cart SET quantity=10 WHERE id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                        } else {
                            $sql = "UPDATE project_cart SET quantity=" . ((int)$_POST['product-quantity'] + $item['quantity']) . " WHERE id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                        }
                    } else {
                        $sql = "INSERT INTO `project_cart`(`id`, `email`, `quantity`) VALUES (" . $_GET['id'] . ",'" . $_SESSION['email'] . "'," . $_POST['product-quantity'] . ")";
                    }
                    $result = $conn->query($sql);
                    $conn->close();
                }
                echo "<h6 class='text-muted mb-1'>" . $row['subtitle'] . "</h6><h1 class='mt-0 mb-1'>" . $row['name'] . "</h1><h2>$" . $row['price'] . "</h2>";
                ?>
                <form action="" method="post">
                    <div class="row mt-3">
                        <div class="col-2 pe-2">
                            <select class="form-select" name="product-quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-10 p-0">
                            <button type="submit" name="product-add" class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>