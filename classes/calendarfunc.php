<?php

function showcalendar($aktmon,$aktjahr) {
  $lastmon = array(31,28,31,30,31,30,31,31,30,31,30,31);
  $monname = array('Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');
  $wochentage = array('Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag');
  $aktmonname=$monname[$aktmon-1];
  $erster=$aktjahr."-".$aktmon."-01";
  $zeit = strtotime($erster);
  $wotag=$wochentage[date("w", $zeit)];
  $wotagnr=date("w", $zeit);
  $akttag=1;
  if ($wotagnr>1) {
    $aktmon=$aktmon-1;
    if ($aktmon<1) {
      $aktmon=12;
    }
    $akttag=$lastmon[$aktmon-1]-$wotagnr+2;
  }
  if ($wotagnr==0) {
    $aktmon=$aktmon-1;
    if ($aktmon<1) {
      $aktmon=12;
    }
    $akttag=$lastmon[$aktmon-1]-5;
  }

  echo "<table class='table table-bordered'>";
  //echo "<tr><td class='info'>".$aktmonname." ".$aktjahr." ".$erster." ".$wotag." ".$wotagnr."</td></tr>";
  echo "<tr><td class='info'>".$aktmonname." ".$aktjahr."</td></tr>";
  echo "</table>";
  //var_dump($lastmon);
  echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<td class='success'>Mo</td>";
  echo "<td class='success'>Di</td>";
  echo "<td class='success'>Mi</td>";
  echo "<td class='success'>Do</td>";
  echo "<td class='success'>Fr</td>";
  echo "<td class='success'>Sa</td>";
  echo "<td class='success'>So</td>";
  echo "</tr>";
  for ($woch = 1; $woch <= 6; $woch++) {  
    echo "<tr>";
    for ($tag = 0; $tag<7; $tag++) {
    	if ($akttag>$lastmon[$aktmon-1]) {
        $akttag=1;
        $aktmon=$aktmon+1;
        if ($aktmon>12) {
        	 $aktmon=1;
        }
    	}
      if ($aktjahr==2015 AND $aktmon==10 AND $akttag==15) {
        echo "<td class='danger'>";      
      } else {
        echo "<td>";      
      }
      echo $akttag."<br>";
      if ($akttag==28 AND $aktmon==9) {
        echo "<a href='calendar.php'  class='btn btn-primary btn-sm active' role='button'>Herbst</a>";
      }
      if ($akttag==29 AND $aktmon==9) {
        echo "<a href='calendar.php'  class='btn btn-primary btn-sm active' role='button'>Eheabend Chris</a>";
      }
      echo "</td>";
    	$akttag=$akttag+1;
    }  
    echo "</tr>";
  }  
  echo "</table>";
}  
?>