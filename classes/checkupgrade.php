<?php

function getactvers($pfad) {
  $db = new SQLite3($pfad.'joorgsqlite.db');
  $sql="SELECT * FROM tblversion ORDER BY fldversion";
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    $arr=$row;
  }
  $versnr=$arr['fldversion'];
  $db->close();	
//  $versnr="0.0";
  return $versnr;
}

function checkupgrade() {
  $db = new SQLite3('data/joorgsqlite.db');
  //echo "checkupgrade<br>";
  $ini_array = parse_ini_file("version.txt");
  $versnr=$ini_array['versnr'];
  //echo $versnr."=Vers<br>";
  $sql="SELECT * FROM tblversion ORDER BY fldversion";
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    $arr=$row;
  }
  //echo $arr['fldversion']."=dbvers<br>";
  if ($arr['fldversion']<$versnr) {
    echo "<h1 align='left'>Joorgportal</h1>";
    echo "<div class='alert alert-warning'>";
    echo "Upgrade für Vers.-Nr ".$versnr." erkannt. Erst Datensätze anpassen.";
    echo "</div>";
    echo "<a href='classes/upgrade.php' class='btn btn-primary btn-sm active' role='button'>Update durchführen</a> "; 
    echo "<a href='index.php?weiter=J' class='btn btn-primary btn-sm active' role='button'>Trotzdem weiter</a> "; 
    $check="upgrade";
  } else {
    $check="ok";
  }
  return $check;
}

function check_version() {
  $servername=$_SERVER['HTTP_HOST'];
  $serverpfad=$_SERVER['REQUEST_URI'];
  $file = strrchr($serverpfad, '/');
  $file = ($file===false) ? $serverpfad : (($file==='/') ? '' : substr($file, 1));
  $serverpfad = ($file==='') ? $serverpfad : substr($serverpfad, 0, -strlen($file));

  $ini_verarr = parse_ini_file("http://horald.github.io/joorgsqlite/version.txt");
  $versnr=$ini_verarr['versnr'];
  //$versnr='1.016';
  $versdat=$ini_verarr['versdat'];

  $ini_locarr = parse_ini_file("http://".$servername.$serverpfad."version.txt");
  $locvers=$ini_locarr['versnr'];
  $actvers=getactvers("data/");	
//echo "locvers".$locvers.",".$versnr."<br>";
  if ($locvers<$versnr) {
    echo "<div class='alert alert-info'>";
    echo "<a href='classes/checkdownload.php?neuevers=".$versnr."'>Neue Version ".$versnr." verfügbar</a><br>";
    echo "</div>";
  } else {  
//echo "actvers".$actvers.",".$versnr."<br>";
    if ($actvers<$versnr) {
      echo "<div class='alert alert-info'>";
      echo "<a href='classes/installupdate.php?newvers=".$versnr."&oldvers=".$actvers."&versdat=".$versdat."'>Auf neue Version ".$versnr." aktualisieren</a>";
      echo "</div>";
    }
  }
  if (file_exists("http://".$servername.$serverpfad."dbupdate.sql")) {
    echo "<div class='alert alert-info'>";
    echo "<a href='classes/dbupdate.php'>DB Update einspielen</a>";
    echo "</div>";
  }  
}


function check_version_alt() {
  $servername=$_SERVER['HTTP_HOST'];
  $serverpfad=$_SERVER['REQUEST_URI'];
  $file = strrchr($serverpfad, '/');
  $file = ($file===false) ? $serverpfad : (($file==='/') ? '' : substr($file, 1));
  $serverpfad = ($file==='') ? $serverpfad : substr($serverpfad, 0, -strlen($file));

  ob_start();
  include("http://horald.github.io/joorgsqlite/classes/sendversion.php");
  flush();
  $json=ob_get_contents();
  ob_end_clean();  
  $obj=json_decode($json,true);
  $versnr=$obj['versnr'];
  $versdat=$obj['versdat'];

  $ini_locarr = parse_ini_file("http://".$servername.$serverpfad."version.txt");
  $locvers=$ini_locarr['versnr'];
  $actvers=getactvers("data/");	
echo "locvers<versnr".$locvers.",".$versnr."<br>";
  if ($locvers<$versnr) {
    echo "<div class='alert alert-info'>";
    echo "<a href='classes/checkupdate.php?actvers=".$locvers."'>Neue Version ".$versnr." verfügbar</a>";
    echo "</div>";
  } else {  
echo "actvers<versnr".$locvers.",".$versnr."<br>";
    if ($actvers<$versnr) {
      echo "<div class='alert alert-info'>";
      echo "<a href='classes/installupdate.php?newvers=".$versnr."&oldvers=".$actvers."&versdat=".$versdat."'>Auf neue Version ".$versnr." aktualisieren</a>";
      echo "</div>";
    }
  }  
}

?>