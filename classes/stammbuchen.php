<?php
include("bootstrapfunc.php");
include("stammbuchenfunc.php");
include("../config.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Stammdaten Buchen");
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
$stamm = $_GET['stamm'];
if ($stamm==1) {
  $dbtable=$pararray['dbtable'];
  $fldindex=$pararray['fldindex'];	
  stammuebernehmen($fldindex,$dbtable,$autoinc_start);
  //echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=".$menu."'>";  
} else {
  stammauswahl($menu);
}  
bootstrapend();
?>