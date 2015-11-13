<?php
include("bootstrapfunc.php");
include("statusfunc.php");
$menu=$_GET['menu'];
bootstraphead();
bootstrapbegin("Status");
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Liste</a><br><br>";
$status = $_GET['status'];
if ($status==2) {
  $vondatum = $_POST['vondatum'];	
  $bisdatum = $_POST['bisdatum'];	
  $vonstatus = $_POST['vonstatus'];	
  $nchstatus = $_POST['nchstatus'];	
  $vonort = $_POST['vonort'];	
  $nchort = $_POST['nchort'];	
  $auswahltyp = $_POST['auswahltyp'];
  $rechdat=$_POST['rechdat'];
  statusfunc($vondatum,$bisdatum,$vonstatus,$nchstatus,$auswahltyp,$rechdat,$vonort,$nchort);
} else {
  if ($status==1) {
  	 $auswahltyp=$_POST['auswahltyp'];
    statusauswahl($menu,$auswahltyp);
  } else {
    statusvorauswahl($menu);
  }  
}  
bootstrapend();
?>