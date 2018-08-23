<?php

require_once '../config.ini.php';
//for turkish characters
$sql = 'SELECT no, text, lang FROM questions';
$sql_utf1 = "SET NAMES 'utf8'";
$sql_utf2 = "CHARSET 'utf8';";
$conn->query($sql_utf1);
$conn->query($sql_utf2);
$result = $conn->query($sql);

// Check connection
if (!$conn) {
    die('Connection failed: '.mysqli_connect_error());
}

$motivation_name = $_GET['motivation'];

$sql = "SELECT * FROM `quiz`.`motivations_tr` WHERE `motivation_name`= \"$motivation_name\";";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $motivation_name = $row['motivation_name'];
        $explanation = $row['explanation'];
        $protect1 = $row['protect1'];
        $protect2 = $row['protect2'];
        $protect3 = $row['protect3'];
        $author1 = $row['author1'];
        $author2 = $row['author2'];
        $author3 = $row['author3'];
        $strong = $row['strong'];
        $weak = $row['weak'];
    }
} else {
    echo '0 results';
}

switch ($motivation_name) {
    case 'AYDINLATICI':
        $adress1 = '1.png';
        break;
    case 'MUHAFIZ':
        $adress1 = '2.png';
        break;
    case 'EĞİTMEN':
        $adress1 = '4.png';
        break;
    case 'PROFESYONEL':
        $adress1 = '5.png';
        break;
    case 'ÖĞRETMEN 2.0':
        $adress1 = '6.png';
        break;
    case 'TEKNOLOJİ TUTKUNU':
        $adress1 = '7.png';
        break;
    case 'SIRDAŞ':
        $adress1 = '8.png';
        break;
    case 'TEŞVİK EDİCİ':
        $adress1 = '9.png';
        break;
    case 'MODAYI YAKALAYAN':
        $adress1 = '10.png';
        break;
    case 'ÖZGÜN':
        $adress1 = '11.png';
        break;
    case 'AKTİVİST':
        $adress1 = '3.png';
        break;
    default:
        $adress1 = '12.png';
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motivation page</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/container.css">
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1 class="text-center text-info"><strong><?php echo $motivation_name; ?></strong></h1></div>
        <div>
           <div>
           	 <h2 class="text-left text-danger">Tanım </h2>
           </div>
            <hr>
            <div class="col-md-8 col-md-offset-0 text-justify">
                <p><?php echo $explanation; ?> </p>
            </div>
            <div class="col-md-4">
                <div><img class="img-thumbnail img-responsive" width="80%" src="../img/motivationiconsArtboard-<?php echo $adress1 ?>"></div>
            </div>
        </div>
        <hr>
        <div>
        <div class="row" style="float: left;">
            <h2 class="text-left text-danger"> Koruyucu </h2>
            <hr>
            <div class="col-md-12 col-md-offset-0 text-justify">
                <ul>
                    <li><?php echo $protect1; ?> </li>
                    <li><?php echo $protect2; ?> </li>
                    <li><?php echo $protect3; ?> </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="row" style="float: left;">
            <h2 class="text-left text-danger"> Güçlendirici </h2>
            <hr>
            <div class="col-md-12 col-md-offset-0 text-justify">
                <ul>
                    <li><?php echo $author1; ?> </li>
                    <li><?php echo $author2; ?> </li>
                    <li><?php echo $author3; ?> </li>
                </ul>
            </div>
        </div>
        <div class="row" style="float: left;">
            <h2 class="text-left text-danger"> Güçlü Yönleriniz</h2>
            <hr>
            <div class="col-md-12 col-md-offset-0 text-justify">
                <p><?php echo $strong; ?></p>
            </div>
        </div>
        <div class="row" style="float: left;">
            <h2 class="text-left text-danger"> Zayıf Yönleriniz</h2>
            <hr>
            <div class="col-md-12 col-md-offset-0 text-justify">
                <p><?php echo $weak; ?></p>
            </div>
        </div>
    </div>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script id="bs-live-reload" data-sseport="18731" data-lastchange="1499680305557" src="/js/livereload.js"></script>
</body>

</html>