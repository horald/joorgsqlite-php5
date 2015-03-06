<?php
include("bootstrapfunc.php");
//include("insertfunc.php");
$menu=$_GET['menu'];
//echo $menu."<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin("Einkaufsliste");
echo "<a href='showtab.php?menu=shopping' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 

$db = new SQLite3('../data/joorgsqlite.db');
$results = $db->query('SELECT * FROM tbleinkaufsliste');
while ($row = $results->fetchArray()) {
  $sql="INSERT INTO tblEinkauf_liste (fldBez) VALUES ('".$row['fldbez']."')";
  //$sql=base64_encode(serialize($sql));
  //echo $sql."<br>"; 
  //echo "<meta http-equiv='refresh' content='2; URL=http://localhost/own/joorgportal/classes/transfer.php?sql=".base64_encode(serialize($sql))."'>";  
  echo "<div class='alert alert-success'>";
  echo "Daten '".$row['fldbez']."' austauschen.";
  echo "</div>";
}	
//echo "<meta http-equiv='refresh' content='0; URL=showtab.php?menu=shopping'>";  

bootstrapend();
?>
