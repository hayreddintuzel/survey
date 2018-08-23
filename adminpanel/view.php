<?php

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}?>
 

<?php
//including the database connection file
include_once '../config.ini.php';
$queryall = 'SELECT * FROM groups ORDER BY id DESC';
//fetching data in descending order (lastest entry first)
$queryall_for_results = 'SELECT * FROM results ORDER BY id DESC';
$query_for_users = 'SELECT * FROM users ORDER BY id DESC';

if ($result = mysqli_query($conn, $queryall)) {
} else {
    echo 'Group DB connection error!<br/>';
}

if ($result_result = mysqli_query($conn, $queryall_for_results)) {
} else {
    echo 'Results DB connection error!<br/>';
}

if ($result_result_result = mysqli_query($conn, $query_for_users)) {
} else {
    echo 'Results DB connection error!<br/>';
}

?>
 
<html>
<head>
    <title>Viewpage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
 
<body>
<br/>
<div class="container">
<a href="admin.php "class="btn btn-info">Admin Panel</a>    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
 <h2>Groups</h2>
<div class="container">

<table class="table table-bordered table-responsive">
	<thead>
  		<tr>
  		    <td>id</td>
   		    <td>Group Name</td>
  		    <td>Group Pin</td>
  		    <td>Delete</td>
    	</tr>	
    </thead>
    <?php
    while ($res = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>'.$res['id'].'</td>';
        echo '<td>'.$res['group_name'].'</td>';
        echo '<td>'.$res['group_pin'].'</td>';
        echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-warning\" >Edit</a>  <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger\">Delete</a></td>";
    }
    ?>
</table>
<a href="add.html" class="btn btn-info">Add New Group</a>
</div>   
<br/>
<hr>
<hr>
<div class="container-fluid">
<h2>Results</h2>
<br/>
	<input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Group names..">
	<table id="myTable" class="table table-striped table-responsive">
   		<thead>
    	   <tr>
    	  	  <td>id</td>
    		    <td>Group Name</td>
    		    <td>User Name</td>
    		    <td>Motivation 1</td>
    		    <td>Motivation 2</td>
    		    <td>Motivation 3</td>
    		    <td>Demystifier point</td>
    		    <td>Watchdog Point</td>
    		    <td>Activist Point</td>
    		    <td>Proffessor Point</td>
    		    <td>Professional Point</td>
    		    <td>Teacher Point</td>
    		    <td>Techie Point</td>
    		    <td>Spirit Point</td>
    		    <td>Motivator Point</td>
    		    <td>Trendsetter Point</td>
    		    <td>Alt Point</td>
    		    <td>Tastemaker Point</td>
    		    <td>Update</td>
    		</tr>
    	</thead>
    <?php
    while ($res = mysqli_fetch_array($result_result)) {
        echo '<tr>';
        echo '<td>'.$res['id'].'</td>';
        echo '<td>'.$res['group_name'].'</td>';
        echo '<td>'.$res['user_name'].'</td>';
        echo '<td>'.$res['motivation_one'].'</td>';
        echo '<td>'.$res['motivation_two'].'</td>';
        echo '<td>'.$res['motivation_three'].'</td>';
        echo '<td>'.$res['demystifier_point'].'</td>';
        echo '<td>'.$res['watchdog_point'].'</td>';
        echo '<td>'.$res['activist_point'].'</td>';
        echo '<td>'.$res['professor_point'].'</td>';
        echo '<td>'.$res['professional_point'].'</td>';
        echo '<td>'.$res['teacher_point'].'</td>';
        echo '<td>'.$res['techie_point'].'</td>';
        echo '<td>'.$res['spirit_point'].'</td>';
        echo '<td>'.$res['motivator_point'].'</td>';
        echo '<td>'.$res['trendsetter_point'].'</td>';
        echo '<td>'.$res['alt_point'].'</td>';
        echo '<td>'.$res['tastemaker_point'].'</td>';
        echo "<td><a href=\"deleteresult.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger\">Delete</a></td>";
    }
    ?>
</table>

<a href="UserReport_Export.php" class="btn btn-success"> Export To Excel </a>
</div>
<hr>
<hr>
<h2>Users</h2>
<div class="container">

<table class="table table-bordered table-responsive">
	<thead>
  		<tr>
  		    <td>id</td>
   		    <td>User Name</td>
  		    <td>User Pin</td>
  		    <td>Delete</td>
    	</tr>	
    </thead>
    <?php
    while ($res = mysqli_fetch_array($result_result_result)) {
        echo '<tr>';
        echo '<td>'.$res['id'].'</td>';
        echo '<td>'.$res['username'].'</td>';
        echo '<td>'.$res['password'].'</td>';
        echo "<td><a href=\"deleteuser.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger\">Delete</a></td>";
    }
    ?>
</table>
<a href="adduser.html" class="btn btn-info">Add New User</a>
</div>   
</body>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

</html>