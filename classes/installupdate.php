<?php
include("bootstrapfunc.php");
include("upgradefunc.php");
include("../sites/update/sqlstruc.inc.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
$newvers=$_GET['newvers'];
checktables($tablearray);
bootstrapend();
?>