<?php
header("content-type: text/html; charset=utf-8");
session_start();

function exportfunc($pfad,$pararray,$listarray,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
//  $datnam=$_POST['datnam'];
  $datnam="export";
  $slash="/";
  if (substr($_SERVER['DOCUMENT_ROOT'],-1)=="/") {
    $slash="";
  }
  $today = date('Y-m-d-H-i-s');
  $tmpfile = $pfad."mysql-in-".$pararray['dbtable']."-".$today.".tmp";
  //echo $tmpfile."#<br>";
  $datei = fopen($tmpfile,"w");

  $col = "";
  $lincnt = 1;
  $count=count($listarray);
//  echo $count."=lincol<br>";

  foreach ( $listarray as $arrelement ) {
    $tmpcol="";
    switch ( $arrelement['type'] )
    {
      case 'text':
        $tmpcol=$arrelement['dbfield'];
      break;
      case 'date':
        $tmpcol=$arrelement['dbfield'];
      break;
    }
    if ($tmpcol<>"") {
      $lincnt = $lincnt + 1;
      if ($col=="") {
        $col = $tmpcol;
      } else {
        $col = $col . "," . $tmpcol;
      }     
    }
  }

  $qryval = "SELECT ".$col." FROM ".$pararray['dbtable'];
  //echo $qryval."<br>";
  $results = $db->query($qryval);
  $cnt=0;
  while ($linval = $results->fetchArray()) {
    $cnt=$cnt+1;
    if (!$linval) {
      echo " ist leer (INSERT).<br>";    
    } else {
      $val = "'".$linval[0]."'";
      for($lincount = 1; $lincount+1 < $lincnt; $lincount++) {
        $val = $val . ",'".$linval[$lincount]."'";
      }

      $qry = "INSERT INTO ".$pararray['dbtable']."(".$col.") VALUES (".$val.")";
      echo $qry."<br>";
      fwrite($datei, $qry.";\n");
    }  

  }
  fclose($datei);  
  $sqlfile = $pfad."mysql-in-".$datnam."-".$pararray['dbtable']."-".$today.".sql";
  rename($tmpfile,$sqlfile);
  echo "<div class='alert alert-success'>";
  echo $sqlfile."#<br>";
  echo "</div>";
}

?>