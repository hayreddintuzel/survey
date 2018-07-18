<?php

require_once '../config.ini.php';
//for turkish characters
$sql = "SELECT no, text, lang FROM questions";
$sql_utf1= "SET NAMES 'utf8'";
$sql_utf2= "CHARSET 'utf8';";
$conn->query($sql_utf1);
$conn->query($sql_utf2);
$result = $conn->query($sql);

//motivasyon türlerini  puanlayacak değişkenler oluşturuldu.
$motivation_point = array("demystifier"=>"0",
						  "watchdog"=>"0",
						  "activist"=>"0",
						  "professor"=>"0",
						  "professional"=>"0",
						  "teacher"=>"0",
						  "techie"=>"0",
						  "spirit"=>"0",
						  "motivator"=>"0",
						  "trendsetter"=>"0",
						  "alt"=>"0",
						  "tastemaker"=>"0");
				  

// total point calculating for demystifier
$motivation_point['demystifier']=($_POST["opt_q1"] + $_POST["opt_q2"] + $_POST["opt_q25"] + $_POST["opt_q26"])/2;

// total point calculating for watchdog
$motivation_point['watchdog']=($_POST["opt_q3"] + $_POST["opt_q4"] + $_POST["opt_q27"] + $_POST["opt_q28"])/2;

// total point calculating for activist
$motivation_point['activist']=($_POST["opt_q5"] + $_POST["opt_q6"] + $_POST["opt_q29"] + $_POST["opt_q30"])/2;

// total point calculating for professor
$motivation_point['professor']=($_POST["opt_q7"] + $_POST["opt_q8"] + $_POST["opt_q31"] + $_POST["opt_q32"])/2;

// total point calculating for professional
$motivation_point['professional']=($_POST["opt_q9"] + $_POST["opt_q10"] + $_POST["opt_q33"] + $_POST["opt_q34"])/2;

// total point calculating for teacher
$motivation_point['teacher']=($_POST["opt_q11"] + $_POST["opt_q12"] + $_POST["opt_q35"] + $_POST["opt_q36"])/2;

// total point calculating for techie
$motivation_point['techie']=($_POST["opt_q13"] + $_POST["opt_q14"] + $_POST["opt_q37"] + $_POST["opt_q38"])/2;

// total point calculating for spirit
$motivation_point['spirit']=($_POST["opt_q15"] + $_POST["opt_q16"] + $_POST["opt_q39"] + $_POST["opt_q40"])/2;

// total point calculating for motivator
$motivation_point['motivator']=($_POST["opt_q17"] + $_POST["opt_q18"] + $_POST["opt_q41"] + $_POST["opt_q42"])/2;

// total point calculating for trendsetter
$motivation_point['trendsetter']=($_POST["opt_q19"] + $_POST["opt_q20"] + $_POST["opt_q43"] + $_POST["opt_q44"])/2;

// total point calculating for alt
$motivation_point['alt']=($_POST["opt_q21"] + $_POST["opt_q22"] + $_POST["opt_q45"] + $_POST["opt_q46"])/2;

// total point calculating for tastemaker
$motivation_point['tastemaker']=($_POST["opt_q23"] + $_POST["opt_q24"] + $_POST["opt_q47"] + $_POST["opt_q48"])/2;


//we are calculating protect and empowering points

$protect_point=round((($_POST["opt_q1"]+$_POST["opt_q2"]+$_POST["opt_q3"]+$_POST["opt_q4"]+$_POST["opt_q5"]+$_POST["opt_q6"]+$_POST["opt_q7"]+$_POST["opt_q8"]+$_POST["opt_q9"]+$_POST["opt_q10"]+$_POST["opt_q11"]+$_POST["opt_q12"]+$_POST["opt_q13"]+$_POST["opt_q14"]+$_POST["opt_q15"]+$_POST["opt_q16"]+$_POST["opt_q17"]+$_POST["opt_q18"]+$_POST["opt_q19"]+$_POST["opt_q20"]+$_POST["opt_q21"]+$_POST["opt_q22"]+$_POST["opt_q23"]+$_POST["opt_q24"])/120)*100,1);

