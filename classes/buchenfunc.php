<?php
session_start();
header("content-type: text/html; charset=utf-8");

function buchenauswahl($menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<form class='form-horizontal' method='post' action='buchen.php?buchen=1&menu=".$menu."'>";
        $sql="SELECT * FROM tblktoinhaber";
        $results = $db->query($sql);
        echo "<table>";
        echo "<tr>";
        echo "<td><label >Kontoinhaber:</label></td>";
        echo "<td><select name='inhaber' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($row = $results->fetchArray()) {
            echo "<option style='background-color:#c0c0c0;' >".$row['fldBez']."</option>";
        }
        echo "</select></td> ";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label >Art:</label></td>";
        echo "<td><select name='art' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        echo "<option style='background-color:#c0c0c0;' >Bar</option>";
        echo "<option style='background-color:#c0c0c0;' >Einkauf</option>";
        echo "</select></td> ";
        echo "</tr>";
        echo "</table>";

  echo " <input type='submit' value='Speichern' />";
  echo "</form>";

}

function buchenfunc($menu,$pararray,$inhaber,$art) {
  $dbselarr = $_SESSION['DBSELARR'];
  $count=sizeof($dbselarr);
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<br>";
//  $datum = date("Y-m-d");
//  $timestamp = time();
//  $uhrzeit = date("H:i",$timestamp);
  $Sumbetrag=0;
  for ( $x = 0; $x < $count; $x++ ) {
  	 $query="SELECT * FROM tblEinkauf_liste WHERE fldindex=".$dbselarr[$x];
  	 //echo $query."<br>";
    $results = $db->query($query);
    if ($row = $results->fetchArray() ) { 
      $Betrag=$row['fldAnz']*$row['fldPreis'];
      $Sumbetrag=$Sumbetrag+$Betrag;
      $datum=$row['fldEinkaufDatum'];
      $uhrzeit=$row['fldEinkaufUhrzeit'];
      $qryins="INSERT INTO tblktosal (fldDatum,fldUhrzeit,fldBez,fldKonto,fldInhaber,fldBetrag) VALUES ('".$datum."','".$uhrzeit."','".$row['fldBez']."','".$row['fldKonto']."','".$inhaber."','-".$Betrag."')";
      echo "<div class='alert alert-success'>";
      echo $qryins."<br>";
      echo "</div>";
      $db->exec($qryins);
    } else {
      echo "<div class='alert alert-success'>";
      echo $db->lastErrorMsg()."<br>";
      echo $qryins."<br>";
      echo "</div>";
    }  
  }	
  if ($art=="Einkauf") {
      $qryins="INSERT INTO tblktosal (fldDatum,fldUhrzeit,fldBez,fldKonto,fldInhaber,fldBetrag) VALUES ('".$datum."','".$uhrzeit."','Einkauf','EINKAUF','".$inhaber."','".$Sumbetrag."')";
      echo "<div class='alert alert-success'>";
      echo $qryins."<br>";
      echo "</div>";
      $db->exec($qryins);
  }
  echo "<div class='alert alert-success'>";
  echo $count." ausgewählte Daten gebucht.";
  echo "</div>";
}

?>