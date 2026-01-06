<?php
// include the database connection file
session_start();

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login to access the user list.";
    header("Location: login.php");
}
include 'connection.php';
$sql = "SELECT id, fullname, username, email, address, photo FROM tbl_users"; 
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
     <link rel="stylesheet" href="./main.css">
</head>
<body>
    <header class="header">
        <a href="#" class="site-logo" title="User Management">Logo</a>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="list.php">User List</a></li>
                <li><a href="logout.php">Logout</a></li>    
            </ul>
        </nav>
    </header>
    <main class="container large">
        <h1 class="page-title">List Users</H1>
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
        <table border="1" cellpadding="5" cellspacing="0">
            <!-- table header -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email</th> 
                    <th>address</th> 
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- table body -->
            <tbody>
                
               <!-- <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe</td>
                    <td>john.doe@example.com</td>
                    <td>   <a href="edit.php?id=1" title="Edit" class="btn"><img width="15" height="auto" src="edit.png" alt="Edit"></a>

                        <a href="delete.php?id=1" title="Delete" class="btn btn-danger"><img width="15" height="auto" src="delete.png" alt="delete"></a></td>
                    </tr>
                <tr>
                    <td>2</td> 
                    <td>Jane Smith</td>
                    <td>janesmith</td>
                    <td>jane.@gmail.com</td>
                    <td><a href="edit.php?id=2" title="Edit" class="btn"><img width="15" height="auto" src="edit.png" alt="Edit"></a>

                        <a href="delete.php?id=2" title="Delete" class="btn btn-danger"><img width="15" height="auto" src="delete.png" alt="delete"></a></td>
                </tr>
                <tr>
                    <td>3</td> 
                    <td>Jane Smith</td>
                    <td>janesmith</td>
                    <td>jane...@gmail.com</td>
                    <td><a href="edit.php?id=2" title="Edit" class="btn"><img width="15" height="auto" src="edit.png" alt="Edit"></a>

                        <a href="delete.php?id=2" title="Delete" class="btn btn-danger"><img width="15" height="auto" src="delete.png" alt="delete"></a></td>
                </tr>
            
            </tbody>
            <tbody>-->
                <?php while ($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td> 
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><img src="./uploads/<?php echo $row['photo']; ?>"width="80" alt="photo"></td>

                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit" class="btn"><img width="15" height="auto" src="./images/edit.png" alt="Edit"></a>

                        <a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete" class="btn btn-danger"><img width="15" height="auto" src="./images/delete.png" alt="delete"></a>
                        </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
</table>

 <div class="btn_group">
    <a href ="index.php" class="Text link">&larr; Back to Home</a><br>
    <a href ="register.php" class="Text link">Add User</a>
</div>

    </main>
</body>
</html>

<!-- URL: https://www.google.com:80/contact?id=10&status=1
http:protocol
s: secure (SSL: Secure Sockets Layer)
www.google.com: domain name (host)
www:sub-domain
:80 : port number
contact: slug
?_: Query String Parameters
id = 10
status = 1 
-->