<?php
include("bootstrapfunc.php");
include("checkupgrade.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='about.php' class='btn btn-primary btn-sm active' role='button'>zurück</a> "; 
$locvers=$_GET['locvers'];
$versnr=$_GET['versnr'];
$versdat=$_GET['versdat'];
//$ini_array = parse_ini_file("http://horald.github.io/joorgsqlite/version.txt");
//$versnr=$ini_array['versnr'];
//include("http://horald.github.io/joorgsqlite/update.php?locvers=".$locvers);
//$versnr="1.011a";
//echo $versnr."=versnr<br>";
if ($locvers>=$versnr) {
  $actvers=getactvers("../data/");	
//  echo $actvers.",".$versnr."=actvers,versnr<br>";
  if ($actvers<$versnr) {
    echo "<div class='alert alert-info'>";
    echo "<a href='installupdate.php?newvers=".$versnr."&versdat=".$versdat."'>Auf neue Version ".$versnr." aktualisieren</a>";
    echo "</div>";
  } else {
    echo "<div class='alert alert-success'>";
    echo "Sie haben die aktuelle Version. (".$locvers.")<br>";
    if ($locvers>$versnr) { 
      echo "Alte Version....: ".$versnr." <br>";
    }
    echo "</div>";
  }  
} else {
  //$url='https://github.com/horald/joorgsqlite/archive/gh-pages.zip';
  $url='https://github.com/horald/joorgsqlite/blob/gh-pages/sites/update/joorgsqlite'.$versnr.'.tar.gz?raw=true';
  echo "<div class='alert alert-success'>";
  echo "Aktuelle Version: ".$locvers." <br>";
  echo "Neue Version....: ".$versnr." <br>";
  echo "Bei Github verfügbar: <a href='".$url."'>Download</a>";
  echo "</div>";
}
bootstrapend();
?>