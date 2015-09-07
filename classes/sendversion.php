<?php
$arr = parse_ini_file("../version.txt",TRUE);
//$arr = array('versnr' => '1.012',
//             'versdat' => '29.06.2015');
//$arr = array('dbtable' => $_GET['dbtable'],'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);
?>