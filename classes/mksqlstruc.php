<?php
include("bootstrapfunc.php");
bootstraphead();
bootstrapbegin('Make SQL-Structure');
echo "<a href='../admin' class='btn btn-primary btn-sm active' role='button'>Zurück</a><br>"; 

$pfad=$_SERVER['DOCUMENT_ROOT']."/android/own/joorgsqlite/sites/update/";
//echo $_SERVER['DOCUMENT_ROOT']."<br>";
//echo $pfad."<br>";

$filename = $pfad.'sqlstruc.inc.php';
$somecontent = "Füge dies Datei hinzu\n";
echo "<div class='alert alert-success'>";
echo "Datei:".$filename."<br>";
echo "</div>";

// Sichergehen, dass die Datei existiert und beschreibbar ist
if (is_writable($filename)) {
	//echo "schreibbar.<br>";
   $db = new SQLite3('../data/joorgsqlite.db');
   $results = $db->query("SELECT name,sql FROM sqlite_master WHERE type='table'");

   if (!$handle = fopen($filename, "w")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
   }	

   fwrite($handle,"<?php\n");
   fwrite($handle,'$tablearray = array ( ');

   $count=0;
   while ($row = $results->fetchArray()) {
     fwrite($handle,"array('tablename' => '".$row['name']."',\n");
     $sql=$row['sql'];
     fwrite($handle,"'sql' => '".$sql."',\n");
     $pos = strpos($sql, '(', 0);
     $column="'".substr($sql,$pos+1,-1)."'"; 
     $column=str_replace(",","','",$column);
     //echo "<div class='alert alert-success'>";
     //echo $column."<br>";
     //echo "</div>";
     fwrite($handle,"'column' => array(".$column.")),\n");
     $count=$count+1;
   }	

   fwrite($handle,");\n");
   fwrite($handle,"?>");
	
   fclose($handle);
   $db->close();
   echo "<div class='alert alert-warning'>";
   echo "Struktur von ".$count." Tabellen angelegt.";
   echo "</div>";
   
	
} else {
    print "Die Datei $filename ist nicht schreibbar<br>";
}
bootstrapend();
?>