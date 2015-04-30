<?php
  $dir=getcwd();

  $file = $dir.'/install/joorgsqlite.db';
  $newfile = $dir.'/data/joorgsqlite.db';

  if (!copy($file, $newfile)) {
    echo "copy $file schlug fehl...\n";
    echo "<div class='alert alert-error'>";
    echo "Installation der Datenbank (".$file.") fehlgeschlagen!";
    echo "</div>";
  } else {
    echo "<div class='alert alert-success'>";
    echo "Datenbank erfolgreich installiert. (".$newfile.")";
    echo "</div>";
  }
?>