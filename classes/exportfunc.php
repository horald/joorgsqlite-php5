<?php
header("content-type: text/html; charset=utf-8");
session_start();

function exportfunc($pfad,$pararray,$listarray,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $datnam="export";
  $slash="/";
  if (substr($_SERVER['DOCUMENT_ROOT'],-1)=="/") {
    $slash="";
  }
  $today = date('Y-m-d-H-i-s');
  $tmpfile = $pfad."mysql-in-".$pararray['dbtable']."-".$today.".tmp";
  $datei = fopen($tmpfile,"w");

  $col = "";
  $lincnt = 1;
  $count = 0;

  $results = $db->query("SELECT name,sql FROM sqlite_master WHERE type='table' AND name='".$pararray['dbtable']."'");
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
      $lincnt = $lincnt + 1;
      if ($col=="") {
        $col=$colstr;
      } else {	
        $col=$col.",".$colstr;
      }  
    }
  }	

  $qryval = "SELECT ".$col." FROM ".$pararray['dbtable'];
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

      $qry = "INSERT INTO ".$pararray['dbtable']."(".$col.") VALUES (".$val.");";
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