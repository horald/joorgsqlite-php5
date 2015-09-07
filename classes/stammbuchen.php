<?php
include("bootstrapfunc.php");
include("stammbuchenfunc.php");
$menu=$_GET['menu'];
bootstraphead();
bootstrapbegin("Stammdaten Buchen");
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
$stamm = $_GET['stamm'];
if ($stamm==1) {
  stammuebernehmen();
  echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=".$menu."'>";  
} else {
  stammauswahl($menu);
}  
bootstrapend();
?>