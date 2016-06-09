<?php
include("bootstrapfunc.php");
include("famcalfunc.php");
bootstraphead();
bootstrapbegin("");
$menu=$_GET['menu'];
$id=$_GET['id'];
echo "<a href='index.php?id=".$id."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
famcal();
bootstrapend();
?>