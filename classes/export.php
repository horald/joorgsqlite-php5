<?php
include("bootstrapfunc.php");
include("exportfunc.php");
include("../data/config.inc.php");
$menu=$_GET['menu'];
//echo $menu."<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Einkaufsliste");
echo "Export<br>";
echo "<a href='showtab.php?menu=shopping' class='btn btn-primary btn-sm active' role='button'>Zurück</a><br>"; 
$exportpfad = $configarray['export'];
//echo $exportpfad."=pfad<br>";
//$exportpfad = "/var/www/html/android/daten/export/";
exportfunc($exportpfad,$pararray,$listarray,$menu);
bootstrapend();
?>