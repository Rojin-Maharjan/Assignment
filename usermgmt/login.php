<?php session_start();
include "./connection.php";
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    //Basic validation
    if(empty($username) || empty($password)){
        $_SESSION['error'] = "All fields are required.";
    } else {
        $sql = "SELECT id, username, password FROM tbl_users WHERE username = '$username' OR email = '$username' LIMIT 1";
        $res = mysqli_query($conn, $sql);
        if($res -> num_rows === 1) {
            $user = $res -> fetch_assoc();
            $hasPwd = sha1($password); // Password hashing
            if($hasPwd === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                if($remember) {
                    setcookie("user_login", $user['username'], time() + (86400 * 30), "/"); // 30 days
                }
                header("Location: list.php");                
            } else {
                $_SESSION['error'] = "Incorrect password. Please try again.";
            }
        }else {
            $_SESSION['error'] = "Username or E-mail not found. Please register first.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | User Management</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <main class="container">
        <h1 class="page-title">Login</h1>
        <h1 class="sub-title">Welcome!</h1>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert success">
                <?php 
                    echo $_SESSION['message'];// display success message 
                    unset($_SESSION['message']); // remove message after displaying ?>
                    <?php elseif (isset($_SESSION['error'])): ?>
            <div class="alert error">
                <?php 
                    echo $_SESSION['error']; // display error message
                    unset($_SESSION['error']);// remove message after displaying?>
                

            </div>
        <?php endif; ?>
        <form action="#" method="post" name="user_form">
            <div class="field-group">
                <label for="uname"> E-mail / Username</label>
                <input type="text" id="uname" name="username">
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="password">
            </div>
            <div class="field-group text-center">
                <a href="#">Forget Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
        </form>
         <div class="btn-group">
                <span class="note">Don't have an account? <a href = "register.php" class="text-link">SignUp </a></span> <br><br>

    </div>
    </main>
</body>
</html>