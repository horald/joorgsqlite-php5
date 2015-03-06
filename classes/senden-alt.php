<?php
$menu=$_POST['menu'];
//echo $menu."=menu<br>";
$menu="shopping";
include("../sites/views/".$menu."/showtab.inc.php");
ini_set("allow_url_include", true);
$db = new SQLite3('../data/joorgsqlite.db');
$tablename="tblEinkauf_liste";
$sql="SELECT * FROM tblEinkauf_liste";
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
    }
}
while ($row = $results->fetchArray()) {
  $datarr[] = $row;
}	
$arr = array('table' => $pararray['dbtable'],
             'field' => $fldarr,
             'data'  => $datarr);
//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);
?>