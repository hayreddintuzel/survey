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
// including the database connection file
include_once("../config.ini.php");
 
if(isset($_GET['update']))
{    
    $id = $_GET['id'];
    $g_name = $_GET['g_name'];
    $g_pin= $_GET['g_pin'];
    
	echo $id;
    // checking empty fields
    if(empty($g_name) || empty($g_pin) ) {                
        if(empty($g_name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($g_pin)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }     
    } else {    
	
        //updating the table
		$queryupdate = "UPDATE `groups` SET `group_name` = '$g_name', `group_pin` = '$g_pin' WHERE `groups`.`id` = $id";
		
        if(mysqli_query($conn, $queryupdate))
		{
			echo "data is UPDATED";
			//redirectig to the display page. In our case, it is view.php
			header("Location: view.php");
		}else{
			echo "data can not UPDATED";
		}
        
        
    }
}
?>
<?php
 //getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM groups WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $g_name = $res['group_name'];
    $g_pin = $res['group_pin'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
 
<body>
<div class="container-fluid">
	
 	<a href="admin.php" class="btn btn-info">Admin Panel</a> | <a href="view.php" class="btn btn-info">View Groups and Results</a> | <a href="logout.php" class="btn btn-danger">Logout</a>
    <br/>
    <br/>
    <div class="container">
    	<form name="form1" method="GET" action="edit.php">
        	<table class="table table-bordered">
       	    <p class="text-danger">Please use english and lowercase letters</p>
        	    <tr> 
        	        <td>Group Name</td>
        	        <td><input type="text" name="g_name" value="<?php echo $g_name;?>"></td>
        	    </tr>
        	    <tr> 
        	        <td>Group Pin</td>
        	        <td><input type="text" name="g_pin" value="<?php echo $g_pin;?>"></td>
        	    </tr>
        	    <tr>
        	        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td> 
        	        <td><input type="submit" class="btn btn-warning" name="update" value="update"></td>
        	    </tr>
        	</table>
    	</form>
    </div>
</div>
</body>
</html>