<?php
$locvers=$_GET['actvers'];
$ini_array = parse_ini_file("version.txt");
$versnr=$ini_array['versnr'];
echo $locvers.",".$versnr."=locvers,versnr";
?>