<?php
//echo "define:"._JEXEC;
//defined('_JEXEC') or die;
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
$ini_array = parse_ini_file("../version.txt");
$versdat=$ini_array['versdat'];
$versnr=$ini_array['versnr'];
//$sqlite=sqlite_libversion();
$sqlite=1;
//$versdat="21.01.2015";
//$versnr="1.004";
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
//echo "<a href='checkupdate.php?actvers=".$versnr."' class='btn btn-primary btn-sm active' role='button'>Update prüfen</a> ";
$pfad="http://localhost/test/joorgsqlite/classes/checkupdate.php";
// echo $pfad."=pfad<br>";
echo "<a href='http://community.codefor.de/spielplatzapp/update.php?locvers=".$versnr."&pfad=".$pfad."' class='btn btn-primary btn-sm active' role='button'>Update prüfen</a> ";
echo "<pre>";
echo "<table>";
echo "<tr><td>Stand</td>  <td>: ".$versdat."</td></tr>";
echo "<tr><td>Version</td><td>: ".$versnr."</td></tr>";
//echo "<tr><td>Sqlite</td><td>: ".$sqlite."</td></tr>";
echo "<tr><td>Sourcecode unter</td><td>: <a href='https://github.com/horald/joorgsqlite' target='_blank'>github:joorgsqlite</a></td></tr>";
echo "</table>";
echo "</pre>";
bootstrapend();
?>