<?php

function showtabfunc($menu,$sql,$id,$menugrp) {
  echo "<a href='../index.php?id=".$id."&menugrp=".$menugrp."'  class='btn btn-primary btn-sm active' role='button'>Menü</a> ";
  echo "<a href='insert.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>Einfügen</a> ";
  echo "<a href='import.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>import</a> ";
  echo "<a href='export.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>Export</a> ";
  echo "<a href='leeren.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>Leeren</a> ";
  $db = new SQLite3('../data/joorgsqlite.db');
  $sql="SELECT * FROM tblfunc WHERE fldMenuID='".$menu."' ORDER BY fldName";
  //echo $sql."<br>";
  $results = $db->query($sql);
  while ($rowtab = $results->fetchArray()) {
    //echo $rowtab['fldBez']."<br>";  
    $param="";
    if ($rowtab['fldParam']<>"") {
    	$param="&".$rowtab['fldParam'];
    }
    echo "<a href='".$rowtab['fldphp']."?menu=".$menu."&menugrp=".$menugrp.$param."' class='btn btn-primary btn-sm active' role='button'>".$rowtab['fldBez']."</a> ";
  }  
  echo "<a href='schicken.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>senden</a> ";
  echo "<a href='empfangen.php?menu=".$menu."&menugrp=".$menugrp."' class='btn btn-primary btn-sm active' role='button'>Holen</a> ";
}

