<?php

function checkupdatefiles($newvers,$oldvers) {
  $pfad="../sites/update/";	
  $handle=opendir ($pfad);
  
  while($getdatei=readdir($handle)){
    $dat_array[] = $getdatei;
  }
  sort($dat_array);
  
  //echo "Verzeichnisinhalt:".$oldvers."<br>";
  foreach($dat_array as $datei) {
  //while ($datei = readdir ($handle)) {
  	 $substr=substr($datei,-4);
  	 if ($substr==".sql") {
  	 	$substr=substr($datei,6,strlen($datei)-10);
  	 	if ($oldvers<=$substr) {
        //echo "$substr , $datei<br>";
        
        $handfile = fopen($pfad.$datei, "r");
        if ($handfile) {
          $db = new SQLite3('../data/joorgsqlite.db');
          while (($line = fgets($handfile)) !== false) {
          	$db->exec($line);
            //echo $line."<br>";
          }
          $db->close();
          fclose($handfile);
          echo "<div class='alert alert-success'>";
          echo "Daten von ".$datei." eingelesen!";
          echo "</div>";
        } else {
          echo "<div class='alert alert-danger'>";
          echo "Öffnen von ".$datei." fehlgeschlagen!";
          echo "</div>";
        }         
        
      }  
    }   
  }
  closedir($handle);
}

function updatedbversion($newversion,$versdat) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $sql = "INSERT INTO tblversion (fldbez,fldversion,flddatum) VALUES ('Version ".$newversion."','".$newversion."','".$versdat."')";
  $db->exec($sql);
  echo "<div class='alert alert-success'>";
  echo $db->lastErrorMsg()."<br>";
  echo "</div>";
  //echo $sql."<br>";
}

function checktables($tablearray) {
  $anznew=0;
  $anzmodify=0;
  $newtables="";
  $db = new SQLite3('../data/joorgsqlite.db');
  foreach ( $tablearray as $arrelement ) {
  	 //echo $arrelement['tablename']."<br>";
  	 $sql="SELECT name FROM sqlite_master WHERE type='table' AND name='".$arrelement['tablename']."'";
    $results = $db->query($sql);
    while ($row = $results->fetchArray()) {
      $arr=$row;
    }	
    if ($arrelement['tablename']<>$arr['name']) {
    	$sql=$arrelement['sql'];
      if ($newtables=="") {
        $newtables=$arrelement['tablename'];
      } else {
        $newtables=$newtables.",".$arrelement['tablename'];
      } 
  	   $anznew=$anznew+1;
  	   $db->exec($sql);
  	 } else {
  	 }
  }  
  echo "<div class='alert alert-success'>";
  if ($anznew==0) {
  	 echo "Keine Tables angelegt<br>";
  } else {
    echo $anznew." Tables angelegt. (".$newtables.")<br>";
  }
  if ($anzmodify==0) {
  	 echo "Keine Tables geändert";
  } else {
    echo $anzmodify." Tables angelegt. (".$newtables.")";
  }
  echo "</div>";
  
  $db->close();
}

?>