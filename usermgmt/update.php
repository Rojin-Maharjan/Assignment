<?php session_start();
include "./connection.php";

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $photo = $_FILES['photo'];

    $sql = "";
    if($photo !== ''){
    $photo_size=$photo['size'];
    $photo_name=$photo['name'];
    $photo_tmp=$photo['tmp_name'];
    move_uploaded_file($photo_tmp, "./uploads/".$photo_name);

    $sql = "UPDATE tbl_users SET fullname='$fullname', address = '$address', photo = 
    '$photo_name' where id=$id";
}
else{
    $sql = "UPDATE tbl_users SET fullname= '$fullname', address='$address' WHERE id=$id";
    }   
    $res = mysqli_query($conn, $sql);
    if($res) $_SESSION['message'] = "User updated successfully.";
    else $_SESSION['error'] = "Failed to update user";
}
header("location:list.php");