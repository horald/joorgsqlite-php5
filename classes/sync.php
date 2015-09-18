<?php
include("bootstrapfunc.php");
include("syncfunc.php");
$menu=$_GET['menu'];
bootstraphead();
bootstrapbegin("Sync");
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
sync();
bootstrapend();
?>