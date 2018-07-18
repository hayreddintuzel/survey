<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<?php
//including the database connection file
include("../config.ini.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM `users` WHERE  `id` = $id AND `undelete` = '0'");
 
//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>