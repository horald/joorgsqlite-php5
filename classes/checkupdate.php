<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin("Joorgportal<br>");
echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
echo "<a href='about.php' class='btn btn-primary btn-sm active' role='button'>zurück</a> "; 
$actvers=$_GET['actvers'];
$ini_array = parse_ini_file("http://horald.github.io/joorgsqlite/version.txt");
$versnr=$ini_array['versnr'];
if ($actvers>=$versnr) {
  echo "<div class='alert alert-success'>";
  echo "Sie haben die aktuelle Version. (".$actvers.")<br>";
  if ($actvers>$versnr) { 
    echo "Alte Version....: ".$versnr." <br>";
  }
  echo "</div>";
} else {
  $url='https://github.com/horald/joorgsqlite/archive/gh-pages.zip';
//  $url="";
  echo "<div class='alert alert-success'>";
  echo "Aktuelle Version: ".$actvers." <br>";
  echo "Neue Version....: ".$versnr." <br>";
  echo "Bei Github verfügbar: <a href='".$url."'>Download</a>";
  echo "</div>";
}
bootstrapend();
?>