$empower_point=round((($_POST["opt_q25"]+$_POST["opt_q26"]+$_POST["opt_q27"]+$_POST["opt_q28"]+$_POST["opt_q29"]+$_POST["opt_q30"]+$_POST["opt_q31"]+$_POST["opt_q32"]+$_POST["opt_q33"]+$_POST["opt_q34"]+$_POST["opt_q35"]+$_POST["opt_q36"]+$_POST["opt_q37"]+$_POST["opt_q38"]+$_POST["opt_q39"]+$_POST["opt_q40"]+$_POST["opt_q41"]+$_POST["opt_q42"]+$_POST["opt_q43"]+$_POST["opt_q44"]+$_POST["opt_q45"]+$_POST["opt_q46"]+$_POST["opt_q47"]+$_POST["opt_q48"])/120)*100,1);

//finding max motivatiopn_point
$max= max($motivation_point);

//finding top motivation name
$top_motivation= array_search(max($motivation_point),$motivation_point);

//we are temporary storage our top motivations for putting back
$temp1=$motivation_point[$top_motivation];

//top motivating point equals to zero for finding second max motivation point and motivation name
$motivation_point[$top_motivation]=0;

$sec_max= max($motivation_point);

$sec_motivation= array_search(max($motivation_point),$motivation_point);

//we are temporary storage our top motivations for putting back
$temp2=$motivation_point[$sec_motivation];

$motivation_point[$sec_motivation]=0;

$third_max = max($motivation_point);

$third_motivation= array_search(max($motivation_point),$motivation_point);

//we put back our temp variables

$motivation_point[$top_motivation]=$temp1;
$motivation_point[$sec_motivation]=$temp2;



switch ($top_motivation)
{
	case 'demystifier':
		$adress1="Demystifier.png";
		break;
	case 'watchdog':
		$adress1="Watchdog.png";
		break;
	case 'professor':
		$adress1="Professor.png";
		break;
	case 'professional':
		$adress1="Professional.png";
		break;
	case 'teacher':
		$adress1="Teacher.png";
		break;
	case 'techie':
		$adress1="Techie.png";
		break;
	case 'spirit':
		$adress1="Spirit.png";
		break;
	case 'motivator':
		$adress1="Motivator.png";
		break;
	case 'trendsetter':
		$adress1="Trendsetter.png";
		break;
	case 'alt':
		$adress1="Alt.png";
		break;
	case 'teacher':
		$adress1="Teacher.png";
		break;
	default :
		$adress1='TasteMaker.png';
}

switch ($sec_motivation)
{
	case 'demystifier':
		$adress2="Demystifier";
		break;
	case 'watchdog':
		$adress2="Watchdog";
		break;
	case 'professor':
		$adress2="Professor";
		break;
	case 'professional':
		$adress2="Professional";
		break;
	case 'activist':
		$adress2="Activist";
		break;
	case 'techie':
		$adress2="Techie";
		break;
	case 'spirit':
		$adress2="Spirit";
		break;
	case 'motivator':
		$adress2="Motivator";
		break;
	case 'trendsetter':
		$adress2="Trendsetter";
		break;
	case 'alt':
		$adress2="Alt";
		break;
	case 'teacher':
		$adress2="Teacher";
		break;
	default :
		$adress2='TasteMaker';
}


switch ($third_motivation)
{
	case 'demystifier':
		$adress3="Demystifier";
		break;
	case 'watchdog':
		$adress3="Watchdog";
		break;
	case 'professor':
		$adress3="Professor";
		break;
	case 'professional':
		$adress3="Professional";
		break;
	case 'activist':
		$adress3="Activist";
		break;
	case 'techie':
		$adress3="Techie";
		break;
	case 'spirit':
		$adress3="Spirit";
		break;
	case 'motivator':
		$adress3="Motivator";
		break;
	case 'trendsetter':
		$adress3="Trendsetter";
		break;
	case 'alt':
		$adress3="Alt";
		break;
	case 'teacher':
		$adress3="Teacher";
		break;
	default :
		$adress3='TasteMaker';
}

