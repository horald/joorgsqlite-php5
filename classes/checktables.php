<?php
include("bootstrapfunc.php");
include("upgradefunc.php");
include("../sites/update/sqlstruc.inc.php");
bootstraphead();
bootstrapbegin("Check tables<br>");
$menu=$_GET['menu'];
echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
checktables($tablearray);
//  $db = new SQLite3('../data/joorgsqlite.db');
//  $qryins="INSERT INTO tbltable (fldbez,fldtyp) VALUES('tblfilter','exist')";
//  $db->exec($qryins);

bootstrapend();
?>