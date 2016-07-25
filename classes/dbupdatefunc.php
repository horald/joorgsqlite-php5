<?php

function dbupdate($vers) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $pfad = getenv('SCRIPT_FILENAME');
  $pfad = substr($pfad,0,strlen($pfad)-20); 
  $file = $pfad."sites/update/update".$vers.".sql";
  if (file_exists($file)) {
    echo "<div class='alert alert-success'>";
    $sql="";
    foreach(file($file) as $line) {
      echo $line."<br>";
      $sql=$sql.$line;
      //echo substr(rtrim($line),-1)."=ende<br>";
      if (substr(rtrim($line),-1)==";") {
        //echo "sql:".$sql."<br>";
        $query = $db->exec($sql);
        echo $db->lastErrorMsg()."<br>";
        $sql="";
      }
    }
    echo "</div>";
    dbupdversion($vers);
  } else {
    echo "<div class='alert alert-warning'>";
	echo "Datei ".$file." existiert nicht.";
    echo "</div>";
  }
}

function dbupdversion($vers) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $now=date('Y-m-d');
  $ins="INSERT INTO tblversion (fldbez,fldversion,flddatum) VALUES('Version ".$vers."','".$vers."','".$now."')";
  $query = $db->exec($ins);
  //echo $db->lastErrorMsg()."<br>";
  echo "<div class='alert alert-info'>";
  echo "Version ".$vers." aktualisiert.";
  echo "</div>";
}

?>