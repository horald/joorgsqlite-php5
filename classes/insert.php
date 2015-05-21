<?php
include("bootstrapfunc.php");
include("insertfunc.php");
$menu=$_GET['menu'];
//echo $menu."<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
$insert = $_GET['insert'];
$idwert = $_GET['id'];
if ($insert==1) {
  $show = $_POST['chkanzeigen'];
  //echo $show."=show<br>"; 
  insertsave($pararray,$listarray,$menu,$show);
  if ($show<>"anzeigen") {
    echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=".$menu."'>";  
  }
} else {
  insertinput($listarray,$idwert,$menu);
}  
bootstrapend();
?>
