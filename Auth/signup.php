<?php
session_start();
$conn = mysqli_connect("localhost","root","","saint_anne");
if (isset($_SESSION['UserName'])) {
    header('location:./index.php');
}
if (isset($_POST["signup"] )) {
$username=$_POST["username"];
$password=$_POST["password"];
$sqlcheck = "SELECT * FROM chief WHERE UserName='{$username}'";
$check = mysqli_query($conn,$sqlcheck);
if (mysqli_num_rows($check) > 0) {
    # code...
    echo "username already exists";
}
else{
    $add =  mysqli_query($conn,"INSERT INTO chief(UserName,Password) VALUES('{$username}','{$password}')");
    if ($add) {
        $fetch = mysqli_query($conn,"SELECT * FROM chief WHERE UserName='{$username}' AND Password='{$password}'");
        $fetchName = mysqli_fetch_assoc($fetch)["UserName"];
        $_SESSION['UserName'] = $fetchName;
        header('location:../index.php');
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Signup here</h1>
        <label for="username">Username</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit" name="signup">Sign up</button><br><br>
       <span>already have account</span> <a href="./login.php" id="link">Login</a>
    </form>
</body>
</html><link rel="stylesheet" href="../css/logina.css">