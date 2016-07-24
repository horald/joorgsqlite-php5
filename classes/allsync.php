<?php
include("bootstrapfunc.php");
include("allsyncfunc.php");
include("../config.php");
$menu=$_GET['menu'];
//echo $menu."<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
allsync($pararray,$menu,$autoinc_start);
bootstrapend();
?>