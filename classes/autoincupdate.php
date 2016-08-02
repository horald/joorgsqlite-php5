<?php
include("../config.php");
include("autoincupdatefunc.php");
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin('autoincupdate');
echo "<a href='../admin/index.php'  class='btn btn-primary btn-sm active' role='button'>Menü</a><br><br>";
$parupdate = $_GET['parupdate'];
if ($parupdate==1) {
  autoincupdate();
} else {
  getparam();
}
bootstrapend();
?>