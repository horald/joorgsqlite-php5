<?php
//echo "define:"._JEXEC;
//defined('_JEXEC') or die;
include("bootstrapfunc.php");
include("../config.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
$ini_array = parse_ini_file("../version.txt");
$versdat=$ini_array['versdat'];
$versnr=$ini_array['versnr'];
//$sqlite=sqlite_libversion();
$sqlite=1;
//$versdat="21.01.2015";
//$versnr="1.004";

$ini_locarr = parse_ini_file("http://horald.github.io/joorgsqlite/version.txt");
$neueversdat=$ini_locarr['versdat'];
$neueversnr=$ini_locarr['versnr'];

echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='checkupdate.php' class='btn btn-primary btn-sm active' role='button'>Update prüfen</a> ";
echo "<a href='help.php' class='btn btn-primary btn-sm active' role='button'>Hilfe</a> ";
$pfad=$_SERVER['PHP_SELF'];
$pfad=substr($pfad,0,-9);
$pfad="http://".$_SERVER['SERVER_NAME'].$pfad."checkupdate.php";
//$pfad="http://localhost/test/joorgsqlite/classes/checkupdate.php";
// echo "<br>".$pfad."=pfad<br>";
//echo "<a href='http://community.codefor.de/spielplatzapp/update.php?locvers=".$versnr."&pfad=".$pfad."' class='btn btn-primary btn-sm active' role='button'>Update prüfen</a> ";
$pfad=$_SERVER['PHP_SELF'];
$phppfad=getcwd();
$pfad=substr($pfad,0,-9);
$pfad="http://".$_SERVER['SERVER_NAME'].$pfad."checkconnection.php";
//echo "<a href='http://community.codefor.de/spielplatzapp/update.php?locvers=".$versnr."&pfad=".$pfad."' class='btn btn-primary btn-sm active' role='button'>Verbindung prüfen</a> ";
echo "<pre>";
echo "<table>";
echo "<tr><td>Stand</td>  <td>: ".$versdat."</td></tr>";
echo "<tr><td>Version</td><td>: ".$versnr."</td></tr>";
//echo "<tr><td>neuer Stand</td>  <td>: ".$neueversdat."</td></tr>";
//echo "<tr><td>neue Version</td><td>: ".$neueversnr."</td></tr>";
//echo "<tr><td>Sqlite</td><td>: ".$sqlite."</td></tr>";
echo "<tr><td>Sourcecode unter</td><td>: <a href='https://github.com/horald/joorgsqlite' target='_blank'>github:joorgsqlite</a></td></tr>";
echo "<tr><td>Pfad</td><td>: ".$phppfad."</td></tr>";
echo "<tr><td>.</td> <td></td></tr>";
echo "<tr><td>Autoinc-Start/dbsyncnr</td>  <td>: ".$autoinc_start."</td></tr>";
echo "<tr><td>Autoinc-Step</td>  <td>: ".$autoinc_step."</td></tr>";
echo "</table>";
echo "</pre>";
bootstrapend();
?>