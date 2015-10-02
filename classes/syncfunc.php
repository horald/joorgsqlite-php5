<?php

function syncauswahl($menu) {

  echo "<form class='form-horizontal' method='post' action='sync.php?menu=".$menu."'>";
  echo "<input type='hidden' name='status' value='remote'/>"; 
  echo "<dd><input type='text' name='urladr' value='localhost/android'/></dd>";
  echo "<dd><input type='checkbox' name='nuranzeigen' value='anzeigen'/> nur anzeigen</dd>";
  echo "<dd><input type='submit' value='Austausch starten' /></dd>";
  echo "</form>";
}

function syncremote($menu,$dbtable,$urladr,$pfad,$fldindex,$nuranzeigen) {
//  $website="http://".$urladr.":8080/own/joorgsqlite/classes/senden.php?dbtable=".$menu;
//  $website="http://localhost/android/own/joorgsqlite/classes/syncremote.php?menu=".$menu."&dbtable=".$dbtable."&pfad=".$pfad;
  $website="http://".$urladr."/own/joorgsqlite/classes/syncremote.php?menu=".$menu."&dbtable=".$dbtable."&pfad=".$pfad."&fldindex=".$fldindex."&nuranzeigen=".$nuranzeigen;
  echo "<div class='alert alert-warning'>";
  echo "Wenn Sie hier keinen Button 'Daten austauschen' sehen, ist die Verbindung fehlgeschlagen. Bitte erneut versuchen.<br>";
  echo "Url:".$urladr;
  echo "</div>";
//echo $website."<br>";
  include($website);
} 

function syncempfangen($menu,$pfad,$sql,$datcnt,$dbtable,$fldindex,$nuranzeigen) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<div class='alert alert-success'>";
  echo $datcnt." Datensätze empfangen.<br>";
//  echo $sql;
  echo "</div>";
 
  $website="http://".$pfad."sync.php?menu=".$menu;
  echo "<form class='form-horizontal' method='post' action='".$website."'>";
  echo "<input type='hidden' name='status' value='senden'/>"; 
  echo "<dd><input type='checkbox' name='nuranzeigen' value='anzeigen'/> nur anzeigen</dd>";
  echo "<dd><input type='submit' value='Daten senden' /></dd>";
  echo "</form>";
 
  for( $i=1; $i <= $datcnt; $i++ ) {
    echo "<div class='alert alert-success'>";
    $index=$_POST['index'.$i];
    $qryval = "SELECT * FROM ".$dbtable." WHERE ".$fldindex."=".$index;
    $results = $db->query($qryval);
    if ($linval = $results->fetchArray()) {
      $sql=$_POST['updsql'.$i];
    } else {
      $sql=$_POST['inssql'.$i];
    }	
    $sql=str_replace("#","'",$sql);
    echo $sql."<br>";
    echo "</div>";
    if ($nuranzeigen<>"anzeigen") {
      $query = $db->exec($sql);
    }  
  }

}

function syncsenden() {
  echo "<div class='alert alert-success'>";
  echo "Daten gesendet.";
  echo "Datenaustausch abgeschlossen.";
  echo "</div>";
}

?>