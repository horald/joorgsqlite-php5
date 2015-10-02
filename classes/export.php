<?php
include("bootstrapfunc.php");
include("exportfunc.php");
include("../data/config.inc.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Export");
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a><br>"; 
$exportpfad = $configarray['export'];
exportfunc($exportpfad,$pararray,$listarray,$menu);
bootstrapend();
?>