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
    <title>Add User</title>
</head>
 
<body>
<?php
//including the database connection file
include_once '../config.ini.php';

if (isset($_POST['Submit'])) {
    $usernameform = $_POST['usernameform'];
    $passwordform = $_POST['passwordform'];

    // checking empty fields
    if (empty($usernameform) || empty($passwordform)) {
        if (empty($usernameform)) {
            echo "<font color='red'>User Name field is empty.</font><br/>";
        }

        if (empty($passwordform)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)
        //we created hashed password
        $passwordform_hashed = password_hash($passwordform, PASSWORD_DEFAULT);
        //insert data to database
        $query_add = "INSERT INTO users(id, username, password) VALUES('', '$usernameform','$passwordform_hashed')";

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