<?php
session_start();
header("content-type: text/html; charset=utf-8");

function allsync($pararray,$menu,$autoinc_start) {
  $dbselarr = $_SESSION['DBSELARR'];
  $count=sizeof($dbselarr);
  $db = new SQLite3('../data/joorgsqlite.db');
  //echo $count."=count<br>";
  $sql="flddbsyncstatus='SYNC'";
  $sql=$sql.",flddbsyncnr=".$autoinc_start;
  $sql=$sql.",fldtimestamp=datetime('now', 'localtime')";
  for ( $x = 0; $x < $count; $x++ ) {
  	 $query="SELECT * FROM ".$pararray['dbtable']." WHERE ".$pararray['fldindex']."=".$dbselarr[$x];
  	 //echo $query."<br>";
    $results = $db->query($query);
    if ($row = $results->fetchArray() ) { 
      $qryup="UPDATE TABLE ddd SET ".$sql." WHERE ".$pararray['fldindex']."=".$dbselarr[$x];
      $db->exec($qryins);
    }
  }    
  echo "<div class='alert alert-success'>";
  echo $count." Datensätze resynct.";
  echo "</div>";  	
}

?>