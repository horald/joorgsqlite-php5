<?php
include("bootstrapfunc.php");
include("../config.php");
bootstraphead();
bootstrapbegin($headline."<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='about.php' class='btn btn-primary btn-sm active' role='button'>About</a><br><br>"; 
$neuevers=$_GET['neuevers'];
echo "<a href='https://github.com/horald/joorgsqlite/tree/master/sites/update/zip/update-1.016.tar.gz' class='btn btn-primary btn-sm active' role='button'>Download Version ".$neuevers."</a> "; 

bootstrapend();
?>