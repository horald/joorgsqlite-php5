<?php
include("bootstrapfunc.php");
$menu=$_GET['menu'];
//echo $menu."=menu<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);
echo "<a href='../index.php'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Liste</a> ";
$db = new SQLite3('../data/joorgsqlite.db');
$sql="SELECT * FROM ".$pararray['dbtable'];
echo "<br>";
//echo $sql."<br>";
$results = $db->query($sql);
while ($row = $results->fetchArray()) {
  $sqlpreis="SELECT * FROM tblartikel WHERE fldBez = '".$row['fldBez']."' and fldOrt='".$row['fldort']."'";
  //echo $sqlpreis."<br>";
  $respreis = $db->query($sqlpreis);
  $count=0;
  while ($rowpreis = $respreis->fetchArray()) {
    $count=$count+1;
    $sqlupdate="UPDATE ".$pararray['dbtable']." SET fldpreis=".$rowpreis['fldPreis']." WHERE fldindex=".$row['fldindex'];
    $db->exec($sqlupdate);
    echo "<div class='alert alert-success'>";
    echo $row['fldBez'].",".$row['fldort']."<br>";
    echo $sqlupdate."<br>";
    echo "</div>";
  }
  if ($count==0) {
    if (floatval($row['fldpreis'])<>0) {
      $sqlinsert="INSERT INTO tblartikel (fldBez,fldOrt,fldAnz,fldPreis) VALUES ('".$row['fldBez']."','".$row['fldort']."',1,'".$row['fldpreis']."')";
      $db->exec($sqlinsert);
      echo "<div class='alert alert-success'>";
      echo $sqlinsert."<br>";
      echo "</div>";
    }
  }
}	
bootstrapend();
?>