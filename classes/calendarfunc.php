<?php

function showcalendar($heutetag,$heutemon,$heutejahr,$aktmon,$aktjahr) {
  $db = new SQLite3('../data/joorgsqlite.db');
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
      if ($aktjahr==$heutejahr AND $aktmon==$heutemon AND $akttag==$heutetag) {
        echo "<td class='danger'>";      
      } else {
        echo "<td>";      
      }
      echo $akttag."<br>";


      $sql = "SELECT * FROM tbltermin_lst";
      $results = $db->query($sql);
      while ($row = $results->fetchArray()) {
        $termin=$row['fldvondatum'];
        $bez=$row['fldbez'];	
        $termintag=substr($termin,-2);
        $terminmon=substr($termin,5,2);
        $terminjahr=substr($termin,0,4);
        //echo "#".$terminmon."#";
        if ($akttag==$termintag AND $aktmon==$terminmon AND $aktjahr=$terminjahr) {
          echo "<a href='#'  class='btn btn-primary btn-sm active' role='button'>".$bez."</a>";
        }
      }
      echo "</td>";
    	$akttag=$akttag+1;
    }  
    echo "</tr>";
  }  
  echo "</table>";
}  
?>