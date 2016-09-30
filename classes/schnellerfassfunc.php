<?php
header("content-type: text/html; charset=utf-8");

function schnellerfass_abfrage($listarray,$menu) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='schnellerfass.php?schnellerfass=1&menu=".$menu."'>";
  foreach ( $listarray as $arrelement ) {
    if ($arrelement['fieldsave']<>"NO") {
      $default="";
      if ($arrelement['default']!="") {
        $default=$arrelement['default'];
      }
      if ($arrelement['schnellerfass']=="key") {
        echo "<input type='hidden' name='key' value='".$arrelement['dbfield']."'/>";
	  }
      switch ( $arrelement['type'] )
      {
        case 'text':
          echo "<dl>";
          echo "<dt><label >".$arrelement['label'].":</label></dt>";
          echo "<dd><input type='text' name='".$arrelement['dbfield']."' value='".$default."'/></dd>";
          echo "</dl>";
          break;
      }
    }
  }
  echo "<input type='checkbox' name='chkanzeigen' value='anzeigen'> Speichern anzeigen<br>";
  echo "<dd><input type='submit' name='submit' value='Hinzufügen' /> ";
  echo "<input type='submit' name='submit' value='Aktualisieren' /> ";
  echo "<input type='submit' name='submit' value='vermindern' /></dd>";
  echo "</form>";  
}

function schnellerfass_verarbeiten($pararray,$listarray,$submit,$key,$keyvalue,$show,$autoinc_start,$autoinc_step) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $dbtable=$pararray['dbtable'];
  $select="SELECT * FROM ".$dbtable." WHERE ".$key."='".$keyvalue."'";
  $results = $db->query($select);
  if ($row = $results->fetchArray()) {
/*
    //echo "UPDATE<br>";
    $sql="UPDATE ".$dbtable." SET ";
    foreach ( $listarray as $arrelement ) {
  	   if ($arrelement['fieldsave']<>"NO") {
        switch ( $arrelement['schnellerfass'] )
        {
        	 $anz=0; 
          case 'anz':
            switch ( $arrelement['schnellerfass'] ) {
              case 'Hinzufügen':	
                $anz=$row[$arrelement['dbfield']]+$_POST[$arrelement['dbfield']];
                break;
              case 'Aktualisieren':	
                $anz=$_POST[$arrelement['dbfield']];
                break;
              case 'vermindern':	
                $anz=$row[$arrelement['dbfield']]-$_POST[$arrelement['dbfield']];
                break;
            }
            $sql=$sql.$arrelement['dbfield']."='".$anz."', ";
            break;  
        }
      }
    } 
    $sql=substr($sql,0,-2);
    $sql=$sql." WHERE fldindex=".$row['fldindex'];
*/    
  } else {
/*
    $sqlid="SELECT * FROM tblindex WHERE fldtable='".$pararray['dbtable']."'";
    //echo $sqlid."<br>";
    $resid = $db->query($sqlid);
    if ($rowid = $resid->fetchArray()) {
      $newrowid=$rowid['fldid'] + $autoinc_step;
      //echo $newrowid."=newrowid<br>";
    } else {
      $newrowid=$autoinc_start;  
    }

    //echo "INSERT<br>";
    $sql="INSERT INTO ".$dbtable." (".$pararray['fldindex'].",";
    foreach ( $listarray as $arrelement ) {
  	  if ($arrelement['fieldsave']<>"NO") {
	    $sql=$sql.$arrelement['dbfield'].",";
      }
    } 
    $sql=substr($sql,0,-1);
    if ($pararray['dbsyncnr']=="J") {
   	  $sql=$sql.",flddbsyncnr";
  	  $sql=$sql.",fldtimestamp";
    }  
    $sql=$sql.") VALUES (".$newrowid.",";
    foreach ( $listarray as $arrelement ) {
  	  if ($arrelement['fieldsave']<>"NO") {
        $sql=$sql."'".$_POST[$arrelement['dbfield']]."',";
	  }
	}  
    $sql=substr($sql,0,-1);
    if ($pararray['dbsyncnr']=="J") {
  	  $sql=$sql.",".$autoinc_start;
  	  $sql=$sql.",datetime('now', 'localtime')";
    }
    $sql=$sql.")";
*/	
  }

  switch ( $submit )
      {
        case 'Hinzufügen':
          echo "<div class='alert alert-success'>";
		  echo $sql."=hinzu<br>"; 
		  echo "</div>";
          break;
        case 'Aktualisieren':
          echo "<div class='alert alert-success'>";
		  echo "act<br>"; 
		  echo "</div>";
          break;
        case 'vermindern':
          echo "<div class='alert alert-success'>";
		  echo "weg<br>"; 
		  echo "</div>";
          break;
      }
//  $db->exec($sql);

  if ($show=="anzeigen") {
    echo "<div class='alert alert-success'>";
    echo $sql."<br>";
    echo $db->lastErrorMsg()."<br>";
    echo "</div>";
  }  
	  
}

?>