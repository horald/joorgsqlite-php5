<?php
  include("bootstrapfunc.php");
  include("delselfunc.php");
  $menu=$_GET['menu'];
  include("../sites/views/".$menu."/showtab.inc.php");
  bootstraphead();
  bootstrapbegin($pararray['headline']);
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  delselask($pararray);
  bootstrapend();
?>