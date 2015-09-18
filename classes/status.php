<?php
include("bootstrapfunc.php");
include("statusfunc.php");
$menu=$_GET['menu'];
bootstraphead();
bootstrapbegin("Status");
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Liste</a><br><br>";
$status = $_GET['status'];
if ($status==1) {
  $vondatum = $_POST['vondatum'];	
  $bisdatum = $_POST['bisdatum'];	
  $vonstatus = $_POST['vonstatus'];	
  $nchstatus = $_POST['nchstatus'];	
  statusfunc($vondatum,$bisdatum,$vonstatus,$nchstatus);
} else {
  statusauswahl($menu);
}  
bootstrapend();
?>