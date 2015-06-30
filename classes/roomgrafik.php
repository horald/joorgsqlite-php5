<?php
include("bootstrapfunc.php");
include("dbtool.php");
bootstraphead();
bootstrapbegin("Grafik");
$id=$_GET['id'];
$index='0';
if (isset($_GET['index'])) {
  $index=$_GET['index'];
}
$etagenid='0';
if (isset($_GET['etagenid'])) {
  $etagenid=$_GET['etagenid'];
}

$roomtyp='';
if (isset($_GET['roomtyp'])) {
  $roomtyp=$_GET['roomtyp'];
}

//echo $index."=index<br>";
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<a href='showtab.php?menu=etagen&id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a><br><br>";
echo "<img src='roomgrafikfunc.php?index=".$index."&etagenid=".$etagenid."&roomtyp=".$roomtyp."' usemap='#Landkarte' />"; 
$db = dbopen('../','../data/joorgsqlite.db');

if ($roomtyp=="ETAGEN") {
  $sql="SELECT * FROM tblorte WHERE fldid_etage=".$etagenid." AND fldview='J' AND fldo01typ='ZIMMER'";
}
if ($roomtyp=="ZIMMER") {
  $sql="SELECT * FROM tblorte WHERE fldid_zimmer=".$index." AND fldview='J' AND fldo01typ='MOEBEL'";
}
$results = dbquery('../',$db,$sql);
echo "<map name='Landkarte'>";
echo "<br>";
while ($row = dbfetch('../',$results)) {
  $breite=$row['fldxkoor']+$row['fldbreite'];
  $hoehe=$row['fldykoor']+$row['fldhoehe'];	
  //echo $row['fldBez'].",".$row['fldxkoor'].",".$row['fldykoor'].",".$breite.",".$hoehe."=x,y,b,h<br>";
  echo "  <area shape='rect' coords='".$row['fldxkoor'].",".$row['fldykoor'].",".$breite.",".$hoehe."'";
  echo "    href='roomgrafik.php?id=".$id."&index=".$row['fldindex']."&roomtyp=ZIMMER' alt='".$row['fldBez']."' title='".$row['fldBez']."'>";
}
echo "</map>";
bootstrapend();
?>