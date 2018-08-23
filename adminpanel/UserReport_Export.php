<?php 

include '../config.ini.php';

mysqli_select_db($conn, 'quiz');

$setSql = 'SELECT * FROM results';
$setRec = mysqli_query($conn, $setSql);

$columnHeader = '';
$columnHeader = 'id'."\t".'Group Name'."\t".'User Name'."\t".'Motivation 1'."\t".'Motivation 2'."\t".'Demystifier Point'."\t".'Watchdog Point'."\t".'Activist Point'."\t".'Professor Point'."\t".'Professional Point'."\t".'Teacher Point'."\t".'Techie Point'."\t".'Spirit Point'."\t".'Motivator Point'."\t".'Trendsetter Point'."\t".'Alt Point'."\t".'Taste Maker Point';

$setData = '';

while ($rec = mysqli_fetch_row($setRec)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"'.$value.'"'."\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData)."\n";
}

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=User_Detail_Reoprt.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo ucwords($columnHeader)."\n".$setData."\n";

?> 