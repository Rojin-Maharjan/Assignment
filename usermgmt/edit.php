<?php session_start();
include "./connection.php";
if(!isset($_GET['id'])||empty($_GET['id'])){
    $_SESSION['error'] = "Invalid User ID.";
    header("Location: List.php");
}
$id=$_GET['id'];
$sql = "SELECT fullname, username, email, address, photo FROM tbl_users where id = $id";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <main class="container">
        <h1 class="page-title">Edit</h1>
<?php if($res):
    while($row = mysqli_fetch_assoc($res)): ?>
        <form action="update.php" method="post" name="user_form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="field-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname'];?>"required>
            </div>

            <div class="field-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username'];?>" disabled>
            </div>

            <div class="field-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email'];?>" disabled>
            </div>
            <div class="field-group">
                <label for="addr">Address</label>
                <input type="text" id="addr" name="address" value="<?php echo $row['address'];?>">
            </div>
            <div class="field-group">
                <label for="photo">Photos</label>
                <input type="file" id="photo" name="photo" value="<?php echo $row['photo'];?>">
            </div>

            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    <?php  endwhile;
    else:?>
        <div class="alert error">Unable to fetch user data.</div>
    <?php endif;?>
        <div class="btn-group">
           <hr>
            <a href="list.php" class="text-link" title="View All Users">&larr; View All Users</a>
        </div>
    </main>
</body>
</html>
