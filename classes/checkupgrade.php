<?php

function checkupgrade() {
  $db = new SQLite3('data/joorgsqlite.db');
  //echo "checkupgrade<br>";
  $ini_array = parse_ini_file("version.txt");
  $versnr=$ini_array['versnr'];
  //echo $versnr."=Vers<br>";
  $sql="SELECT * FROM tblversion ORDER BY fldversion";
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    $arr=$row;
  }
  //echo $arr['fldversion']."=dbvers<br>";
  if ($arr['fldversion']<$versnr) {
    echo "<div class='alert alert-warning'>";
    echo "Upgrade für Vers.-Nr ".$versnr.". Erst Datensätze anpassen.";
    echo "</div>";
    $check="upgrade";
  } else {
  	 $check="ok";
  }
  return $check;
}

?>