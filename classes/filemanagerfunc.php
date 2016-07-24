<?php
header("content-type: text/html; charset=utf-8");

function filemanager() {
  $db = new SQLite3('../data/joorgsqlite.db');
  $menu=$_GET['menu'];
  $id=$_GET['id'];
  $sql="SELECT * FROM tblfilemanager WHERE fldindex=".$id;
  $results = $db->query($sql);
  $row = $results->fetchArray();
  $pfad = $row['fldPfad'];
  $wildcard = $row['fldWildcard'];
  $verz = dir ($pfad);
  echo "<div class='alert alert-info'>";
  echo "Importpfad:".$pfad." Wildcard:".$wildcard;
  echo "</div>";
  echo "<a href='../index.php' class='btn btn-primary btn-sm active' role='button'>Menü</a> "; 
  echo "<a href='showtab.php?menu=".$menu."' class='btn btn-primary btn-sm active' role='button'>Zurück</a>"; 
  echo "<table class='table table-hover'>";
  echo "<thead>";
  echo "<th width='5'><input type='checkbox' name='cbuttonAll' value='1'></th>";
  echo "<th>Datei</th>";
  echo "<th>Aktion</th>";
  echo "<th>TCopy</th>";
  echo "<th>Del</th>";
  echo "</thead>";  
  $count = 0;
  while ( $entry = $verz->read () )
  {
    if (($entry!=".") AND ($entry!="..")) {
	  $lWeiter=false;
	  if ($wildcard=="") {
	    $lWeiter=true;
	  }	else {
	    $len=strlen($wildcard) * -1;
	    if (substr($entry,$len)==$wildcard) {
		  $lWeiter=true;
        }
	  }
      //echo "Es wurde eine Übereinstimmung gefunden:".substr($entry,$len).",".$wildcard.",".$len.",".$lWeiter;
	  if ($lWeiter==true) {
        $count = $count + 1; 
        echo "<tr>";
        echo "<input type='hidden' name='idwert".$count."' value=".$entry.">";
        echo "<td width='5'><input type='checkbox' name='cbutton".$count."' value='1'></td>";
        echo "<td>".htmlentities ($entry)."</td>";
        echo "<td><a href='pdfshow.php?pfad=".urlencode($pfad)."&filename=".urlencode($entry)."' target='_blank' class='btn btn-primary btn-sm active' role='button'>Anzeigen</a></td>";
        echo "<td><a href='pdffunc.php?pfad=".urlencode($pfad)."&filename=".urlencode($entry)."' target='_blank' class='btn btn-primary btn-sm active' role='button'>Pdf</a></td>";
        echo "<td><a href='tcopy.php?id=".$id."&pfad=".urlencode($pfad)."&filename=".urlencode($entry)."' class='btn btn-primary btn-sm active' role='button'>TCopy</a></td>";
        echo "<td><a href='delfile.php?id=".$id."&pfad=".urlencode($pfad)."&filename=".urlencode($entry)."' class='btn btn-primary btn-sm active' role='button'>Del</a></td>";
        echo "</tr>";
	  }	
    }  
  }
  
  echo "</table>";
}

?>