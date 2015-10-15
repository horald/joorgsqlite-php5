<?php
include("bootstrapfunc.php");
include("checkupgrade.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='about.php' class='btn btn-primary btn-sm active' role='button'>zurück</a> "; 
$locvers=$_GET['actvers'];
//$ini_array = parse_ini_file("http://horald.github.io/joorgsqlite/version.txt");
//$versnr=$ini_array['versnr'];
include("http://horald.github.io/joorgsqlite/update.php?locvers=".$locvers);
//$versnr="1.011a";
//echo $versnr."=versnr<br>";
//if ($locvers>=$versnr) {
//  $actvers=getactvers("../data/");	
//  if ($actvers<$versnr) {
//    echo "<div class='alert alert-info'>";
//    echo "<a href='installupdate.php?newvers=".$versnr."'>Auf neue Version ".$versnr." aktualisieren</a>";
//    echo "</div>";
//  } else {
//    echo "<div class='alert alert-success'>";
//    echo "Sie haben die aktuelle Version. (".$locvers.")<br>";
//    if ($locvers>$versnr) { 
//      echo "Alte Version....: ".$versnr." <br>";
//    }
//    echo "</div>";
//  }  
//} else {
//  $url='https://github.com/horald/joorgsqlite/archive/gh-pages.zip';
//  echo "<div class='alert alert-success'>";
//  echo "Aktuelle Version: ".$actvers." <br>";
//  echo "Neue Version....: ".$versnr." <br>";
//  echo "Bei Github verfügbar: <a href='".$url."'>Download</a>";
//  echo "</div>";
//}
bootstrapend();
?>