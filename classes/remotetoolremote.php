<?php
include("bootstrapfunc.php");
$dbtable=$_GET['dbtable'];
echo "<div class='alert alert-success'>";
echo "Datenstruktur von: ".$dbtable;
echo "</div>";

$db = new SQLite3('../data/joorgsqlite.db');
$results = $db->query("SELECT name,sql FROM sqlite_master WHERE type='table' AND name='".$dbtable."'");
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<th>Fieldname</th>";
echo "<th>Fieldtyp</th>";
echo "</tr>";
if ($row = $results->fetchArray()) {
  $colstr=$row['sql'];
  $pos = strpos($colstr, '(', 0);
  $colstr=substr($colstr,$pos+1,-1); 
  $colarr = explode(",", $colstr);
  foreach ( $colarr as $arrstr ) {
    $arrstr=ltrim($arrstr);
  	 $pos=strpos($arrstr,' ',0);
  	 $colstr=substr($arrstr,0,$pos);
  	 $typstr=substr($arrstr,$pos);
    $colstr=str_replace('"','',$colstr);
    echo "<tr>";
    echo "<td>".$colstr."</td>";
    echo "<td>".$typstr."</td>";
    echo "</tr>";
  }
}
echo "</table>";
?>