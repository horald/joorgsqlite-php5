<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("Verbrauch");
$id=$_GET['id'];
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a><br><br> ";

$holverbrauch=$_GET['holverbrauch'];
if ($holverbrauch==1) {
  echo "<img src='verbrauchfunc.php?verbrauch=".$_POST['verbrauch']."' usemap='#verbrauch' />"; 
} else {
  echo "<form class='form-horizontal' method='post' action='verbrauch.php?holverbrauch=1&id=".$id."'>";
  echo "<dd><input type='text' name='verbrauch' value=''/></dd>";
  echo "<dd><input type='submit' value='Verbrauch senden' /></dd>";
  echo "</form>";
}

bootstrapend();
?>