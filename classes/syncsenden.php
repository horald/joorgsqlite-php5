<?php
include("bootstrapfunc.php");
$menu=$_GET['menu'];
$pfad=$_GET['pfad'];
$dbtable=$_GET['dbtable'];
$fldindex=$_GET['fldindex'];
$nuranzeigen=$_POST['nuranzeigen'];
$timestamp=$_POST['timestamp'];
bootstraphead();
bootstrapbegin("Datenaustausch");

$datcnt=$_POST['datcnt'];
echo "<div class='alert alert-success'>";
echo $datcnt." Datensätze empfangen.<br>";
echo "</div>";

$db = new SQLite3('../data/joorgsqlite.db');

for( $i=1; $i <= $datcnt; $i++ ) {
  $index=$_POST['index'.$i];
  $qryval = "SELECT * FROM ".$dbtable." WHERE ".$fldindex."=".$index;
//  echo $qryval."=qryval<br>";
  $results = $db->query($qryval);
  if ($linval = $results->fetchArray()) {
    $sql=$_POST['updsql'.$i];
  } else {
    $sql=$_POST['inssql'.$i];
  }	
  $sql=str_replace("#","'",$sql);
  echo "<div class='alert alert-success'>";
  echo $sql."<br>";
//  echo $nuranzeigen."=anzeigen<br>";
  echo "</div>";
  if ($nuranzeigen<>"anzeigen") {
      $query = $db->exec($sql);
  }  
}

$website="http://".$pfad."sync.php?menu=".$menu;
echo "<form class='form-horizontal' method='post' action='".$website."'>";
echo "<input type='hidden' name='status' value='fertig'/>"; 
echo "<input type='hidden' name='timestamp' value='".$timestamp."'/>"; 
echo "<input type='hidden' name='nuranzeigen' value='".$nuranzeigen."'/>"; 
echo "<dd><input type='submit' value='Datenaustausch abschliessen' /></dd>";
echo "</form>";
bootstrapend();
?>