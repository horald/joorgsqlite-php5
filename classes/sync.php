<?php
include("bootstrapfunc.php");
include("syncfunc.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
$status=$_POST['status'];
$sql=$_POST['sql'];
bootstraphead();
bootstrapbegin("Datenaustausch");
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
$dbtable=$pararray['dbtable'];
$fldindex=$pararray['fldindex'];
$pfad="localhost/android/own/joorgsqlite/classes/";
switch ( $status ) {
  case 'remote':
    //echo $menu."=remote erkannt.<br>";
    $urladr=$_POST['urladr'];
    $nuranzeigen=$_POST['nuranzeigen'];
    //echo $nuranzeigen."=nuranzeigen<br>";
    syncremote($menu,$pararray['dbtable'],$urladr,$pfad,$fldindex,$nuranzeigen);
  break;
  case 'empfangen':
    $urladr=$_POST['urladr'];
    $datcnt=$_POST['datcnt'];
    $nuranzeigen=$_POST['nuranzeigen'];
    syncempfangen($menu,$urladr,$pfad,$sql,$datcnt,$dbtable,$fldindex,$nuranzeigen);
  break;
  case 'fertig':
    syncfertig();
  break;
  default:
    syncauswahl($menu);
}
bootstrapend();
?>