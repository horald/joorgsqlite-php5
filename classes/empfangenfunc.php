<?php

function datenauswahl($menu) {
  echo "<form class='form-horizontal' method='post' action='empfangen.php?empfangen=1&menu=".$menu."'>";
  echo "<dd><input type='text' name='urladr' value=''/></dd>";
  echo "<dd><input type='submit' value='Daten holen' /></dd>";
  echo "<input type='hidden' name='menu' value='".$menu."' />";
  echo "</form>";
}

function datenholentest($menu) {
  $urladr=$_POST['urladr'];
  echo "<div class='alert alert-success'>";
  echo "Daten von ".$urladr." holen.";
  echo "</div>";

  $website="http://".$urladr.":8080/own/joorgsqlite/classes/senden.php?dbtable=".$menu;
  ob_start();
  define('DBTABLE','tblfahr');
  include($website);
  flush();
  $json=ob_get_contents();
  ob_end_clean();  
  $obj=json_decode($json,true);
  var_dump($obj);
}

function datenholen($menu) {
  //echo "datenholen";
  $urladr=$_POST['urladr'];
  echo "<div class='alert alert-success'>";
  echo "Daten von ".$urladr." holen.";
  echo "</div>";

  $website="http://".$urladr.":8080/own/joorgsqlite/classes/senden.php?dbtable=".$menu;
  ob_start();
  define('DBTABLE','tblfahr');
  include($website);
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
    $sql="SELECT fldindex FROM ".$obj['table']." WHERE fldindex=".$datenarray['fldindex'];
    $results = $db->query($sql);
    while ($row = $results->fetchArray()) {
      $arr=$row;
    }	

    $daten=""; 
    if ($arr['fldindex']==$datenarray['fldindex']) {
      foreach ( $obj['field'] as $fieldelem ) {
        //echo $datenarray[$fieldelem]."<br>";
        if ($daten=="") {
          $daten=$fieldelem."='".$datenarray[$fieldelem]."'";
        } else {
          $daten=$daten.", ".$fieldelem."='".$datenarray[$fieldelem]."'";
        }
      }
      $sqlexec="UPDATE ".$obj['table']." SET ".$daten." WHERE fldindex=".$datenarray['fldindex'];
    } else {
      foreach ( $obj['field'] as $fieldelem ) {
        //echo $datenarray[$fieldelem]."<br>";
        if ($daten=="") {
          $daten="'".$datenarray[$fieldelem]."'";
        } else {
          $daten=$daten.",'".$datenarray[$fieldelem]."'";
        }
      }
      //echo $daten."<br>";
    
      $sqlexec="INSERT INTO ".$obj['table']." (".$fields.") VALUES (".$daten.")";
    }
    echo "<div class='alert alert-success'>";
    echo $sqlexec."<br>";
    echo "</div>";
    $db->exec($sqlexec);
  }

//  echo var_dump($json)."=vardump<br>";
}

?>