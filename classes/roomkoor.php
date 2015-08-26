<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("Grafik");
$id=$_GET['id'];
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<br><br>";
echo "<img src='roomkoorfunc.php' usemap='#roomkoor' />"; 

bootstrapend();
?>