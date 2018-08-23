<?php
//connection
require_once '../config.ini.php';

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}
$query_selectall = 'SELECT * FROM groups';
$result = mysqli_query($conn, $query_selectall);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h3>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to admin panel.</h3>
    </div>
    
    <div class="container">
    	<p><a href="view.php" class="btn btn-info"> View and Add Groups </a></p>
    	<br/>
    </div>
  
    
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>