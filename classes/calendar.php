<?php
include("bootstrapfunc.php");
include("calendarfunc.php");
bootstraphead();
bootstrapbegin("");
$id=$_GET['id'];
$heutejahr = date("Y");
$heutemon = date("m");
$heutetag = date("d");

if (isset($_GET['aktjahr'])) {
  $aktjahr=$_GET['aktjahr'];
} else {
  $aktjahr=$heutejahr;
}  	
if (isset($_GET['aktmon'])) {
  $aktmon=$_GET['aktmon'];
} else {
  $aktmon=$heutemon;
}  	
if ($_GET['aktion']=="monatzurueck") {
  $aktmon=$aktmon-1;	
  if ($aktmon==0) {
  	 $aktmon=12;
  	 $aktjahr=$aktjahr-1;
  }
}	
if ($_GET['aktion']=="monatvor") {
  $aktmon=$aktmon+1;	
  if ($aktmon==13) {
  	 $aktmon=1;
  	 $aktjahr=$aktjahr+1;
  }
}	

if ($_GET['aktion']=="jahrzurueck") {
  $aktjahr=$aktjahr-1;	
}	
if ($_GET['aktion']=="jahrvor") {
  $aktjahr=$aktjahr+1;	
}	
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<a href='insert.php?menu=termine'  class='btn btn-primary btn-sm active' role='button'>Neu</a> ";
echo "<a href='calendar.php?aktion=jahrzurueck&aktjahr=".$aktjahr."'  class='btn btn-primary btn-sm active' role='button'><<</a> ";
echo "<a href='calendar.php?aktion=jahrvor&aktjahr=".$aktjahr."'  class='btn btn-primary btn-sm active' role='button'>>></a> ";
echo "<a href='calendar.php?aktion=monatzurueck&aktmon=".$aktmon."&aktjahr=".$aktjahr."'  class='btn btn-primary btn-sm active' role='button'><</a> ";
echo "<a href='calendar.php?aktion=monatvor&aktmon=".$aktmon."&aktjahr=".$aktjahr."'  class='btn btn-primary btn-sm active' role='button'>></a> ";
echo "<a href='calendar.php?aktion=heute'  class='btn btn-primary btn-sm active' role='button'>Heute</a><br><br> ";
showcalendar($heutetag,$heutemon,$heutejahr,$aktmon,$aktjahr);
bootstrapend();
?>
