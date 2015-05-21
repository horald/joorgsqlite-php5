<?php
include("bootstrapfunc.php");
include("updatefunc.php");
$menu=$_GET['menu'];
//echo $menu."=menu<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
$update = $_GET['update'];
$idwert = $_GET['id'];
if ($update==1) {
  $show = $_POST['chkanzeigen'];
  updatesave($pararray,$listarray,$menu,$show);
  if ($show<>"anzeigen") {
    echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=".$menu."'>";  
  } 
} else {
  updateinput($pararray,$listarray,$idwert,$menu);
}  
bootstrapend();
?>