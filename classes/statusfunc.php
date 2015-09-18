<?php
header("content-type: text/html; charset=utf-8");

function statusauswahl($menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  echo "<form class='form-horizontal' method='post' action='status.php?status=1&menu=".$menu."'>";

  echo "<table>";

  $default = date('Y-m-d');
  echo "<tr>";
  echo "<td><label >Von Datum:</label></td>";
  echo "<td><div class='input-group date form_date col-md-12' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2' data-link-format='yyyy-mm-dd'>";
  echo "<input class='form-control' size='8' type='text' name='vondatum' value='".$default."' >";
  echo "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
  echo "</div></td>";
  echo "<input type='hidden' id='dtp_input2' value='' />";
  echo "</tr>";

  $default = date('Y-m-d');
  echo "<tr>";
  echo "<td><label >Bis Datum:</label></td>";
  echo "<td><div class='input-group date form_date col-md-12' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2' data-link-format='yyyy-mm-dd'>";
  echo "<input class='form-control' size='8' type='text' name='bisdatum' value='".$default."' >";
  echo "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
  echo "</div></td>";
  echo "<input type='hidden' id='dtp_input2' value='' />";
  echo "</tr>";

  $sql="SELECT * FROM tblstatus";
  $results = $db->query($sql);
  echo "<tr>";
  echo "<td><label >Von Status:</label></td>";
  echo "<td><select name='vonstatus' size='1'>";
  echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
  while ($row = $results->fetchArray()) {
    echo "<option style='background-color:#c0c0c0;' >".$row['fldbez']."</option>";
  }
  echo "</select></td>";
  echo "</tr>";

  $sql="SELECT * FROM tblstatus";
  $results = $db->query($sql);
  echo "<tr>";
  echo "<td><label >Nach Status:</label></td>";
  echo "<td><select name='nchstatus' size='1'>";
  echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
  while ($row = $results->fetchArray()) {
//    echo "<option style='background-color:#c0c0c0;'  value=".$row['fldindex'].">".$row['fldbez']."</option>";
    echo "<option style='background-color:#c0c0c0;' >".$row['fldbez']."</option>";
  }
  echo "</select></td>";
  echo "</tr>";

  echo "</table>";

  echo "<dd><input type='submit' value='Speichern' /></dd>";
  echo "</form>";
}

function statusfunc($vondatum,$bisdatum,$vonstatus,$nchstatus) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $sql="UPDATE tblfahrtenbuch SET fldStatus='".$nchstatus."' WHERE fldStatus='".$vonstatus."' AND fldVondatum>='".$vondatum."' AND fldVondatum<='".$bisdatum."'";
  $reserr = $db->exec($sql);
  echo "<div class='alert alert-success'>";
  echo $sql."<br>";
  echo "</div>";
}
?>