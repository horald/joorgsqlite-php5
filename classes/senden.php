<?php
$menu=$_GET['dbtable'];
$dbwhere=$_GET['dbwhere'];
$dbwert=$_GET['dbwert'];
include("../sites/views/".$menu."/showtab.inc.php");
ini_set("allow_url_include", true);
$db = new SQLite3('../data/joorgsqlite.db');
if ($dbwhere<>"") {
  $sql="SELECT * FROM ".$pararray['dbtable']." WHERE ".$dbwhere."'".$dbwert."'";
} else {
  $sql="SELECT * FROM ".$pararray['dbtable'];
}
$results = $db->query($sql);
$datarr = array();
$fldarr = array();
foreach ( $listarray as $arrelement ) {
    switch ( $arrelement['type'] )
    {
      case 'text':
        $fldarr[]=$arrelement['dbfield'];
      break;
      case 'select':
        $fldarr[]=$arrelement['dbfield'];
      break;
      case 'date':
        $fldarr[]=$arrelement['dbfield'];
      break;
      case 'time':
        $fldarr[]=$arrelement['dbfield'];
      break;
      case 'calc':
        $fldarr[]=$arrelement['dbfield'];
      break;
      case 'zahl':
        $fldarr[]=$arrelement['dbfield'];
      break;
    }
}
while ($row = $results->fetchArray()) {
  $datarr[] = $row;
}	
$arr = array('table' => $pararray['dbtable'],
             'field' => $fldarr,
             'data'  => $datarr);
//$arr = array('dbtable' => $_GET['dbtable'],'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);
?>