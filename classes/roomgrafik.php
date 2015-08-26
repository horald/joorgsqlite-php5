<?php
include("bootstrapfunc.php");
include("dbtool.php");
bootstraphead();
bootstrapbegin("Grafik");
$id=$_GET['id'];
$menu=$_GET['menu'];
$etagenid='0';
if (isset($_GET['etagenid'])) {
  $etagenid=$_GET['etagenid'];
}
$roomid='0';
if (isset($_GET['roomid'])) {
  $roomid=$_GET['roomid'];
}
$moebelid='0';
if (isset($_GET['moebelid'])) {
  $moebelid=$_GET['moebelid'];
}
$roomtyp='';
if (isset($_GET['roomtyp'])) {
  $roomtyp=$_GET['roomtyp'];
}

//echo $index."=index<br>";
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<a href='roomkoor.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Koor</a> ";
echo "<a href='showtab.php?menu=etagen&id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a><br><br>";
echo "<img src='roomgrafikfunc.php?etagenid=".$etagenid."&roomid=".$roomid."&moebelid=".$moebelid."&roomtyp=".$roomtyp."' usemap='#Landkarte' />"; 
$db = dbopen('../','../data/joorgsqlite.db');

if ($roomtyp=="ETAGEN") {
  $newroomtyp="ZIMMER";
  $sql="SELECT * FROM tblorte WHERE fldid_etage=".$etagenid." AND fldview='J' AND fldo01typ='ZIMMER'";
}
if ($roomtyp=="ZIMMER") {
  $newroomtyp="MOEBEL";
  $sql="SELECT * FROM tblorte WHERE fldid_zimmer=".$roomid." AND fldview='J' AND fldo01typ='MOEBEL'";
}
if ($roomtyp=="MOEBEL") {
  $newroomtyp="FAECHER";
  $sql="SELECT * FROM tblorte WHERE fldid_moebel=".$moebelid." AND fldview='J' AND fldo01typ='FAECHER'";
}
$results = dbquery('../',$db,$sql);
echo "<map name='Landkarte'>";
//echo "<br>";
//echo $sql."=query<br>";
echo "  <area shape='rect' coords='0,0,600,25'";
if ($roomtyp=="ETAGEN") {
  echo "    href='showtab.php?id=".$id."&menu=".$menu."' alt='' title='unbekannt'>";
}  
if ($roomtyp=="ZIMMER") {
  //$sqlroom="SELECT * FROM tblorte WHERE fldid_zimmer=".$roomid;
  //$resroom = dbquery('../',$db,$sqlroom);
  //if ($rowroom = dbfetch('../',$resroom)) {
  //  $etagenid=$rowroom['fldid_etage'];
  //}
  echo "    href='roomgrafik.php?id=".$id."&etagenid=".$etagenid."&roomtyp=ETAGEN&menu=".$menu."' alt='' title='unbekannt'>";
}
if ($roomtyp=="MOEBEL") {
  //$roomid=0;	
  //$sqlroom="SELECT * FROM tblorte WHERE fldid_moebel=".$index;
  //$resroom = dbquery('../',$db,$sqlroom);
  //if ($rowroom = dbfetch('../',$resroom)) {
  //  $roomid=$rowroom['fldid_zimmer'];
  //}
  echo "    href='roomgrafik.php?id=".$id."&etagenid=".$etagenid."&roomid=".$roomid."&roomtyp=ZIMMER&menu=".$menu."' alt='' title='unbekannt'>";
}
while ($row = dbfetch('../',$results)) {
  $breite=$row['fldxkoor']+$row['fldbreite'];
  $hoehe=$row['fldykoor']+$row['fldhoehe'];	
  //echo $row['fldBez'].",".$row['fldxkoor'].",".$row['fldykoor'].",".$breite.",".$hoehe."=x,y,b,h<br>";
  if ($newroomtyp=="ZIMMER") {
    echo "  <area shape='rect' coords='".$row['fldxkoor'].",".$row['fldykoor'].",".$breite.",".$hoehe."'";
    echo "    href='roomgrafik.php?id=".$id."&roomid=".$row['fldindex']."&roomtyp=".$newroomtyp."&etagenid=".$etagenid."&menu=".$menu."' alt='".$row['fldBez']."' title='".$row['fldBez']."'>";
  }	
  if ($newroomtyp=="MOEBEL") {
    echo "  <area shape='rect' coords='".$row['fldxkoor'].",".$row['fldykoor'].",".$breite.",".$hoehe."'";
    echo "    href='roomgrafik.php?id=".$id."&moebelid=".$row['fldindex']."&roomid=".$roomid."&roomtyp=".$newroomtyp."&etagenid=".$etagenid."&menu=".$menu."' alt='".$row['fldBez']."' title='".$row['fldBez']."'>";
  }	
}
echo "</map>";
bootstrapend();
?>