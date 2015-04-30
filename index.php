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
echo "<body>";
if ($_GET['weiter']=="J") {
  $check="ok";
} else {
  $check=checkupgrade();
}
if ($check=="ok") {
  echo "<div>";
  echo "<h1 align='center'>Joorgportal</h1>";
  $db = new SQLite3('data/joorgsqlite.db');
  $parentid=$_GET['id'];
  if ($parentid=="") {
  	 $parentid='0';
  } else {
    echo "<h2 align='center'>Privat</h2>";
  }
  $results = $db->query("SELECT * FROM tblmenu_liste WHERE fldview='J' AND fldid_parent='".$parentid."' ORDER BY fldsort");
  while ($row = $results->fetchArray()) {
  	 if ($row['fldmenu']=="SUBMENU") {
      echo "<a href='index.php?id=".$row['fldindex']."&lastid=".$parentid."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
  	 } else {	
      if ($row['fldlink']<>"") {
        echo "<a href='".$row['fldlink']."?id=".$parentid."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
      } else {
        echo "<a href='classes/showtab.php?menu=".$row['fldmenu']."&id=".$parentid."' class='btn btn-default btn-lg btn-block glyphicon ".$row['fldglyphicon']."' role='button'> ".$row['fldbez']."</a>"; 
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