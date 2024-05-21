<?php
session_start();
$conn = mysqli_connect("localhost","root","","saint_anne");
if (isset($_SESSION['UserName'])) {
    header('location:../index.php');
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($conn,"SELECT * FROM chief WHERE UserName = '{$username}' AND Password = '{$password}' ");
    if(mysqli_num_rows($login) == 1){
        $fetch = mysqli_fetch_assoc($login)['UserName'];
        $_SESSION['UserName'] = $fetch;
        header("Location: ../index.php");
    }else{
        echo "Username or password is incorrect!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/logina.css">
</head>
<body>
    <form action="" method="post">
        <h1>Login here</h1>
        <label for="username">Username</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit" name="login">Login</button><br><br>
       <span>don't have account?</span> <a href="./signup.php" id="link">Sign Up</a>
    </form>
</body>
</html>