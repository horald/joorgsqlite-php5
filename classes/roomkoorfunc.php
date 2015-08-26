<?php
header("Content-type: image/png");
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

for ($i = 50; $i <= 450; $i=$i+25) {
  ImageString ($bild, 4, 10, $i-15, $i, $schwarz);
  imageline ($bild,10, $i,590, $i,$schwarz);
}

for ($i = 50; $i <= 550; $i=$i+25) {
  ImageString ($bild, 4, $i, 35, $i, $schwarz);
  imageline ($bild,$i, 35,$i, 450,$schwarz);
}

// Ausgabe des Bildes
imagepng($bild);
?>