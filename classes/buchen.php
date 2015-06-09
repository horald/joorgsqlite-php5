<?php
include("bootstrapfunc.php");
include("buchenfunc.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Buchen");
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
buchfunc($menu,$pararray);
bootstrapend();
?>