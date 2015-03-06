<?php
header("content-type: text/html; charset=utf-8");

function insertinput($listarray,$idwert,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<a href='showtab.php?menu=shopping' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='insert.php?insert=1&menu=".$menu."'>";

  foreach ( $listarray as $arrelement ) {
    $default="";
    if ($arrelement['default']!="") {
      $default=$arrelement['default'];
    }
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
        echo "</dl>";
      break;
      case 'select':
        $sql="SELECT * FROM ".$arrelement['dbtable'];
        $results = $db->query($sql);
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<select name='".$arrelement['name']."' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($row = $results->fetchArray()) {
          echo "<option style='background-color:#c0c0c0;' >".$row[$arrelement['seldbfield']]."</option>";
        }
        echo "</select> ";
        echo "</dl>";
      break;
      case 'time':
        if ($default=="now()") {
          $timestamp = time();
          $default = date("H:i",$timestamp);
        }
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
        echo "</dl>";
      break;
      case 'date':
        if ($default=="now()") {
          $default = date('Y-m-d');
        }
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
        echo "</dl>";
      break;
      }
  }

  echo "<input type='checkbox' name='chkanzeigen' value='anzeigen'> Speichern anzeigen<br>";
  echo "<input type='hidden' name='id' value=".$idwert.">";
  echo "<dd><input type='submit' value='Speichern' /></dd>";
  echo "</form>";
}

function updatepreis($rowid) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $sql = "SELECT * FROM tblartikel WHERE fldBez='".$_POST['fldBez']."' AND fldOrt='".$_POST['fldort']."'";
  echo $sql."<br>";
  $results = $db->query($sql);
  $count=0;
  while ($row = $results->fetchArray()) {
    $count=$count+1;
    $arr=$row;
  }	
  echo $count."=count<br>";
  if ($count==1) {
    echo $arr['fldPreis']."<br>";
    $sql="UPDATE tblEinkauf_liste SET fldpreis='".$arr['fldPreis']."' WHERE fldindex=".$rowid;
    echo $sql."<br>";
    $db->exec($sql);
  echo $db->lastErrorMsg()."<br>";

  }
  if ($count==0) {
    if ($_POST['fldpreis']<>"") {
      if ($_POST['fldort']<>"") {  
        $sql="INSERT INTO tblartikel (fldBez,fldPreis,fldOrt) VALUES ('".$_POST['fldBez']."','".$_POST['fldpreis']."','".$_POST['fldort']."')";
        echo $sql."<br>";
        $db->exec($sql);
      }
    }
  }
}

function insertsave($pararray,$listarray,$menu) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Liste</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');
//  echo $db->lastErrorMsg()."<br>";

  $dbtable=$pararray['dbtable'];
  $sql="INSERT INTO ".$dbtable." (";
  foreach ( $listarray as $arrelement ) {
      switch ( $arrelement['type'] )
      {
        case 'text':
          $sql=$sql.$arrelement['dbfield'].",";
        break;
        case 'select':
          $sql=$sql.$arrelement['dbfield'].",";
        break;
        case 'time':
          $sql=$sql.$arrelement['dbfield'].",";
        break;
        case 'date':
          $sql=$sql.$arrelement['dbfield'].",";
        break;
      }
  }
  $sql=substr($sql,0,-1).") VALUES (";
  foreach ( $listarray as $arrelement ) {
      switch ( $arrelement['type'] )
      {
        case 'text':
          $sql=$sql."'".$_POST[$arrelement['dbfield']]."',";
        break;
        case 'select':
          $sql=$sql."'".$_POST[$arrelement['name']]."',";
        break;
        case 'time':
          $sql=$sql."'".$_POST[$arrelement['dbfield']]."',";
        break;
        case 'date':
          $sql=$sql."'".$_POST[$arrelement['dbfield']]."',";
        break;
      }
  }
  $sql=substr($sql,0,-1).")";

  echo $sql."<br>";
  $db->exec($sql);
  $sql = "SELECT last_insert_rowid() as lastid FROM ".$pararray['dbtable'];
  $results = $db->query($sql);
  if ($row = $results->fetchArray()) {
    $rowid=$row[0]; 
    echo $rowid."=rowid<br>"; 
  }
  echo $db->lastErrorMsg()."<br>";
  $db->close();
  echo $pararray['chkpreis']."=chkpreis<br>"; 
  if ($pararray['chkpreis']=="J") {
    updatepreis($rowid);
  }
  echo "<div class='alert alert-success'>";
  echo "Daten '".$_POST['fldBez']."' eingefügt.";
  echo "</div>";
}

?>