<?php session_start();
include 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_users WHERE id=$id";
$res = mysqli_query($conn, $sql);
if ($res) $_SESSION['message'] = "User Deleted Successfully.";
else  $SESSION['error'] = "Failed to Delete User.";

header("Location: list.php");
exit();
?>