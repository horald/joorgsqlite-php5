<?php
include("bootstrapfunc.php");
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
//echo $index."=index<br>";
echo "<a href='../index.php?id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
echo "<a href='showtab.php?menu=etagen&id=".$id."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a><br><br>";
echo "<img src='grafikfunc.php?index=".$index."&etagenid=".$etagenid."' usemap='#Landkarte' />"; 
echo "<map name='Landkarte'>";
echo "  <area shape='rect' coords='200,25,400,100'";
echo "    href='grafik.php?id=".$id."&index=7' alt='Waschkeller' title='Waschkeller'>";
echo "  <area shape='rect' coords='200,100,400,250'";
echo "    href='grafik.php?id=".$id."&index=8' alt='Stromkeller' title='Stromkeller'>";
echo "</map>";
bootstrapend();
?>