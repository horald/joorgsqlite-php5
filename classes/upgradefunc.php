<?php

function checktables($tablearray) {
  echo "<br>";
  $db = new SQLite3('../data/joorgsqlite-handy.db');
  foreach ( $tablearray as $arrelement ) {
  	 echo $arrelement['tablename']."<br>";
  	 $sql="SELECT name FROM sqlite_master WHERE type='table' AND name='".$arrelement['tablename']."'";
    $results = $db->query($sql);
    while ($row = $results->fetchArray()) {
      $arr=$row;
    }	
    if ($arrelement['tablename']<>$arr['name']) {
    	$sql=$arrelement['sql'];
  	   echo $sql."<br>";
  	   $db->exec($sql);
  	 }
  }  
  $db->close();
}

?>