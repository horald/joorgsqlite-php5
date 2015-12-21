<?php
include("bootstrapfunc.php");
include("../config.php");
$menu=$_GET['menu'];
$pfad=$_GET['pfad'];
$dbtable=$_GET['dbtable'];
$fldindex=$_GET['fldindex'];
$nuranzeigen=$_GET['nuranzeigen'];
$urladr=$_GET['urladr'];
echo "<div class='alert alert-success'>";
echo "Daten von ".$pfad." holen.";
echo "</div>";

$db = new SQLite3('../data/joorgsqlite.db');

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

$website="http://".$pfad."sync.php?menu=".$menu;
echo "<form class='form-horizontal' method='post' action='".$website."'>";
echo "<input type='hidden' name='status' value='empfangen'/>"; 
echo "<input type='hidden' name='nuranzeigen' value='".$nuranzeigen."'/>"; 
echo "<input type='hidden' name='urladr' value='".$urladr."'/>"; 
echo "<input type='hidden' name='timestamp' value='".$timestamp."'/>"; 

$qryval = "SELECT ".$col." FROM ".$dbtable." WHERE fldtimestamp>'".$timestamp."' AND flddbsyncnr=".$autoinc_start;
$results = $db->query($qryval);
//echo "<input type='hidden' name='sql' value='".$qryval."'/>";
$datcnt=0;
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
    $datcnt=$datcnt+1;
    $index=$linval[$fldindex];
    $updsql="UPDATE ".$dbtable." SET ".$updsql." WHERE ".$fldindex."=".$index;
    $inssql = "INSERT INTO ".$dbtable."(".$col.") VALUES (".$val.");";
    //echo $updsql."<br>";
    //echo "<input type='hidden' name='sqlarr".$datcnt."' value='".$qry."'/>";
    echo "<input type='hidden' name='index".$datcnt."' value='".$index."'/>";
    echo "<input type='hidden' name='updsql".$datcnt."' value='".$updsql."'/>";
    echo "<input type='hidden' name='inssql".$datcnt."' value='".$inssql."'/>";
  }  
} 
echo "<input type='hidden' name='datcnt' value='".$datcnt."'/>";


echo "<dd><input type='submit' value='Daten austauschen' /></dd>";
echo "</form>";

if ($nuranzeigen<>"anzeigen") {
  if ($timestamp=="") {
    $sql="INSERT INTO tblsyncstatus (fldtable,fldtimestamp) VALUES ('".$dbtable."',CURRENT_TIMESTAMP)";
  } else {
    $sql="UPDATE tblsyncstatus SET fldtimestamp=CURRENT_TIMESTAMP WHERE fldtable='".$dbtable."'";
  }  
  $query = $db->exec($sql);
}

?>