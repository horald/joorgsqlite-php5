<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("");
$id=$_GET['id'];
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a><br><br> ";

echo "<div id='calendar'></div>";
bootstrapend();
?>