switch ($top_motivation)
{
	case 'demystifier':
		$id1=1;
		break;
	case 'watchdog':
		$id1=2;
		break;
	case 'activist':
		$id1=3;
		break;
	case 'professor':
		$id1=4;
		break;
	case 'professional':
		$id1=5;
		break;
	case 'teacher':
		$id1=6;
		break;
	case 'techie':
		$id1=7;
		break;
	case 'spirit':
		$id1=8;
		break;
	case 'motivator':
		$id1=9;
		break;
	case 'trendsetter':
		$id1=10;
		break;
	case 'alt':
		$id1=11;
		break;
	default :
		$id1=12;
}

switch ($sec_motivation)
{
	case 'demystifier':
		$id2=1;
		break;
	case 'activist':
		$id2=3;
		break;
	case 'watchdog':
		$id2=2;
		break;
	case 'professor':
		$id2=4;
		break;
	case 'professional':
		$id2=5;
		break;
	case 'teacher':
		$id2=6;
		break;
	case 'techie':
		$id2=7;
		break;
	case 'spirit':
		$id2=8;
		break;
	case 'motivator':
		$id2=9;
		break;
	case 'trendsetter':
		$id2=10;
		break;
	case 'alt':
		$id2=11;
		break;
	default :
		$id2=12;
}

switch ($third_motivation)
{
	case 'demystifier':
		$id3=1;
		break;
	case 'watchdog':
		$id3=2;
		break;
	case 'activist':
		$id3=3;
		break;	
	case 'professor':
		$id3=4;
		break;
	case 'professional':
		$id3=5;
		break;
	case 'teacher':
		$id3=6;
		break;
	case 'techie':
		$id3=7;
		break;
	case 'spirit':
		$id3=8;
		break;
	case 'motivator':
		$id3=9;
		break;
	case 'trendsetter':
		$id3=10;
		break;
	case 'alt':
		$id3=11;
		break;
	default :
		$id3=12;
}

//we are querying and fetching related data
$query1_name="SELECT `motivation_name` FROM `motivations_tr` WHERE `id`=" . "$id1";
$query2_name="SELECT `motivation_name` FROM `motivations_tr` WHERE `id`=" . "$id2";
$query3_name="SELECT `motivation_name` FROM `motivations_tr` WHERE `id`=" . "$id3";
$query1_explanation="SELECT `summary` FROM `motivations_tr` WHERE `id`=" . "$id1";
$query2_explanation="SELECT `summary` FROM `motivations_tr` WHERE `id`=" . "$id2";
$query3_explanation="SELECT `summary` FROM `motivations_tr` WHERE `id`=" . "$id3";
//they are name of motivations
$name1_result=mysqli_query($conn,$query1_name);
$name2_result=mysqli_query($conn,$query2_name);
$name3_result=mysqli_query($conn,$query3_name);
//they are explanation of motivations
$explanation1_result=mysqli_query($conn,$query1_explanation);
$explanation2_result=mysqli_query($conn,$query2_explanation);
$explanation3_result=mysqli_query($conn,$query3_explanation);

//OUR QUERY RESULTS ARE assoc  ARRAY AND WE SHOULD convert them to string these foreach loops are for that process
foreach ($name1_result as $name1_result_)
	foreach ($name1_result_ as $key1=> $val1)
		$string_name1 = $val1;
		
foreach ($name2_result as $name2_result_)
	foreach ($name2_result_ as $key2=> $val2)
		 $string_name2 = $val2;

foreach ($name3_result as $name3_result_)
	foreach ($name3_result_ as $key3=> $val3)
		 $string_name3 = $val3;

foreach ($explanation1_result as $explanation1_result_)
	foreach ($explanation1_result_ as $key4=> $val4)
		 $string_explanation1 = $val4;

foreach ($explanation2_result as $explanation2_result_)
	foreach ($explanation2_result_ as $key5=> $val5)
		 $string_explanation2 = $val5;

