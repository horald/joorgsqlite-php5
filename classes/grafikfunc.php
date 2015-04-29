<?php
header("Content-type: image/png");

$db = new SQLite3('../data/joorgsqlite.db');

$etagenid='0';
if (isset($_GET['etagenid'])) {
  $etagenid=$_GET['etagenid'];
}

$sql="SELECT * FROM tbletagen WHERE fldindex=".$etagenid;
$results = $db->query($sql);
while ($row = $results->fetchArray()) {
  $bez=$row['fldbez'];
}

$sql="SELECT * FROM tblorte WHERE fldid_zimmer=".$etagenid." AND fldview='J'";
$results = $db->query($sql);
$index='0';
if (isset($_GET['index'])) {
  $index=$_GET['index'];
}
if ($index<>'0') {
  $bez="Waschkeller";
}

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
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$schwarz);
  imageline ($bild,$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  ImageString ($bild, 5, $row['fldxkoor']+5, $row['fldykoor']+5, $row['fldBez'], $schwarz);
}


//ImageString ($bild, 5, 50, 30, $index, $schwarz);

// Ausgabe des Bildes
imagepng($bild);
$db->close();

?> 