function showtabfilter($filter,$filterarray,$pararray,$menu) {
  $db = new SQLite3('../data/joorgsqlite.db');
  $dbtable=$pararray['dbtable'];
  $fldort="";
  $dbwhere="";
  $refwert="";
  $selarr=array();
  $anzfilter = sizeof($filterarray);
  if ($filter==1) {
    //echo "filter==1<br>";
    foreach ( $filterarray as $arrelement ) {
      $wert=$_POST[$arrelement['name']];
      if ($arrelement['type']=="selectref") {
        $refwert=$wert;
      }
      //$selarr[$arrelement['dbfield']]=$arr['fldwert'];
      //echo $arrelement['dbfield']."=".$wert."<br>";
      if (($wert<>"(ohne)") && ($arrelement['type']<>"prozref")) {
        $lweiter="J";
        if ($arrelement['type']=="date") {
        	 if ($wert=="") {
        	 	$lweiter="N";
        	 }
        }	
        //echo $arrelement['name']."<br>";
        //echo $lweiter.",".$arrelement['type'].",".$wert;
        if ($lweiter=="J") {	
          if ($dbwhere=="") {
            $dbwhere=" WHERE ".$arrelement['dbfield'].$arrelement['sign']."'".$wert."'";
          } else {
            $dbwhere=$dbwhere." AND ".$arrelement['dbfield'].$arrelement['sign']."'".$wert."'";
          }
        }  
      }

      $sql="SELECT * FROM tblfilter WHERE fldfeld='".$arrelement['dbfield']."' AND fldtablename='".$dbtable."'";
      //echo $sql."<br>";
      $results = $db->query($sql);
      while ($rowarr = $results->fetchArray()) {
        $arr=$rowarr;
      }  	
      if (isset($arr['fldwert'])) {
        //echo $arr['fldfeld'].",".$arr['fldtablename'].",".$arrelement['dbfield'].",".$pararray['dbtable']."<br>";
        if (($arr['fldtablename']==$pararray['dbtable']) && ($arr['fldfeld']==$arrelement['dbfield'])) {
          $sql="UPDATE tblfilter SET fldwert='".$wert."' WHERE fldindex=".$arr['fldindex'];
        } else {
          $sql="INSERT INTO tblfilter (fldfeld,fldwert,fldtablename) VALUES('".$arrelement['dbfield']."','".$wert."','".$dbtable."')";
        }
      } else {
        $sql="INSERT INTO tblfilter (fldfeld,fldwert,fldtablename) VALUES('".$arrelement['dbfield']."','".$wert."','".$dbtable."')";
      }
      //echo $sql."<br>";
      $results = $db->query($sql);

    }

  } else {
    //echo "no filter<br>";

    foreach ( $filterarray as $arrelement ) {
      $sql="SELECT * FROM tblfilter WHERE fldfeld='".$arrelement['dbfield']."' AND fldtablename='".$dbtable."'";
      //echo $sql."<br>";
      $results = $db->query($sql);
      while ($rowarr = $results->fetchArray()) {
        $arr=$rowarr;
      }	
      if (isset($arr['fldwert'])) {
        //echo $arr['fldfeld'].",".$arr['fldtablename'].",".$pararray['dbtable'].",".$arrelement['dbfield']."<br>";
        if (($arr['fldwert']<>"(ohne)") && ($arrelement['type']<>"prozref")) {
          if ($dbwhere=="") { 
            $dbwhere=" WHERE ".$arrelement['dbfield'].$arrelement['sign']."'".$arr['fldwert']."'";
         } else {
            $dbwhere=$dbwhere." AND ".$arrelement['dbfield'].$arrelement['sign']."'".$arr['fldwert']."'";
          }
        }
        $selarr[$arrelement['dbfield']]=$arr['fldwert'];
      }
    }
  }

  $etagenid=$_GET['ETAGENID'];
  if ($etagenid=="") {
  	 $etagenid=$_POST['ETAGENID'];
  }
  //echo $anzfilter."=anz<br>";
  echo "<form class='form-horizontal' method='post' action='showtab.php?filter=1&menu=".$menu."'>";
  foreach ( $filterarray as $arrelement ) {
    switch ( $arrelement['type'] )
    {
      case 'select':
        $seldbwhere="";
        if ($arrelement['seldbwhere']<>"") {
          $seldbwhere=" WHERE ".$arrelement['seldbwhere'];
        }
        $sql="SELECT * FROM ".$arrelement['dbtable'].$seldbwhere;
        $results = $db->query($sql);
        echo $arrelement['label'];
        echo "<select name='".$arrelement['name']."' size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($rowsel = $results->fetchArray()) {
          if ($filter==1) {
            $wert=$_POST[$arrelement['name']];
          } else {
            $wert=$selarr[$arrelement['dbfield']];
          }
          if ($wert==$rowsel[$arrelement['seldbfield']]) {
            echo "<option style='background-color:#c0c0c0;' selected>".$rowsel[$arrelement['seldbfield']]."</option>";
          } else {
            echo "<option style='background-color:#c0c0c0;' >".$rowsel[$arrelement['seldbfield']]."</option>";
          }
        }
        echo "</select> ";
      break;
      case 'selectid':
        $seldbwhere="";
        if ($arrelement['seldbwhere']<>"") {
          $seldbwhere=" WHERE ".$arrelement['seldbwhere'];
        }
        if ($arrelement['auswahl']=="ETAGEN" && $etagenid=="") {
          echo "<input type='hidden' name='ETAGENID' value=48>";
          echo $selarr[$arrelement['dbfield']]."=wert<br>";
        }
        if ($arrelement['idwhere']=="ETAGEN" && $etagenid<>"") {
          if ($seldbwhere=="") {
          	$seldbwhere="WHERE fldid_etagen=".$etagenid;
          } else {
          	$seldbwhere=$seldbwhere." AND fldid_etage=".$etagenid;
          }
        }
        $sql="SELECT * FROM ".$arrelement['dbtable'].$seldbwhere;
        //echo $sql."<br>";
        $results = $db->query($sql);  
        echo $arrelement['label'];
        $onchange="";
        if ($arrelement['onchange']=="yes") {
        	 $auswahl='"'.$arrelement['auswahl'].'"'; 
        	 //echo $auswahl."<br>";
          $onchange="id='".$arrelement['auswahl']."' onchange='selectbox_auswahl(".$auswahl.")'"; 
          //echo $onchange."<br>";       
        }
        echo "<select name='".$arrelement['name']."' ".$onchange." size='1'>";
        echo "<option style='background-color:#c0c0c0;' >(ohne)</option>";
        while ($rowsel = $results->fetchArray()) {
          if ($filter==1) {
            $wert=$_POST[$arrelement['name']];
          } else {
          	if ($etagenid<>"") {
          	  $wert=$etagenid;	
          	} else {
              $wert=$selarr[$arrelement['dbfield']];
            }  
          }
          if ($wert==$rowsel[$arrelement['seldbindex']]) {
            echo "<option style='background-color:#c0c0c0;' value=".$rowsel[$arrelement['seldbindex']]." selected>".$rowsel[$arrelement['seldbfield']]."</option>";
          } else {
            echo "<option style='background-color:#c0c0c0;' value=".$rowsel[$arrelement['seldbindex']].">".$rowsel[$arrelement['seldbfield']]."</option>";
          }
        }  
        echo "</select> ";
      break;
      case 'date':
        if ($filter==1) {
          $wert=$_POST[$arrelement['name']];
        } else {
          $sqlfilter="SELECT * FROM tblfilter WHERE fldfeld='".$arrelement['dbfield']."' AND fldtablename='".$dbtable."'";
          //echo $sql."<br>";
          $resfilter = $db->query($sqlfilter);
          if ($rowfilter = $resfilter->fetchArray()) {
          	$wert=$rowfilter['fldwert'];
          }
        }  
        echo $arrelement['label'];
        echo "<span class='form_date' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2' data-link-format='yyyy-mm-dd'>";
        echo "<input id='dtp_input2' size='8' type='text' name='".$arrelement['name']."' value='".$wert."' >";
        echo "<button><span class='glyphicon glyphicon-calendar'></span></button>";
        echo "</span>";

      break;
    }
  }
  if ($anzfilter>0) {
    echo "<button type='submit' name='submit' class='btn btn-primary'>Ok</button>";
  }
  echo "</form>"; 

  $dborder="";
  if ($pararray['orderby']<>"") {
    $dborder=" ORDER BY ".$pararray['orderby'];
  }

  $dbjoin="";
  if ($pararray['dbreftable']<>"") {
  	 if ($refwert<>"(ohne)") {
      $dbjoin=" LEFT JOIN ".$pararray['dbreftable']." ON ".$pararray['dbreftable'].".".$pararray['dbrefindex']." = ".$pararray['dbtable'].".".$pararray['fldindex'];  
    }
  }
  
  if ($pararray['dbwhere']<>"") {
    if ($dbwhere<>"") {
      $dbwhere=$dbwhere." AND ".$pararray['dbwhere'];
    } else {
      $dbwhere=" WHERE ".$pararray['dbwhere'];
    }
  }
  if ($pararray['getindex']<>"") {
    $sql="SELECT *,".$dbtable.".".$pararray['fldindex']." AS ".$pararray['getindex']." FROM ".$dbtable.$dbjoin.$dbwhere.$dborder;
  } else {
    $sql="SELECT * FROM ".$dbtable.$dbjoin.$dbwhere.$dborder;
  }  
  //echo $sql."<br>";
  $retarr=array ( 'sqlfilter' => $sql,
                  'sqlbetrag' => 'sqlbetrag');
  return $sql;
}

?>