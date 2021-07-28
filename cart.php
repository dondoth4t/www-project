<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
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

    if (isset($_POST['product-delete']) and isset($_SESSION['email'])) {
        $sql = "DELETE FROM `project_cart` WHERE id=" . $_POST['product-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    } else if (isset($_POST['product-update']) and isset($_SESSION['email'])) {
        $sql = "UPDATE `project_cart` SET `quantity`=" . $_POST['product-quantity'] . " WHERE id=" . $_POST['product-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    }
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
    <div class="container">
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
        $sql = "SELECT id, email, quantity FROM project_cart WHERE email='" . $_SESSION['email'] .  "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = $sql = "SELECT id, name, price, subtitle, img FROM project_products WHERE id=" . $row['id'];
                $item = $conn->query($sql)->fetch_assoc();
                echo '<div class="card mb-3">
                <div class="row align-items-center">
                <div class="col-md-2">
                <img src="' . $item['img'] . '" class="img-fluid rounded-start" alt="' . $item['name'] . '">
                </div>
                <div class="col-md-10">
                <div class="card-body">
                <h6 class="card-title">' . $item['name'] . ' x ' . $row['quantity'] . '</h6>
                <p class="card-text"><small class="text-muted">$' . $row['quantity'] * $item['price'] . '</small></p>
                <form action="" method="post">
                <div class="row mt-3">
                <div class="col-2 pe-2">
                <select class="form-select" name="product-quantity">';
                for ($x = 1; $x <= 10; $x++) {
                    if ($x === $row['quantity']) {
                        echo '<option value="' . $x . '" selected">' . $x . '</option>';
                    } else {
                        echo '<option value="' . $x . '">' . $x . '</option>';
                    }
                }
                echo '</select>
                </div>
                <div class="col-5 p-0">
                <button type="submit" name="product-update" class="btn btn-primary">Update Quantity</button>
                <button type="submit" name="product-delete" class="btn btn-danger">Delete Item</button>
                <input type="hidden" name="product-id" value="' . $row['id'] . '">
                </div>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>