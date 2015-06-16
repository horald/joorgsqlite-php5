<?php
  include("bootstrapfunc.php");
  include("fuellenfunc.php");
  $menu=$_GET['menu'];
  include("../sites/views/".$menu."/showtab.inc.php");
  bootstraphead();
  bootstrapbegin($pararray['headline']);
//  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  $fuellen = $_GET['fuellen'];
  if ($fuellen==1) {
    $fuell=$_POST['fuell'];
    echo $fuell."=fuell";
  	 fuellen($menu,$pararray);
  } else {	
    fuellask($menu,$filterarray);
  }
  bootstrapend();
?>