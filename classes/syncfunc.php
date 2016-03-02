<?php

function syncauswahl($menu) {

  echo "<form class='form-horizontal' method='post' action='sync.php?menu=".$menu."'>";
  echo "<input type='hidden' name='status' value='remote'/>"; 
  echo "<dd><input type='text' name='urladr' value='localhost/android'/></dd>";
  echo "<dd><input type='checkbox' name='nuranzeigen' value='anzeigen'/> nur anzeigen</dd>";
  echo "<dd><input type='submit' value='Austausch starten' /></dd>";
  echo "</form>";
}

function syncremote($menu,$dbtable,$urladr,$pfad,$fldindex,$nuranzeigen) {
//  $website="http://".$urladr.":8080/own/joorgsqlite/classes/senden.php?dbtable=".$menu;
//  $website="http://localhost/android/own/joorgsqlite/classes/syncremote.php?menu=".$menu."&dbtable=".$dbtable."&pfad=".$pfad;
  $website="http://".$urladr."/own/joorgsqlite/classes/syncremote.php?menu=".$menu."&dbtable=".$dbtable."&pfad=".$pfad."&fldindex=".$fldindex."&nuranzeigen=".$nuranzeigen."&urladr=".$urladr;
  echo "<div class='alert alert-warning'>";
  echo "Wenn Sie hier keinen Button 'Daten austauschen' sehen, ist die Verbindung fehlgeschlagen. Bitte erneut versuchen.<br>";
  echo "Url:".$urladr;
  echo "</div>";
//echo $website."<br>";
  include($website);
} 

function syncempfangen($menu,$urladr,$pfad,$sql,$datcnt,$dbtable,$fldindex,$nuranzeigen,$timestamp,$autoinc_start) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<div class='alert alert-success'>";
  echo $datcnt." Datensätze empfangen am ".$timestamp."<br>";
//  echo $sql;
  echo "</div>";

  //timestamp ermitteln
  $qryval = "SELECT * FROM tblsyncstatus WHERE fldtable='".$dbtable."'";
  $results = $db->query($qryval);
  if ($linval = $results->fetchArray()) {
    $timestamp=$linval['fldtimestamp'];
  } else {
    $timestamp="";
  }	

  $col = "";
  $lincnt = 1;
  $count = 0;
  $results = $db->query("SELECT name,sql FROM sqlite_master WHERE type='table' AND name='".$dbtable."'");
  $arrcol = array();
  if ($row = $results->fetchArray()) {
    $colstr=$row['sql'];
    $pos = strpos($colstr, '(', 0);
    $colstr=substr($colstr,$pos+1,-1); 
    $colarr = explode(",", $colstr);
    $count = count($colarr);
    foreach ( $colarr as $arrstr ) {
  	   $arrstr=ltrim($arrstr);
  	   $pos=strpos($arrstr,' ',0);
  	   $colstr=substr($arrstr,0,$pos);
      $colstr=str_replace('"','',$colstr);
      $arrcol[] = $colstr;
      $lincnt = $lincnt + 1;
      if ($col=="") {
        $col=$colstr;
      } else {	
        $col=$col.",".$colstr;
      }    
    }
  }	
 
//  $website="http://".$pfad."sync.php?menu=".$menu;
//  $website="http://".$urladr."/own/joorgsqlite/classes/syncremote.php?menu=".$menu."&dbtable=".$dbtable."&pfad=".$pfad."&fldindex=".$fldindex."&nuranzeigen=".$nuranzeigen;
  $website="http://".$urladr."/own/joorgsqlite/classes/syncsenden.php?menu=".$menu."&pfad=".$pfad."&dbtable=".$dbtable."&fldindex=".$fldindex;
  //echo $website."=website<br>";
  echo "<form class='form-horizontal' method='post' action='".$website."'>";
  echo "<input type='hidden' name='status' value='senden'/>"; 
  echo "<input type='hidden' name='timestamp' value='".$timestamp."'/>";
  echo "<dd><input type='checkbox' name='nuranzeigen' value='anzeigen'/> nur anzeigen</dd>";

  $qryval = "SELECT ".$col." FROM ".$dbtable." WHERE fldtimestamp>'".$timestamp."' AND flddbsyncnr=".$autoinc_start;
  //echo $qryval."<br>";
  $results = $db->query($qryval);
  //echo "<input type='hidden' name='sql' value='".$qryval."'/>";
  $datcntloc=0;
  while ($linval = $results->fetchArray()) {
    if (!$linval) {
      echo " ist leer (INSERT).<br>";    
    } else {
      $val = "#".$linval[0]."#";
      $updsql=$arrcol[0]."=#".$linval[0]."#";
      for($lincount = 1; $lincount+1 < $lincnt; $lincount++) {
        $val = $val . ",#".$linval[$lincount]."#";
        $updsql = $updsql.",".$arrcol[$lincount]."=#".$linval[$lincount]."#";
      }
      $datcntloc=$datcntloc+1;
      $index=$linval[$fldindex];
      $updsql="UPDATE ".$dbtable." SET ".$updsql." WHERE ".$fldindex."=".$index;
      $inssql = "INSERT INTO ".$dbtable."(".$col.") VALUES (".$val.");";
      //echo $updsql."<br>";
      //echo "<input type='hidden' name='sqlarr".$datcnt."' value='".$qry."'/>";
      echo "<input type='hidden' name='index".$datcntloc."' value='".$index."'/>";
      echo "<input type='hidden' name='updsql".$datcntloc."' value='".$updsql."'/>";
      echo "<input type='hidden' name='inssql".$datcntloc."' value='".$inssql."'/>";
    }   
  } 
  echo "<input type='hidden' name='datcnt' value='".$datcntloc."'/>";

  echo "<dd><input type='submit' value='Daten senden' /></dd>";
  echo "</form>";
 
  for( $i=1; $i <= $datcnt; $i++ ) {
    echo "<div class='alert alert-success'>";
    $index=$_POST['index'.$i];
    $qryval = "SELECT * FROM ".$dbtable." WHERE ".$fldindex."=".$index;
    $results = $db->query($qryval);
    if ($linval = $results->fetchArray()) {
      $sql=$_POST['updsql'.$i];
    } else {
      $sql=$_POST['inssql'.$i];
    }	
    $sql=str_replace("#","'",$sql);
    echo $sql."<br>";
    echo "</div>";
    if ($nuranzeigen<>"anzeigen") {
      $query = $db->exec($sql);
    }  
  }

}


function syncfertig($nuranzeigen,$dbtable) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $timestamp=$_POST['timestamp'];
  if ($nuranzeigen<>"anzeigen") {
    if ($timestamp=="") {
      $sql="INSERT INTO tblsyncstatus (fldtable,fldtimestamp) VALUES ('".$dbtable."',CURRENT_TIMESTAMP)";
    } else {
      $sql="UPDATE tblsyncstatus SET fldtimestamp=CURRENT_TIMESTAMP WHERE fldtable='".$dbtable."'";
    }  
    $query = $db->exec($sql);
  }
  	
  echo "<div class='alert alert-success'>";
  //echo $nuranzeigen."=nuranzeigen<br>";
  //echo $sql."=sql<br>";
  if ($nuranzeigen<>"anzeigen") {
    echo "Daten gesendet.<br>";
    echo "Datenaustausch abgeschlossen am ".$timestamp;
  } else {
    echo "Datenaustausch angezeigt vom ".$timestamp;
  }  
  echo "</div>";
}

?>