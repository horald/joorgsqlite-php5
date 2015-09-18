<?php

function schickenauswahl($menu) {

  echo "<form class='form-horizontal' method='post' action='schicken.php?schicken=1&menu=".$menu."'>";
  echo "<dd><input type='text' name='urladr' value=''/></dd>";
  echo "<dd><input type='submit' value='Daten senden' /></dd>";
  echo "</form>";
}

function schickendaten($pararray,$listarray,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
//  $sql="SELECT * FROM tblsyncstatus WHERE fldtable='".$pararray['dbtable']."'";
//  $results = $db->query($sql);

  $sql="SELECT * FROM ".$pararray['dbtable'];
  $results = $db->query($sql);
  $datarr = array();
  while ($row = $results->fetchArray()) {
    $datarr[] = $row;
  }	
  $db->close(); 
  $datcnt=count($datarr);
  //echo "Count ".count($arr)."/".$datcnt."<br>";


  $urladr=$_POST['urladr'];
  echo "<div class='alert alert-success'>";
  echo "Daten an ".$urladr." schicken.";
  echo "</div>";

  $website="http://".$urladr.":8080/own/joorgsqlite/classes/annehmen.php";
  echo "<form class='form-horizontal' method='post' action='".$website."'>";
  echo "<input type='hidden' name='menu' value='".$menu."'/>"; 
  echo "<input type='hidden' name='table' value='".$pararray['dbtable']."'/>"; 
  echo "<input type='hidden' name='datcnt' value='".$datcnt."'/>";
  for( $i=0; $i < $datcnt; $i++ ) {
    //echo $datarr[$i]['fldBez']."=bez<br>";
    echo "<input type='hidden' name='idarr".$i."' value='".$datarr[$i]['fldindex']."'/>";
    foreach ( $listarray as $arrelement ) {
      $weiter='N';
      if ($arrelement[type]=='text') {
        $weiter='J';
      }
      if ($arrelement[type]=='select') {
        $weiter='J';
      }
      if ($arrelement[type]=='date') {
        $weiter='J';
      }
      if ($arrelement[type]=='time') {
        $weiter='J';
      }
      if ($arrelement[type]=='calc') {
        $weiter='J';
      }
      if ($weiter=='J') {
        echo "<input type='hidden' name='".$arrelement['name']."arr".$i."' value='".$datarr[$i][$arrelement['dbfield']]."'/>";
      }
    }
  }
  echo "<dd><input type='submit' value='Daten senden' /></dd>";
  echo "</form>";

}

?>