<?php
include("bootstrapfunc.php");
include("updatefunc.php");
include("../config.php");
$menu=$_GET['menu'];
$menugrp=$_GET['menugrp'];
//echo $menu."=menu<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
$update = $_GET['update'];
$idwert = $_GET['id'];
if ($update==1) {
  $chkpreis = $_POST['chkpreis'];
  //echo $chkpreis."=chkpreis<br>";
  $show = $_POST['chkanzeigen'];
  updatesave($pararray,$listarray,$menu,$show,$chkpreis,$menugrp,$autoinc_start);
  if ($show<>"anzeigen") {
    echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=".$menu."&menugrp=".$menugrp."'>";  
  } 
} else {
  updateinput($pararray,$listarray,$idwert,$menu,$menugrp);
}  
bootstrapend();
?>