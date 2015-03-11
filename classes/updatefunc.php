<?php
header("content-type: text/html; charset=utf-8");

function updateinput($pararray,$listarray,$idwert,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $results = $db->query("SELECT * FROM ".$pararray['dbtable']." WHERE fldindex=".$idwert);
  while ($row = $results->fetchArray()) {
    $arr=$row;
  }	
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='update.php?update=1&menu=".$menu."' role='form'>";

  foreach ( $listarray as $arrelement ) {
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."'/></dd>";
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
          if ($arr[$arrelement['dbfield']]==$row[$arrelement['seldbfield']]) {
            echo "<option style='background-color:#c0c0c0;' selected>".$row[$arrelement['seldbfield']]."</option>";
          } else {
            echo "<option style='background-color:#c0c0c0;' >".$row[$arrelement['seldbfield']]."</option>";
          }
        }
        echo "</select> ";
        echo "</dl>";
      break;
      case 'time':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."'/></dd>";
        echo "</dl>";
      break;
      case 'date':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<div class='input-group date form_date col-md-2' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2' data-link-format='yyyy-mm-dd'>";
        echo "<dd><input class='form-control' size='8' type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."' readonly></dd>";
		  echo "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
        echo "</div>";
		  echo "<input type='hidden' id='dtp_input2' value='' /><br/>";
        echo "</dl>";
      break;
    }
  }

  echo "<input type='hidden' name='id' value=".$idwert.">";
  echo "<input type='checkbox' name='chkanzeigen' value='anzeigen'> Speichern anzeigen<br>";
  echo "<dd><input type='submit' value='Speichern' /></dd>";
  echo "</form>";
}

function updatepreis() {
  $db = new SQLite3('../data/joorgsqlite.db');
//  echo "updatepreis";
}

function updatesave($pararray,$listarray,$menu) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Liste</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');

  $sql="UPDATE ".$pararray['dbtable']." SET ";
  foreach ( $listarray as $arrelement ) {
      switch ( $arrelement['type'] )
      {
        case 'text':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
        case 'select':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['name']]."', ";
        break;
        case 'time':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
        case 'date':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
      }
  }

  $sql=substr($sql,0,-2);
  $sql=$sql." WHERE fldindex=".$_POST['id'];
//  echo $sql."<br>";
  $query = $db->exec($sql);
  if ($pararray['chkpreis']=="J") {
    $rowid=$_POST['id'];
    updatepreis($rowid);
  }
  echo "<div class='alert alert-success'>";
  echo $db->lastErrorMsg()."<br>";
  echo $sql."<br>";
  echo "Daten '".$_POST['fldbez']."' aktualisiert.";
  echo "</div>";
}
?>