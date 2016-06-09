<?php
include("bootstrapfunc.php");
include("../config.php");
include("dbtool.php");
bootstraphead();
bootstrapbegin("");
echo "<a class='btn btn-primary' href='../index.php'>Menü</a> ";
echo "<a class='btn btn-primary' href='showtab.php?menu=googlecal'>Einstellungen</a><br>";
bootstrapend();
$gruppe=$_GET['gruppe'];
//echo $gruppe."=gruppe<br>";
$db = dbopen('../','../data/'.$database);
$sql="SELECT * FROM tblgooglecal WHERE fldgruppe='".$gruppe."'";
$cal="";
$results = dbquery('../',$db,$sql);
while ($row = dbfetch('../',$results)) {
  $cal=$cal."&src=".$row['fldcal']."&color=%".$row['fldcolor'];
}
$src="https://www.google.com/calendar/embed?height=500&wkst=2&bgcolor=%23FFFFFF".$cal."&ctz=Europe%2FBerlin";
echo "<html>";
echo "<iframe src='".$src."' style=' border-width:0 ' width='800' height='500' frameborder='0' scrolling='no'></iframe>";
echo "</html>";
?>
