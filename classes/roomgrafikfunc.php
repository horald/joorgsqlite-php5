<?php
header("Content-type: image/png");
include("dbtool.php");

$db = new SQLite3('../data/joorgsqlite.db');
//$db = dbopen('../','../data/joorgsqlite.db');

$etagenid='0';
if (isset($_GET['etagenid'])) {
  $etagenid=$_GET['etagenid'];
}

$index='0';
if (isset($_GET['index'])) {
  $index=$_GET['index'];
}
if ($index<>'0') {
  $bez="unbekannt";
}

$roomtyp='';
if (isset($_GET['roomtyp'])) {
  $roomtyp=$_GET['roomtyp'];
}
if ($roomtyp=="ETAGEN") {
  $newroomtyp="ZIMMER";
  $sql="SELECT * FROM tbletagen WHERE fldindex=".$etagenid;
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    $bez=$row['fldbez'].",".$roomtyp;
  }
  $sql="SELECT * FROM tblorte WHERE fldid_etage=".$etagenid." AND fldview='J' AND fldo01typ='ZIMMER'";
} 

if ($roomtyp=="ZIMMER") {
  $newroomtyp="MOEBEL";
  $sql="SELECT * FROM tblorte WHERE fldindex=".$index;
  $results = $db->query($sql);
  while ($row = $results->fetchArray()) {
    $bez=$row['fldBez'].",".$roomtyp;
  }
  $sql="SELECT * FROM tblorte WHERE fldid_zimmer=".$index." AND fldview='J' AND fldo01typ='MOEBEL'";
} 

$results = $db->query($sql);

// erstellen eines leeren Bildes mit 400px Breite und 300px Höhe
$breite=600;
$hoehe=460;
$bild = imagecreatetruecolor($breite, $hoehe);

// Hintergrundfarbe erstellen
$hintergrundfarbe = imagecolorallocate ($bild, 250, 150, 0);
imagefill($bild, 0, 0, $hintergrundfarbe);
 
// Farben festlegen
$schwarz = imagecolorallocate($bild, 0, 0, 0);

// Viereck zeichen
// mit folgenden Kordinaten (x1, y1, x2, y2, Farbe);
imagefilledrectangle ($bild, 0, 25, $breite, 30, $schwarz);
imagefilledrectangle ($bild, 0, $hoehe-5, $breite, $hoehe, $schwarz);
imagefilledrectangle ($bild, 0, 25, 5, $hoehe, $schwarz);
imagefilledrectangle ($bild, $breite-5, 25, $breite, $hoehe, $schwarz);
ImageString ($bild, 5, 5, 5, $bez, $schwarz);

while ($row = $results->fetchArray()) {
  $proz=$row['fldproz'];
  if ($proz=="") {
    $proz=0;
  }
  $proz=$proz * 2.5;  
  $rot=255-$proz;
  $gruen=$proz;
  $raumfarbe = imagecolorallocate($bild, $rot, $gruen, 0);
  imagefilledrectangle ($bild, $row['fldxkoor'], $row['fldykoor'], $row['fldxkoor']+$row['fldbreite'], $row['fldykoor']+$row['fldhoehe'], $raumfarbe);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$schwarz);
  imageline ($bild,$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  $roombez=$row['fldBez']." (".$row['fldproz']."%)";
  ImageString ($bild, 5, $row['fldxkoor']+5, $row['fldykoor']+5, $roombez, $schwarz);
}


//ImageString ($bild, 5, 50, 30, $index, $schwarz);

// Ausgabe des Bildes
imagepng($bild);
$db->close();

?> 