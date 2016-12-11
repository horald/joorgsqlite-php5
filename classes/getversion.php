<?php
$locpfad=$_POST['locpfad'];
//echo $locpfad."=locpfad<br>";
$projpfad=$_POST['projpfad'];
//echo $projpfad."=projpfad<br>";
//echo $locpfad."versneu.txt=getversion<br>";
$projname=$_POST['projname'];
//echo $projname."=projname<br>";
include("../vers_".$projname.".php");
echo "Neuer Versionsnummer: ".$versnr."<br>";
echo "<a href='".$locpfad."index.php?neuevers=".$versnr."'>Versionnummer uebergeben</a>";

?>