foreach ($explanation3_result as $explanation3_result_)
	foreach ($explanation3_result_ as $key6=> $val6)
		 $string_explanation3 = $val6;


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Indivual Result Page</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/container.css">
    <link rel="stylesheet" href="../css/images.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center bg-warning">Temel Motivasyonunuz:</h1></div>
    <div class="row">
        <div class="col-md-12">
            <div><img class="img-thumbnail img-responsive" src="../img/result_img/BANNER_<?php echo "$adress1" ?>" alt="Temel Motivasyonunuz">
                <p><b><h3><?php echo "$string_name1" ?></h3></b></p>
                <div class="container text-justify">
                <p><?php echo "$string_explanation1" ?><a href="<?php echo "motivation.php?motivation=$string_name1"; ?>" ><br/>Daha Fazla</a></p></div>
           		</div>
       		 </div>
    
    </div>
    <div class="container">
        <h1 class="text-center bg-warning">Diğer Motivasyonlarınız:</h1></div>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div><img class="img-thumbnail img-responsive" src="../img/result_img/BANNER_<?php echo $adress2 ?>-Medium.png" alt="ikinci Motivasyonunuz">
                <p><b><h3><?php echo "$string_name2" ?> </h3></b></p>
                <div class="text-justify">
                <p><?php echo "$string_explanation2" ?><a href="<?php echo "motivation.php?motivation=$string_name2"; ?> "><br/>Daha Fazla</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div><img class="img-thumbnail img-responsive" src="../img/result_img/BANNER_<?php echo $adress3 ?>-Medium.png" alt="Üçüncü Motivasyonunuz">
                <p><b><h3><?php echo "$string_name3" ?></h3></b></p>
                <div class="text-justify">
                <p><?php echo "$string_explanation3" ?><a href="<?php echo "motivation.php?motivation=$string_name3"; ?> "><br/>Daha Fazla</a></p>
				</div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div><hr></div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div>
               <table class="table table-condensed">
               <thead>
              		<tr>
              			<th style="float:right;"><p class="text-danger"><b><?php
							echo "$protect_point"?></b></p></th>
              			<th style="float:right;"><p><b>Korumacı</b></p></th>
              			
              		</tr>
               </thead>
               <tbody>
               		<tr>
              			<th colspan="2"><p><b>Eğitim deneyiminizde yaralandığınız teknoloji ve medya kullanımına ilişkin gördüğünüz risk ve meydan okumalar</b></p></th>
              		</tr>
               </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5">
            <div>
                <table class="table table-condensed">
               <thead>
              		<tr>
              			<th style="float:left;"><p class="text-danger"><b><?php
							echo "$empower_point"?></b></p></th>
              			<th style="float:left;"><p><b>Güçlendirici</b></p></th>
              		</tr>
               </thead>
               <tbody>
               		<tr>
              			<th colspan="2"><p><b>Eğitim deneyiminizde yaralandığınız teknoloji ve medya kullanımına ilişkin gördüğünüz fırsat ve avantajlar</b></p></th>
              		</tr>
               </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="container">
        <h1 class="text-center bg-warning">İşte Bütün Kategorilerdeki Sonuçlarınız:</h1></div>
    <div class="container">
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=AYDINLATICI"><img src="../img/motivationiconsArtboard-1.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['demystifier'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=MUHAFIZ"><img src="../img/motivationiconsArtboard-2.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['watchdog'];?></strong></div>
            </div>
           
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=AKTİVİST"><img src="../img/motivationiconsArtboard-3.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['activist'];?></strong></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=EĞİTMEN"><img src="../img/motivationiconsArtboard-4.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['professor'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=PROFESYONEL"><img src="../img/motivationiconsArtboard-5.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['professional'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=ÖĞRETMEN 2.0"><img src="../img/motivationiconsArtboard-6.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><<strong style="font-size:3em;"><?php echo $motivation_point['teacher'];?></strong></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=TEKNOLOJİ TUTKUNU"><img src="../img/motivationiconsArtboard-7.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['techie'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=SIRDAŞ"><img src="../img/motivationiconsArtboard-8.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['spirit'];?></strong></div>
            </div>
        </div>
        <div> 
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=TEŞVİK EDİCİ"><img src="../img/motivationiconsArtboard-9.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['motivator'];?></strong></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=MODAYI YAKALAYAN"><img src="../img/motivationiconsArtboard-10.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['trendsetter'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=ÖZGÜN"><img src="../img/motivationiconsArtboard-11.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['alt'];?></strong></div>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <div><a href="motivation.php?motivation=BİRLEŞTİRİCİ"><img src="../img/motivationiconsArtboard-12.png"></a></div>
            </div>
            <div class="col-md-1">
                <div><strong style="font-size:3em;"><?php echo $motivation_point['tastemaker'];?></strong></div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>