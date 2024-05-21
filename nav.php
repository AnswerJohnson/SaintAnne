<?php
session_start();
$conn = mysqli_connect("localhost","root","","saint_anne");
if (!$conn) {
    echo "not connected";
}
if (!isset($_SESSION['UserName'])) {
    header('location:./Auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <div class="logo">
                <img src="./images/logo.jpg" alt="product1">
                <span class="logo-text">Saint anne</span>
            </div>
            <div class="primary-nav">
                <a href="./index.php">Home</a>
                <a href="./products.php">Products</a>
                <a href="./productin.php">Stock In</a>
                <a href="./productout.php">Stock Out</a>
                <a href="./report.php">Reports</a>
            </div>
            <div class="secondary-nav">
                <span><?php echo $_SESSION["UserName"] ?></span>&nbsp;&nbsp;&nbsp;
                <a href="./Auth/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <section class="container">

    </section>
</body>

</html>