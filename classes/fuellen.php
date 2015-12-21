<?php
  include("bootstrapfunc.php");
  include("fuellenfunc.php");
  $menu=$_GET['menu'];
  include("../sites/views/".$menu."/showtab.inc.php");
  bootstraphead();
  bootstrapbegin($pararray['headline']);
  $fuellen = $_GET['fuellen'];
  if ($fuellen==1) {
    $dbfield=$_POST['dbfield'];
  	 fuellget($menu,$filterarray,$dbfield);
  } else {	
    if ($fuellen==2) {
    	$dbwert=$_POST['dbwert'];
    	$dbfield=$_POST['dbfield'];
    	$dbtable=$pararray['dbtable'];
    	//echo $dbfield.",".$dbwert.",".$dbtable;
      fuellen($menu,$filterarray,$dbtable,$dbfield,$dbwert);
    } else {	
      fuellask($menu,$filterarray);
    }
  }
  bootstrapend();
?>