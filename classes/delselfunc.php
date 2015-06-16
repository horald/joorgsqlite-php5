<?php
header("content-type: text/html; charset=utf-8");
session_start();

function delselask($pararray) {
  $dbselarr = $_SESSION['DBSELARR'];
  $dbselchk = $_SESSION['DBSELCHK'];
  $count=sizeof($dbselarr);
  $db = new SQLite3('../data/joorgsqlite.db');

  for ( $x = 0; $x < $count; $x++ ) {
  	 $query="DELETE FROM ".$pararray['dbtable']." WHERE ".$pararray['fldindex']."=".$dbselarr[$x];
  	 //echo $query."<br>";
    $db->exec($query);
  }
  echo "<div class='alert alert-success'>";
  echo $count." ausgewählte Daten gelöscht.";
  echo "</div>";
}

?>