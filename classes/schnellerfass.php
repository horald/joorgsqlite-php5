<?php
include("bootstrapfunc.php");
include("schnellerfassfunc.php");
include("../config.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
//echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a><br>"; 
$schnellerfass = $_GET['schnellerfass'];
if ($schnellerfass==1) {
  $submit=$_POST['submit'];
  $key=$_POST['key'];
  $keyvalue=$_POST[$key];
  $show = $_POST['chkanzeigen'];
  schnellerfass_verarbeiten($pararray,$listarray,$submit,$key,$keyvalue,$show,$autoinc_start,$autoinc_step);
  schnellerfass_abfrage($listarray,$menu);  
} else {
  schnellerfass_abfrage($listarray,$menu);  
}
bootstrapend();
?>