<?php
define('_JEXEC', 1);
echo "<html>";
echo "<head>";
echo "  <meta charset='utf-8'>";
echo "  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>";
echo "  <title>Joorgsqlite</title>";

//      <!-- Bootstrap -->
echo "  <link href='includes/bootstrap/css/bootstrap.min.css' rel='stylesheet'>";

echo "</head>";
$dir=getcwd();
$dirdata=$dir."/data";
$dbjoorgsqlite=$dirdata."/joorgsqlite.db";
if (!file_exists($dirdata)) {
  mkdir($dirdata, 0777, true);
  if (!file_exists($dirdata)) {
    echo "<h1 align='left'>Joorgportal</h1>";
    echo "<div class='alert alert-success'>";
    echo "Bitte erzeugen Sie das Unterverzeichnis 'data' im Verzeichnis '".$dir."' mit Schreibrechten und rufen diese Seite zur weiteren Installation erneut auf.";
    echo "</div>";
    echo "<a href='index.php' class='btn btn-primary btn-sm active' role='button'>Neustart</a><br>"; 
  } else {
    include("classes/install.php");
  }
} else {
  if (!file_exists($dbjoorgsqlite)) {
    include("classes/install.php");
  }
}
include("classes/checkupgrade.php");
include("classes/dbtool.php");
echo "<body>";
check_version();
$check="ok";
if ($check=="ok") {
  echo "<div>";
  echo "<h1 align='center'>Joorgportal</h1>";
  $db = dbopen('','data/joorgsqlite.db');
  $parentid=$_GET['id'];
  if ($parentid=="") {
  	 $parentid='0';
  } else {
    echo "<h2 align='center'>Privat</h2>";
  }
  $menugrp=$_GET['menugrp'];
  if ($menugrp<>"") {
    $results = dbquery('',$db,"SELECT list.fldlink AS fldlink,list.fldmenu AS fldmenu,list.fldglyphicon AS fldglyphicon,list.fldbez AS fldbez FROM tblmenu_liste AS list,tblmenu_zuord AS zuord,tblmenu_grp AS grp WHERE list.fldindex=zuord.fldid_menu AND grp.fldindex=zuord.fldid_menugrp AND grp.fldbez='".$menugrp."' AND fldview='J' AND fldid_parent='".$parentid."' ORDER BY fldsort");
  } else {
    $results = dbquery('',$db,"SELECT * FROM tblmenu_liste WHERE fldview='J' AND fldid_parent='".$parentid."' ORDER BY fldsort");
  }
  while ($row = dbfetch('',$results)) {
  	 if ($row['fldmenu']=="SUBMENU") {
      echo "<a href='index.php?id=".$row['fldindex']."&lastid=".$parentid."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
  	 } else {	
      if ($row['fldlink']<>"") {
        if ($row['fldparam']<>"") {
          echo "<a href='".$row['fldlink']."?id=".$parentid."&".$row['fldparam']."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
        } else {
          echo "<a href='".$row['fldlink']."?id=".$parentid."&menugrp=".$menugrp."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
        }
      } else {
        echo "<a href='classes/showtab.php?menu=".$row['fldmenu']."&id=".$parentid."&menugrp=".$menugrp."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
      }
    }
  }	
  if ($parentid<>"0") {
    echo "<a href='index.php?id=".$_GET['lastid']."' class='btn btn-default btn-lg btn-block glyphicon glyphicon-list' role='button'> zurück</a>"; 
  }
  echo "</div>";
}  
echo "</body>";
echo "</html>";
?>