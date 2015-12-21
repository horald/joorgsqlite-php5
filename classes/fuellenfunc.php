<?php

function fuellask($menu,$filterarray) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='fuellen.php?fuellen=1&menu=".$menu."' role='form'>";

  $count=sizeof($filterarray);
  echo "<dl>";
  echo "<dt><label >Felder:</label></dt>";
  echo "<select name='dbfield' size='1'>";
  for ( $x = 0; $x < $count; $x++ ) {
    echo "<option style='background-color:#c0c0c0;' value='".$filterarray[$x]['dbfield']."'>".$filterarray[$x]['label']."</option>";
  }
  echo "</select> ";
  echo "</dl>";

  echo "<dd><input type='submit' value='OK' /></dd>";
  echo "</form>";
}

function fuellget($menu,$filterarray,$dbfield) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');
  $count=sizeof($filterarray);
  for ( $x = 0; $x < $count; $x++ ) {
    //echo $x.",".$filterarray[$x]['dbfield'].",".$dbfield."#<br>";
  	 if ($filterarray[$x]['dbfield']==$dbfield) {
  	 	$query="SELECT * FROM ".$filterarray[$x]['dbtable'];
  	 	$seldbfield=$filterarray[$x]['seldbfield'];
  	 }
  }	 
  //echo $seldbfield."<br>";	 
  $results = $db->query($query);
  echo "<form class='form-horizontal' method='post' action='fuellen.php?fuellen=2&menu=".$menu."' role='form'>";
  echo "<dl>";
  echo "<dt><label >Felder:</label></dt>";
  echo "<select name='dbwert' size='1'>";
  while ($row = $results->fetchArray()) {
    echo "<option style='background-color:#c0c0c0;' value='".$row[$seldbfield]."'>".$row[$seldbfield]."</option>";
  }
  echo "</select> "; 
  echo "</dl>";
  echo "<input type='hidden' name='dbfield' value='".$dbfield."' />";
  echo "<dd><input type='submit' value='OK' /></dd>";
  echo "</form>";
  
}

function fuellen($menu,$filterarray,$dbtable,$dbfield,$dbwert) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');
  $query="UPDATE ";
  $count=sizeof($filterarray);
  for ( $x = 0; $x < $count; $x++ ) {
  	 if ($filterarray[$x]['dbfield']==$dbfield) {
  	 	$query="UPDATE ".$dbtable." SET ".$dbfield."='".$dbwert."' WHERE $dbfield=''";
    }
  }
  $qry = $db->exec($query);
  echo "<br>";  
  echo "<div class='alert alert-success'>";
  echo $query."<br>";  
  echo "</div>";
  
}

?>