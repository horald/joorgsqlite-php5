<?php

function fuellask($menu,$filterarray) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<form class='form-horizontal' method='post' action='fuellen.php?fuellen=1&menu=".$menu."' role='form'>";

  $count=sizeof($filterarray);
  echo "<dl>";
  echo "<dt><label >Felder:</label></dt>";
  echo "<select name='fuell' size='1'>";
  for ( $x = 0; $x < $count; $x++ ) {
    echo "<option style='background-color:#c0c0c0;' value='".$filterarray[$x]['dbfield]."'>".$filterarray[$x]['label']."</option>";
  }
  echo "</select> ";
  echo "</dl>";

  echo "<dd><input type='submit' value='OK' /></dd>";
  echo "</form>";
}

function fuellen($menu,$pararray) {
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  $db = new SQLite3('../data/joorgsqlite.db');
  $query="UPDATE ";

}

?>