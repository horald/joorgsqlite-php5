<?php
header("Content-type: image/png");

$breite=600;
$hoehe=460;
$bild = imagecreatetruecolor($breite, $hoehe);

// Hintergrundfarbe erstellen
//$hintergrundfarbe = imagecolorallocate ($bild, 250, 150, 0);
$hintergrundfarbe = imagecolorallocate ($bild, 250, 250, 250);
imagefill($bild, 0, 0, $hintergrundfarbe);

// Farben festlegen
$gruen = imagecolorallocate($bild, 0, 255, 0);
$rot = imagecolorallocate($bild, 255, 0, 0);

imagefilledrectangle ($bild, 20, 450, 30, 40, $gruen);
imagefilledrectangle ($bild, 40, 450, 50, 50, $rot);

// Ausgabe des Bildes
imagepng($bild);


?>