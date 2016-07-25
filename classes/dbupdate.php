<?php
$vers=$_GET['vers'];
include("bootstrapfunc.php");
include("dbupdatefunc.php");
bootstraphead();
bootstrapbegin("Update einspielen");
dbupdate($vers);
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Fertig</a>"; 
bootstrapend();
?>