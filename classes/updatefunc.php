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
  	 if ($arrelement['fieldsave']<>"NO") {
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."'/></dd>";
        echo "</dl>";
      break;
      case 'selectid':
        $seldbwhere="";
        if ($arrelement['seldbwhere']<>"") {
          $seldbwhere=" WHERE ".$arrelement['seldbwhere'];
        }
        $sql="SELECT * FROM ".$arrelement['dbtable'].$seldbwhere;
        $results = $db->query($sql);
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<select name='".$arrelement['name']."' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($row = $results->fetchArray()) {
          if ($arr[$arrelement['dbfield']]==$row[$arrelement['seldbindex']]) {
            echo "<option style='background-color:#c0c0c0;' selected value=".$row[$arrelement['seldbindex']].">".$row[$arrelement['seldbfield']]."</option>";
          } else {
            echo "<option style='background-color:#c0c0c0;' value=".$row[$arrelement['seldbindex']].">".$row[$arrelement['seldbfield']]."</option>";
          }
        }
        echo "</select> ";
        echo "</dl>";
      break;
      case 'select':
        $seldbwhere="";
        if ($arrelement['seldbwhere']<>"") {
          $seldbwhere=" WHERE ".$arrelement['seldbwhere'];
        }
        $sql="SELECT * FROM ".$arrelement['dbtable'].$seldbwhere;
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
      case 'calc':
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
        //echo "<dd><input class='form-control' size='8' type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."' ></dd>";
		  echo "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
        echo "</div>";
		  echo "<input type='hidden' id='dtp_input2' value='' /><br/>";
        echo "</dl>";
      break;
      case 'prozref':
        $proz="0";
        $sqlfil="SELECT * FROM tblfilter WHERE fldtablename='tblorte' AND fldfeld='fldid_suchobj'";
        $resfil = $db->query($sqlfil);
        if ($rowfil = $resfil->fetchArray()) {
          if ($rowfil['fldwert']<>"(ohne)") {
            $sqlsuch="SELECT * FROM tblsuchobj WHERE fldbez='".$rowfil['fldwert']."'";
            $ressuch = $db->query($sqlsuch);
            if ($rowsuch = $ressuch->fetchArray()) {
              $refwhere="fldid_suchobj=".$rowsuch['fldindex']." AND fldid_orte=".$arr['fldindex'];
              $sqlref="SELECT * FROM tblrefsuchobj WHERE ".$refwhere;
              $resref = $db->query($sqlref);
              if ($rowref = $resref->fetchArray()) {
                $proz=$rowref[$arrelement['dbfield']];
              }
            }
          }
        }        
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$proz."'/></dd>";
        echo "</dl>";
      break;
      case 'calc':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
        echo "</dl>";
      break;
      case 'zahl':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$arr[$arrelement['dbfield']]."'/></dd>";
        echo "</dl>";
      break;
    }
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

function updatesave($pararray,$listarray,$menu,$show) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Liste</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');

  $sql="UPDATE ".$pararray['dbtable']." SET ";
  foreach ( $listarray as $arrelement ) {
  	 if ($arrelement['fieldsave']<>"NO") {
      switch ( $arrelement['type'] )
      {
        case 'text':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
        case 'zahl':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
        case 'selectid':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['name']]."', ";
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
        case 'calc':
          $sql=$sql.$arrelement['dbfield']."='".$_POST[$arrelement['dbfield']]."', ";
        break;
        case 'prozref':
          $sqlfil="SELECT * FROM tblfilter WHERE fldtablename='tblorte' AND fldfeld='fldid_suchobj'";
          $resfil = $db->query($sqlfil);
          if ($rowfil = $resfil->fetchArray()) {
          	if ($rowfil['fldwert']<>"(ohne)") {
              $sqlsuch="SELECT * FROM tblsuchobj WHERE fldbez='".$rowfil['fldwert']."'";
              $ressuch = $db->query($sqlsuch);
              if ($rowsuch = $ressuch->fetchArray()) {
                $refwhere="fldid_suchobj=".$rowsuch['fldindex']." AND fldid_orte=".$_POST['id'];
                $sqlref="SELECT * FROM tblrefsuchobj WHERE ".$refwhere;
                $resref = $db->query($sqlref);
                if ($rowref = $resref->fetchArray()) {
                  $sqlupdref="UPDATE tblrefsuchobj SET ".$arrelement['dbfield']."=".$_POST[$arrelement['dbfield']].",fldtyp='".$arrelement['reftyp']."',fldid_moebel=".$_POST['moebel'].",fldid_zimmer=".$_POST['zimmer']." AND fldid_etage=".$_POST['etage']." WHERE ".$refwhere;          
                } else {
                  $sqlupdref="INSERT INTO tblrefsuchobj (fldid_suchobj,fldid_orte,".$arrelement['dbfield'].",fldtyp) VALUES(".$rowsuch['fldindex'].",".$_POST['id'].",'".$_POST[$arrelement['dbfield']]."','".$arrelement['reftyp']."')";          
                }	
                echo "<div class='alert alert-success'>";
                echo $sqlupdref."=prozref";
                echo "</div>";
                $reserr = $db->exec($sqlupdref);
              }  
            }  
          }  
        break;
      }
    }  
  }

  $sql=substr($sql,0,-2);
  $sql=$sql." WHERE fldindex=".$_POST['id'];
  $query = $db->exec($sql);
  if ($pararray['chkpreis']=="J") {
    $rowid=$_POST['id'];
    updatepreis($rowid);
  }
  if ($show=="anzeigen") {
    echo "<div class='alert alert-success'>";
    echo $db->lastErrorMsg()."<br>";
    echo $sql."<br>";
    echo "</div>";
  }
  echo "<div class='alert alert-success'>";
  echo "Daten '".$_POST['fldbez']."' aktualisiert.";
  echo "</div>";
}
?>