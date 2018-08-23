<?php 
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}
?>
 
<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once '../config.ini.php';

if (isset($_POST['Submit'])) {
    $g_name = $_POST['g_name'];
    $g_pin = $_POST['g_pin'];

    // checking empty fields
    if (empty($g_name) || empty($g_pin)) {
        if (empty($g_name)) {
            echo "<font color='red'>Group Name field is empty.</font><br/>";
        }

        if (empty($g_pin)) {
            echo "<font color='red'>Group pin field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $query_add = "INSERT INTO groups(id, group_name, group_pin) VALUES('', '$g_name','$g_pin')";

        if ($result = mysqli_query($conn, $query_add)) {
            //display success message
            echo "<font color='green'>Data added successfully.";
            echo "<br/><a href='view.php'>View Result</a>";
        } else {
            echo "<font color='red'>Data can not added!.";
        }
    }
}
?>
</body>
</html>