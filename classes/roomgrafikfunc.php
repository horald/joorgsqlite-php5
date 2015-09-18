<?php
header("Content-type: image/png");
include("dbtool.php");

//$db = new SQLite3('../data/joorgsqlite.db');
$db = dbopen('../','../data/joorgsqlite.db');

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

if ($roomtyp=="ETAGEN") {
  $newroomtyp="ZIMMER";
  $bez="unbekannt";
//  $sql="SELECT * FROM tbletagen WHERE fldindex=".$etagenid;
  $sql="SELECT * FROM tblorte WHERE fldindex=".$etagenid;
  $results = dbquery('../',$db,$sql);
  while ($row = dbfetch('../',$results)) {
    $bez=$row['fldBez'].",".$roomtyp;
  }
  $anzbez="0 Moebel";
  $sql="SELECT * FROM tblorte WHERE fldid_etage=".$etagenid." AND fldview='J' AND fldo01typ='ZIMMER'";
} 
if ($roomtyp=="ZIMMER") {
  $newroomtyp="MOEBEL";
  $bez="unbekannt";
  $sql="SELECT * FROM tblorte WHERE fldindex=".$roomid;
  $results = dbquery('../',$db,$sql);
  while ($row = dbfetch('../',$results)) {
    $bez=$row['fldBez'].",".$roomtyp;
    $raumkurz=$rowroom['fldkurz'];
  }
//  $sqlroom="SELECT * FROM tblorte WHERE fldindex=".$index;
//  $resroom = dbquery('../',$db,$sqlroom);
//  if ($rowroom = dbfetch('../',$resroom)) {
//    $raumkurz=$rowroom['fldkurz'];
//  }
  $sql="SELECT * FROM tblorte WHERE fldid_zimmer=".$roomid." AND fldview='J' AND fldo01typ='MOEBEL'";
} 
if ($roomtyp=="MOEBEL") {
  $newroomtyp="FAECHER";
  $bez="unbekannt";
  $sql="SELECT * FROM tblorte WHERE fldindex=".$moebelid;
  $results = dbquery('../',$db,$sql);
  while ($row = dbfetch('../',$results)) {
    $bez=$row['fldBez'].",".$roomtyp;
//    $idzimmer=$row['fldid_zimmer'];
    $moebelkurz=$rowroom['fldkurz'];
  }
  $sqlroom="SELECT * FROM tblorte WHERE fldindex=".$roomid;
  $resroom = dbquery('../',$db,$sqlroom);
  if ($rowroom = dbfetch('../',$resroom)) {
    $raumkurz=$rowroom['fldkurz'];
    $bez=$rowroom['fldBez'].",".$bez;
  }
  $sql="SELECT * FROM tblorte WHERE fldid_moebel=".$moebelid." AND fldview='J' AND fldo01typ='FAECHER'";
} 

//$results = $db->query($sql);
$results = dbquery('../',$db,$sql);

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

//while ($row = $results->fetchArray()) {
while ($row = dbfetch('../',$results)) {
  $proz=$row['fldproz'];
  $prozbez=$proz;
  if ($proz=="") {
    $proz=0;
	$prozbez=0;
  }
  $proz=$proz * 2.5;  
  $rot=255-$proz;
  $gruen=$proz;
  
  if ($roomtyp=="ETAGEN") {
    $sqlanz="SELECT count(*) AS anz FROM tblorte WHERE fldid_zimmer=".$row['fldindex']." AND fldview='J' AND fldo01typ='MOEBEL'";
    $resanz = dbquery('../',$db,$sqlanz);
    if ($rowanz = dbfetch('../',$resanz)) {
      $anzbez=$rowanz['anz']." Moebel";
    }
  }	
  if ($roomtyp=="ZIMMER") {
    $sqlanz="SELECT count(*) AS anz FROM tblorte WHERE fldid_moebel=".$row['fldindex']." AND fldview='J' AND fldo01typ='FAECHER'";
    $resanz = dbquery('../',$db,$sqlanz);
    if ($rowanz = dbfetch('../',$resanz)) {
      $anzbez=$rowanz['anz']." Faecher";
    }
  }	
  
  $raumfarbe = imagecolorallocate($bild, $rot, $gruen, 0);
  imagefilledrectangle ($bild, $row['fldxkoor'], $row['fldykoor'], $row['fldxkoor']+$row['fldbreite'], $row['fldykoor']+$row['fldhoehe'], $raumfarbe);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$schwarz);
  imageline ($bild,$row['fldxkoor']+$row['fldbreite'],$row['fldykoor'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  imageline ($bild,$row['fldxkoor'],$row['fldykoor']+$row['fldhoehe'],$row['fldxkoor']+$row['fldbreite'],$row['fldykoor']+$row['fldhoehe'],$schwarz);
  $roombez=$row['fldBez']." (".$prozbez."%)";
  $roomkurz="";
  if ($roomtyp=="ETAGEN") {
    $roomkurz="(".$row['fldkurz'].")";
  }	
  if ($roomtyp=="ZIMMER") {
    $roomkurz="(".$raumkurz."/".$row['fldkurz'].")";
  }	
  if ($roomtyp=="MOEBEL") {
    $roomkurz="(".$raumkurz."/".$moebelkurz."/".$row['fldkurz'].")";
  }	
  ImageString ($bild, 5, $row['fldxkoor']+5, $row['fldykoor']+5, $roombez, $schwarz);
  ImageString ($bild, 5, $row['fldxkoor']+5, $row['fldykoor']+20, $roomkurz, $schwarz);
  ImageString ($bild, 5, $row['fldxkoor']+5, $row['fldykoor']+35, $anzbez, $schwarz);
}


//ImageString ($bild, 2, 5, 300, $sqlanz, $schwarz);

// Ausgabe des Bildes
imagepng($bild);
$db->close();

?> 