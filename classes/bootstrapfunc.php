<?php

function bootstraphead($loadbootstrap) {
echo "<!DOCTYPE html>";
echo "<html lang='de'>";
echo "<head>";
echo "<meta charset='utf-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>";
echo "<link href='../includes/bootstrap/css/bootstrap.css' rel='stylesheet'>";
echo "<script src='../includes/bootstrap/js/jquery-latest.js'></script>";
echo "<title>Joorgsqlite</title>";
echo "</head>";
}

function bootstrapbegin($headline,$showheadline) {
  echo "<body>";
  echo "<div class='row-fluid'>";
  echo "<div class='span12'>";
  //echo "<h1 align='center'>".$headline."</h1>";
  echo "<legend>".$headline."</legend>";
}

function bootstrapend() {
  echo "</div>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
}

?>