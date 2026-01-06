<?php session_start();
include "./connection.php";
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $agree = isset($_POST['agree'])?1:0;

if($password === $cpassword && $agree){
    $hashedPwd = sha1($password);
    $sql = "INSERT INTO tbl_users (fullname, username, email, password)
            VALUES ('$fullname', '$username', '$email', '$hashedPwd')";
    $res = mysqli_query($conn, $sql);
    if($res) $_SESSION['message'] = "Registration successful ! You can now log in.";
    else $_SESSION['error'] = "Registration failed";
}
else $_SESSION['error'] = "Passwords do not match or Terms & Conditions not agreed.";
}
header("location:login.php");
