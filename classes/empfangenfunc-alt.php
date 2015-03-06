<?php

function datenauswahl($menu) {
  echo "<form class='form-horizontal' method='post' action='empfangen.php?empfangen=1&menu=".$menu."'>";
  echo "<dd><input type='text' name='urladr' value=''/></dd>";
  echo "<dd><input type='submit' value='Daten holen' /></dd>";
  echo "<input type='hidden' name='menu' value='".$menu."' />";
  echo "</form>";
}

function datenholen($menu) {
  echo "<br>Daten werden geholt...<br>";
  $urladr=$_POST['urladr'];
  ob_start();
  include("http://".$urladr.":8080/own/joorgsqlite/classes/senden.php");
  flush();
  $json=ob_get_contents();
  ob_end_clean();  
  $fields="";
  $db = new SQLite3('../data/joorgsqlite.db');
  $obj=json_decode($json,true);

  $fields="";
  foreach ( $obj['field'] as $fieldelem ) {
    //echo $fieldelem."<br>";
    if ($fields=="") {
      $fields="'".$fieldelem."'";
    } else {
      $fields=$fields.",'".$fieldelem."'";
    }
  } 
  //echo $fields."<br>";
  foreach ( $obj['data'] as $datenarray ) {
    $daten=""; 
    foreach ( $obj['field'] as $fieldelem ) {
      //echo $datenarray[$fieldelem]."<br>";
      if ($daten=="") {
        $daten="'".$datenarray[$fieldelem]."'";
      } else {
        $daten=$daten.",'".$datenarray[$fieldelem]."'";
      }
    }
    //echo $daten."<br>";
    
    $sqlins="INSERT INTO ".$obj['table']." (".$fields.") VALUES (".$daten.")";
    //$sqlins="INSERT INTO ".$obj['table']." ('fldBez','fldanz','fldpreis','fldort') VALUES ('".$datenarray['fldBez']."','".$datenarray['fldanz']."','".$datenarray['fldpreis']."','".$datenarray['fldort']."')";
    echo "<div class='alert alert-success'>";
    echo $sqlins."<br>";
    echo "</div>";
    //$db->exec($sqlins);
  }
}

?>