<?php

function showtabfunc($menu,$sql,$id) {
  echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
  echo "<a href='insert.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Einfügen</a> ";
  echo "<a href='import.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>import</a> ";
  echo "<a href='export.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Export</a> ";
  echo "<a href='leeren.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Leeren</a> ";
  $db = new SQLite3('../data/joorgsqlite.db');
  $sql="SELECT * FROM tblfunc WHERE fldMenuID='".$menu."' ORDER BY fldName";
  //echo $sql."<br>";
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    //echo $row['fldBez']."<br>";  
    echo "<a href='".$row['fldphp']."?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>".$row['fldBez']."</a> ";
  }  
  //echo "<a href='preis.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Preis</a> ";
  //echo "<a href='buchen.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Buchen</a> ";
  //echo "<a href='stamm.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Stammdaten</a> ";
  echo "<a href='schicken.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>senden</a> ";
  echo "<a href='empfangen.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Holen</a> ";
}

function showtabfilter($filter,$filterarray,$pararray,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $dbtable=$pararray['dbtable'];
  $fldort="";
  $dbwhere="";
  $selarr=array();
  $anzfilter = sizeof($filterarray);
  if ($filter==1) {
    //echo "filter==1<br>";
    foreach ( $filterarray as $arrelement ) {
      $wert=$_POST[$arrelement['name']];
      //echo $arrelement['dbfield']."=".$wert."<br>";
      if ($wert<>"(ohne)") {
        if ($dbwhere=="") {
          $dbwhere=" WHERE ".$arrelement['dbfield']."='".$wert."'";
        } else {
          $dbwhere=$dbwhere." AND ".$arrelement['dbfield']."='".$wert."'";
        }
      }

      $sql="SELECT * FROM tblfilter WHERE fldfeld='".$arrelement['dbfield']."' AND fldtablename='".$dbtable."'";
      //echo $sql."<br>";
      $results = $db->query($sql);
      while ($row = $results->fetchArray()) {
        $arr=$row;
      }  	
      if (isset($arr['fldwert'])) {
        //echo $arr['fldfeld'].",".$arr['fldtablename'].",".$arrelement['dbfield'].",".$pararray['dbtable']."<br>";
        if (($arr['fldtablename']==$pararray['dbtable']) && ($arr['fldfeld']==$arrelement['dbfield'])) {
          $sql="UPDATE tblfilter SET fldwert='".$wert."' WHERE fldindex=".$arr['fldindex'];
        } else {
          $sql="INSERT INTO tblfilter (fldfeld,fldwert,fldtablename) VALUES('".$arrelement['dbfield']."','".$wert."','".$dbtable."')";
        }
      } else {
        $sql="INSERT INTO tblfilter (fldfeld,fldwert,fldtablename) VALUES('".$arrelement['dbfield']."','".$wert."','".$dbtable."')";
      }
      //echo $sql."<br>";
      $results = $db->query($sql);

    }

  } else {
    //echo "no filter<br>";

    foreach ( $filterarray as $arrelement ) {
      $sql="SELECT * FROM tblfilter WHERE fldfeld='".$arrelement['dbfield']."' AND fldtablename='".$dbtable."'";
      //echo $sql."<br>";
      $results = $db->query($sql);
      while ($row = $results->fetchArray()) {
        $arr=$row;
      }	
      if (isset($arr['fldwert'])) {
        //echo $arr['fldfeld'].",".$arr['fldtablename'].",".$pararray['dbtable'].",".$arrelement['dbfield']."<br>";
        if ($arr['fldwert']<>"(ohne)") {
          if ($dbwhere=="") { 
            $dbwhere=" WHERE ".$arrelement['dbfield']."='".$arr['fldwert']."'";
          } else {
            $dbwhere=$dbwhere." AND ".$arrelement['dbfield']."='".$arr['fldwert']."'";
          }
        }
        $selarr[$arrelement['dbfield']]=$arr['fldwert'];
      }
    }
  }

  //echo $anzfilter."=anz<br>";
  echo "<form class='form-horizontal' method='post' action='showtab.php?filter=1&menu=".$menu."'>";
  foreach ( $filterarray as $arrelement ) {
  	 //echo $arrelement['seldbindex']."=index<br>";
    $seldbwhere="";
    if ($arrelement['seldbwhere']<>"") {
      $seldbwhere=" WHERE ".$arrelement['seldbwhere'];
    }
    $sql="SELECT * FROM ".$arrelement['dbtable'].$seldbwhere;
    $results = $db->query($sql);
    echo $arrelement['label'];
    echo "<select name='".$arrelement['name']."' size='1'>";
    echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
    while ($row = $results->fetchArray()) {
      //echo "<br>";
      if ($filter==1) {
        $wert=$_POST[$arrelement['name']];
      } else {
        $wert=$selarr[$arrelement['dbfield']];
      }
      if ($wert==$row[$arrelement['seldbfield']]) {
        echo "<option style='background-color:#c0c0c0;' selected>".$row[$arrelement['seldbfield']]."</option>";
      } else {
        echo "<option style='background-color:#c0c0c0;' >".$row[$arrelement['seldbfield']]."</option>";
      }
    }
    echo "</select> ";
  }
  if ($anzfilter>0) {
    echo "<button type='submit' name='submit' class='btn btn-primary'>Ok</button>";
  }
  echo "</form>"; 

  $dborder="";
  if ($pararray['orderby']<>"") {
    $dborder=" ORDER BY ".$pararray['orderby'];
  }
  if ($pararray['dbwhere']<>"") {
    if ($dbwhere<>"") {
      $dbwhere=$dbwhere." AND ".$pararray['dbwhere'];
    } else {
      $dbwhere=" WHERE ".$pararray['dbwhere'];
    }
  }
  $sql="SELECT * FROM ".$dbtable.$dbwhere.$dborder;
  //echo $sql."<br>";
  return $sql;
}

?>