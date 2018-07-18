
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Quiz indiviual Page</title>
<!-- Bootstrap -->
<link href="../css/bootstrap.css" rel="stylesheet">
<!-- CSS for fonts-->
<link href="../css/fonts.css" rel="stylesheet">

<!-- CSS for containers-->
<link href="../css/container.css" rel="stylesheet">

<!-- CSS for images-->
<link href="../css/images.css" rel="stylesheet">
</head>
<body>

<?php
require_once '../config.ini.php';
//there are important for creating a text compatible with turkish language (for.ex.: ş,ç,ğ etc.)
$sql = "SELECT no, text, lang FROM questions";
$sql_utf1= "SET NAMES 'utf8'";
$sql_utf2= "CHARSET 'utf8';";
$conn->query($sql_utf1);
$conn->query($sql_utf2);
$result = $conn->query($sql);
	
// we create a counter variable for numarate the question's input in the form.
$counter=1;
		
?>
<div id="main" class="container">

	
	
	
	<div class="container">
		<h1 class="myheadings">Dijital Eğitim Motivasyonunuzu Öğrenin!</h1>
		<h2 class="myheadings">Media Eğitim Laboratuvarı</h2>
	<div class="container">
		<div>
			<img class="myimg-12" src="../img/motivationiconsArtboard-1.png"/>
			<img class="myimg-12" src="../img/motivationiconsArtboard-2.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-3.png"  />
			<img class="myimg-12" src="../img/motivationiconsArtboard-4.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-5.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-6.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-7.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-8.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-9.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-10.png" />
			<img class="myimg-12" src="../img/motivationiconsArtboard-11.png" />
 			<img class="myimg-12" src="../img/motivationiconsArtboard-12.png" />
		</div>
	</div>
</div>


	<!-- quiz starts here -->
	<div class="container">
		<h3 class="myheadings">Lütfen aşağıdaki soruları kendinize en uygun şekilde cevaplayınız</h3>
		<p class="myheadings" id="boldparaghraph">Her bir soru 5 seçenek içermektedir.</p>
  		
  		<!-- we will send form information to data.php-->
  		<form action="../form/dataquizindivual.php" method="post">
  			<table class="table table-striped">
    			<thead>
      				<tr>
        				<th>Sorular</th>
						<th>Kesinlikle Katılıyorum</th>
						<th>Katılıyorum</th>
						<th>Kararsızım</th>
						<th>Katılmıyorum</th>
      					<th>Kesinlikle Katılmıyorum</th>
					</tr>
    			</thead>
			<tbody>
			<?php
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					// we use counter variable for creating unique input names for each questions
					$a_temp1='<label class="radio-inline">
					<input type="radio" name="opt_q' . $counter . '" value="5"  >
					</label>';
			$a_temp2='<label class="radio-inline">
					<input type="radio" name="opt_q' . $counter . '" value="4" >
					</label>';
			$a_temp3='<label class="radio-inline">
					<input type="radio" name="opt_q' . $counter . '" value="3" >
					</label>';
			$a_temp4='<label class="radio-inline">
					<input type="radio" name="opt_q' . $counter . '" value="2" checked>
					</label>';
			$a_temp5='<label class="radio-inline">
					<input type="radio" name="opt_q' . $counter . '" value="1" >
					</label>';
			

					echo "<tr>
							<td>" . $row["no"] ."- ". $row["text"] . "</td>
							<td>" . $a_temp1 .  "</td>
							<td>" . $a_temp2 .  "</td>
							<td>" . $a_temp3 .  "</td>
							<td>" . $a_temp4 .  "</td>
							<td>" . $a_temp5 . "</td>
						 </tr>";
					$counter++;
    			}
			} else {
    			echo "0 results";
			}?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="submit"></td>
				</tr>
			</form>
		</div>	
	
	</div>
	
	
	
<?php	
$conn->close();
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/bootstrap.js"></script>
</body>
	</html>