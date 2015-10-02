<?php
include("bootstrapfunc.php");
include("remotetoolfunc.php");
bootstraphead();
bootstrapbegin("Remote-Tool");
echo "<a href='../admin/index.php'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
$status=$_POST['status'];
switch ( $status ) {
  case 'struc':
    $urladr=$_POST['urladr'];
    $dbtable=$_POST['dbtable'];
    remoteaufruf($urladr,$dbtable);
  break;
  default:
    remoteauswahl();
}
bootstrapend();
?>