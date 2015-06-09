<?php
header("content-type: text/html; charset=utf-8");

function insertinput($listarray,$idwert,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='insert.php?insert=1&menu=".$menu."'>";

  foreach ( $listarray as $arrelement ) {
  	 if ($arrelement['fieldsave']<>"NO") {
    $default="";
    if ($arrelement['default']!="") {
      $default=$arrelement['default'];
    }
    $defwert='';
    if ($arrelement['name']<>"") {
      if ($arrelement['getdefault']=="true") {
        $defquery="SELECT * FROM tblfilter WHERE fldmaske='".strtoupper($menu)."_DEFAULT' AND fldName='".$arrelement['name']."'";
        $defresult = $db->query($defquery);
      }  
    }  
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<dl>";
        echo "<dt><label >".$arrelement['label'].":</label></dt>";
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
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
        echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
        echo "</dl>";
      break;
      case 'select':
        if ($defwert<>'') {
          $wert=$defwert;
        }
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
          $strstatus = $row[$arrelement['seldbfield']];
          if ($wert == $strstatus) {
            echo "<option style='background-color:#c0c0c0;' selected>".$row[$arrelement['seldbfield']]."</option>";
          } else {
            echo "<option style='background-color:#c0c0c0;' >".$row[$arrelement['seldbfield']]."</option>";
          }
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
        echo "<div class='input-group date form_date col-md-2' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2' data-link-format='yyyy-mm-dd'>";
        echo "<dd><input class='form-control' size='8' type='text' name='".$arrelement['dbfield']."' value='".$default."' ></dd>";
		  echo "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
        echo "</div>";
		  echo "<input type='hidden' id='dtp_input2' value='' /><br/>";
        echo "</dl>";
      break;
      }
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
//  echo $sql."<br>";
  $results = $db->query($sql);
  $count=0;
  while ($row = $results->fetchArray()) {
    $count=$count+1;
    $arr=$row;
  }	
  //echo $count."=count<br>";
  if ($count==1) {
    //echo $arr['fldPreis']."<br>";
    $sql="UPDATE tblEinkauf_liste SET fldpreis='".$arr['fldPreis']."' WHERE fldindex=".$rowid;
    //echo $sql."<br>";
    $db->exec($sql);
    //echo $db->lastErrorMsg()."<br>";

  }
  if ($count==0) {
    if ($_POST['fldpreis']<>"") {
      if ($_POST['fldort']<>"") {  
        $sql="INSERT INTO tblartikel (fldBez,fldPreis,fldOrt) VALUES ('".$_POST['fldBez']."','".$_POST['fldpreis']."','".$_POST['fldort']."')";
        //echo $sql."<br>";
        $db->exec($sql);
      }
    }
  }
}

function insertsave($pararray,$listarray,$menu,$show) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Liste</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');
//  echo $db->lastErrorMsg()."<br>";

  $dbtable=$pararray['dbtable'];
  $sql="INSERT INTO ".$dbtable." (";
  foreach ( $listarray as $arrelement ) {
  	 if ($arrelement['fieldsave']<>"NO") {
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
  }
  $sql=substr($sql,0,-1).") VALUES (";
  foreach ( $listarray as $arrelement ) {
  	 if ($arrelement['fieldsave']<>"NO") {
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
  if ($show=="anzeigen") {
    echo "<div class='alert alert-success'>";
    echo $db->lastErrorMsg()."<br>";
    echo "</div>";
  }  
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