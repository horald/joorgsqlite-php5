<?php
//error_reporting(-1);
//ini_set('display_errors', true);
include("bootstrapfunc.php");
include("empfangenfunc.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
$empfangen = $_GET['empfangen'];
if ($empfangen==1) {
  datenholen($menu);
} else {
  datenauswahl($menu);
}
bootstrapend();
?> 