<?php
$menu=$_GET['dbtable'];
include("../sites/views/".$menu."/showtab.inc.php");
$sqlupd="UPDATE tblsyncstatus SET fldtimestamp=CURRENT_TIMESTAMP WHERE fldtable='".$pararray['dbtable']."'";

?>