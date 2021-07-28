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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>