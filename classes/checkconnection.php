<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("Joorgportal - Checkconnection<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='about.php' class='btn btn-primary btn-sm active' role='button'>About</a> "; 
$locvers=$_GET['locvers'];
$versnr=$_GET['versnr'];
$versdat=$_GET['versdat'];
echo "<div class='alert alert-info'>";
echo "locvers:".$locvers."<br>";
echo "versnr:".$versnr."<br>";
echo "versdat:".$versdat."<br>";
echo "</div>";
bootstrapend();
?>