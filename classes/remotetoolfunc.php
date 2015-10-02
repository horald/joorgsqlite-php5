<?php

function remoteauswahl() {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<form class='form-horizontal' method='post' action='remotetool.php'>";
//  echo "<input type='hidden' name='status' value='remote'/>"; 
  echo "<dd><input type='text' name='urladr' value='localhost/android'/></dd>";

  echo "<select name='status' size='1'>";
  echo "<option style='background-color:#c0c0c0;' value='struc'>Structur abfragen</option>";
  echo "<option style='background-color:#c0c0c0;' value='create'>Tabelle erzeugen</option>";
  echo "</select> ";

  $results = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
  echo "<select name='dbtable' size='1'>";
  while ($linval = $results->fetchArray()) {
    echo "<option style='background-color:#c0c0c0;' >".$linval['name']."</option>";
  }
  echo "</select> ";
  
  echo "<dd><input type='submit' value='Ausführen' /></dd>";
  echo "</form>";
 
}

function remoteaufruf($urladr,$dbtable) {
  $website="http://".$urladr."/own/joorgsqlite/classes/remotetoolremote.php?dbtable=".$dbtable;
  echo "<div class='alert alert-warning'>";
  echo "Wenn Sie hier keine Daten sehen, ist die Verbindung fehlgeschlagen. Bitte erneut versuchen.<br>";
  echo "Url:".$urladr;
  echo "</div>";
  include($website);

}

?>