<?php
include("bootstrapfunc.php");
include("exportfunc.php");
include("../config.php");
$menu=$_GET['menu'];
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Export");
echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a><br>"; 
$export=$_GET['export'];
if ($export==1) {
  $type="text";
  $file=$_POST['file'];
  $htmlfile=$_POST['htmlfile'];
  echo "<div class='alert alert-success'>";
  echo "Export von <a href='".$htmlfile."'>".$file."</a> wird gestartet...";
  echo "</div>";  
  header("Content-Type: $type");
  header("Content-Disposition: attachment; filename=\"$file\"");
  readfile($dir.$file);
} else {
  exportfunc($exportpfad,$pararray,$listarray,$menu,$exporthtml);
}  
bootstrapend();
?>