<?php
header("content-type: text/html; charset=utf-8");
session_start();

function buchauswahl($menu) {
  echo "<form class='form-horizontal' method='post' action='buchen.php?buchen=1&menu=".$menu."'>";
        $sql="SELECT * FROM tblktoinhaber";
        $results = $db->query($sql);
        echo "<label >Kontoinhaber:</label>";
        echo "<select name='inhaber' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($row = $results->fetchArray()) {
            echo "<option style='background-color:#c0c0c0;' >".$row['fldBez']."</option>";
        }
        echo "</select> ";

//  echo "<input type='hidden' name='id' value=".$idwert.">";
  echo "<input type='submit' value='Speichern' />";
  echo "</form>";

}

function buchfunc($menu,$pararray) {
  $dbselarr = $_SESSION['DBSELARR'];
  $dbselchk = $_SESSION['DBSELCHK'];
  $count=sizeof($dbselarr);
  $db = new SQLite3('../data/joorgsqlite.db');
echo "<br>";
  $datum = date("Y-m-d");
  $timestamp = time();
  $uhrzeit = date("H:i",$timestamp);
  $qryflt = "SELECT * FROM tblfilter WHERE fldtablename='tblktosal'";
  $resflt = $db->query($qryflt);
  if ($rowflt = $resflt->fetchArray()) {
    $inhaber = $rowflt['fldwert'];
  } else {
    $inhaber = "(ohne)";
  }
  for ( $x = 0; $x < $count; $x++ ) {
  	 $query="SELECT * FROM tblEinkauf_liste WHERE fldindex=".$dbselarr[$x];
    $results = $db->query($query);
    $row = $results->fetchArray(); 
    $qryins="INSERT INTO tblktosal (fldDatum,fldUhrzeit,fldBez,fldKonto,fldInhaber,fldBetrag) VALUES ('".$datum."','".$uhrzeit."','".$row['fldBez']."','".$row['fldKonto']."','".$inhaber."','-".$row['fldPreis']."')";
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