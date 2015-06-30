<?php
include("bootstrapfunc.php");
include("upgradefunc.php");
include("../sites/update/sqlstruc.inc.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a><br> "; 
$newvers=$_GET['newvers'];
$oldvers=$_GET['oldvers'];
$versdat=$_GET['versdat'];

echo "<div class='alert alert-danger'>";
echo "Noch nicht fertig!";
echo "</div>";

checktables($tablearray);
checkupdatefiles($newvers,$oldvers);
updatedbversion($newvers,$versdat);
bootstrapend();
?>