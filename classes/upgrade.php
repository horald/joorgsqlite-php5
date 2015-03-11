<?php
include("bootstrapfunc.php");
include("upgradefunc.php");
include("../sites/update/sqlstruc.inc.php");
bootstraphead();
bootstrapbegin("Update");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Startseite</a>"; 
checktables($tablearray);
$ini_array = parse_ini_file("../version.txt");
$versnr=$ini_array['versnr'];
$versdat=$ini_array['versdat'];
$db = new SQLite3('../data/joorgsqlite.db');
$sql="INSERT INTO tblversion (fldbez,fldversion,flddatum) VALUES ('Version ".$versnr."','".$versnr."','".$versdat."')";
//$db->exec($sql);
$db->close();
echo "<div class='alert alert-warning'>";
echo "Vers.-Nr ".$versnr." vom ".$versdat." gesetzt.";
echo "</div>";
bootstrapend();
?>