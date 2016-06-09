<?php

function famcal() {
  $wochentage = array('So','Mo','Di','Mi','Do','Fr','Sa');
  $erster="2016-03-01";
  $zeit = strtotime($erster);
  $wotagfirst=date("w", $zeit);
  echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<td class='success col-md-2'>Datum</td>";
  echo "<td class='success'>Geb</td>";
  echo "<td class='success'>Horst</td>";
  echo "<td class='success'>Christiane</td>";
  echo "<td class='success'>Frieda</td>";
  echo "</tr>";
  echo "<tr>";
  $tagsum=0;
  for ($tag = 1; $tag<32; $tag++) {
  	 $wotagnr=$wotagfirst+$tag-1-$tagsum;
    if ($wotagnr>6) {
    	$tagsum=$tagsum+7;
      $wotagnr=$wotagfirst+$tag-1-$tagsum;    
    }
    $wotag=$wochentage[$wotagnr];
    echo "<td class='col-md-1'>".$wotag." ".$tag.".</td>";
    echo "<td></td>";
    echo "<td><a href='#' class='btn btn-primary btn-sm active' role='button'>Termin</a></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";
  }
  echo "</table>";
}

?>