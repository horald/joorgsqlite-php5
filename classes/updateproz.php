<?php
  include("bootstrapfunc.php");
  include("dbtool.php");
  bootstraphead();
  bootstrapbegin("Update Prozent");
  $menu=$_GET['menu'];
  echo "<a href='showtab.php?menu=".$menu."'  class='btn btn-primary btn-sm active' role='button'>Zurück</a> ";
  $db = dbopen('../','../data/joorgsqlite.db');
  $sqlfil="SELECT * FROM tblfilter WHERE fldtablename='tblorte' AND fldfeld='fldid_suchobj'";
  $resfil = $db->query($sqlfil);
  if ($rowfil = $resfil->fetchArray()) {
    if ($rowfil['fldwert']<>"(ohne)") {
      $sqlsuch="SELECT * FROM tblsuchobj WHERE fldbez='".$rowfil['fldwert']."'";
      $ressuch = $db->query($sqlsuch);
      if ($rowsuch = $ressuch->fetchArray()) {
        $suchid=$rowsuch['fldindex'];
      }
    }
  }    
  $sql = "SELECT fldid_moebel,sum(tblrefsuchobj.fldproz) as proz,count(*) as anz FROM tblrefsuchobj WHERE fldtyp=='FAECHER' GROUP BY fldid_moebel";
  $results = dbquery('../',$db,$sql);
  echo "<br>".$sql."<br>";
  while ($row = dbfetch('../',$results)) {
    $anz=$row['anz'];
	 if ($anz>0) {
	   $proz=$row['proz'] / $anz;
	 } else {
	   $proz=0;
	 }
    $sqlref="SELECT * FROM tblrefsuchobj WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_moebel']." AND fldtyp='MOEBEL'";
    $resref = dbquery('../',$db,$sqlref);
    if ($rowref = dbfetch('../',$resref)) {
	   $sqlproz="UPDATE tblrefsuchobj SET fldproz=".$proz.",fldtyp='MOEBEL' WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_moebel']; 
    } else {
      $sqlproz="INSERT INTO tblrefsuchobj (fldid_suchobj,fldid_orte,fldproz,fldtyp) VALUES(".$suchid.",".$row['fldid_moebel'].",".$proz.",'MOEBEL')";
    }	 
	 echo $sqlproz."<br>";
    dbexecute('../',$db,$sqlproz);
  }
  $sql = "SELECT fldid_zimmer,sum(tblrefsuchobj.fldproz) as proz,count(*) as anz FROM tblrefsuchobj WHERE fldtyp=='FAECHER' AND fldid_zimmer<>'' GROUP BY fldid_zimmer";
  $results = dbquery('../',$db,$sql);
  echo "<br>".$sql."<br>";
  while ($row = dbfetch('../',$results)) {
    $anz=$row['anz'];
	 if ($anz>0) {
	   $proz=$row['proz'] / $anz;
	 } else {
	   $proz=0;
	 }
    $sqlref="SELECT * FROM tblrefsuchobj WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_zimmer']." AND fldtyp='ZIMMER'";
    $resref = dbquery('../',$db,$sqlref);
    if ($rowref = dbfetch('../',$resref)) {
	   $sqlproz="UPDATE tblrefsuchobj SET fldproz=".$proz.",fldtyp='ZIMMER' WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_zimmer']; 
    } else {
      $sqlproz="INSERT INTO tblrefsuchobj (fldid_suchobj,fldid_orte,fldproz,fldtyp) VALUES(".$suchid.",".$row['fldid_zimmer'].",".$proz.",'ZIMMER')";
    }	 
	 echo $sqlproz."<br>";
    dbexecute('../',$db,$sqlproz);
  }
  $sql = "SELECT fldid_etage,sum(tblrefsuchobj.fldproz) as proz,count(*) as anz FROM tblrefsuchobj WHERE fldtyp=='FAECHER' AND fldid_etage<>'' GROUP BY fldid_etage";
  $results = dbquery('../',$db,$sql);
  echo "<br>".$sql."<br>";
  while ($row = dbfetch('../',$results)) {
    $anz=$row['anz'];
	 if ($anz>0) {
	   $proz=$row['proz'] / $anz;
	 } else {
	   $proz=0;
	 }
    $sqlref="SELECT * FROM tblrefsuchobj WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_etage']." AND fldtyp='ETAGE'";
    $resref = dbquery('../',$db,$sqlref);
    if ($rowref = dbfetch('../',$resref)) {
	   $sqlproz="UPDATE tblrefsuchobj SET fldproz=".$proz.",fldtyp='ETAGE' WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_etage']; 
    } else {
      $sqlproz="INSERT INTO tblrefsuchobj (fldid_suchobj,fldid_orte,fldproz,fldtyp) VALUES(".$suchid.",".$row['fldid_etage'].",".$proz.",'ETAGE')";
    }	 
	 echo $sqlproz."<br>";
    dbexecute('../',$db,$sqlproz);
  }
  echo "<div class='alert alert-success'>";
  echo "Prozent MOEBEL aktualisiert.";
  echo "</div>";

//  $sql = "SELECT fldid_zimmer,sum(fldproz) as proz,count(*) as anz FROM tblorte WHERE fldo01typ=='MOEBEL' GROUP BY fldid_zimmer";
  $sql = "SELECT fldid_zimmer,sum(fldproz) as proz,count(*) as anz FROM tblrefsuchobj WHERE fldtyp=='MOEBEL' AND fldid_zimmer<>'' GROUP BY fldid_zimmer";
  $results = dbquery('../',$db,$sql);
  //echo "<br>";
  while ($row = dbfetch('../',$results)) {
    $anz=$row['anz'];
	if ($anz>0) {
	  $proz=$row['proz'] / $anz;
	} else {
	  $proz=0;
	}
    $sqlref="SELECT * FROM tblrefsuchobj WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_zimmer'];
    $resref = dbquery('../',$db,$sqlref);
    if ($rowref = dbfetch('../',$resref)) {
	   $sqlproz="UPDATE tblrefsuchobj SET fldproz=".$proz.",fldtyp='ZIMMER' WHERE fldid_suchobj=".$suchid." AND fldid_orte=".$row['fldid_zimmer']; 
    } else {
      $sqlproz="INSERT INTO tblrefsuchobj (fldid_suchobj,fldid_orte,fldproz,fldtyp) VALUES(".$suchid.",".$row['fldid_zimmer'].",".$proz.",'ZIMMER')";
    }	 
	 echo $sqlproz."<br>";

	//echo $row['fldid_zimmer'].",".$anz.",".$proz."<br>";
//	$sqlproz="UPDATE tblorte SET fldproz=".$proz." WHERE fldindex=".$row['fldid_zimmer'];
	//echo $sqlproz."<br>";
    dbexecute('../',$db,$sqlproz);
  }
  echo "<div class='alert alert-success'>";
  echo "Prozent ZIMMER aktualisiert.";
  echo "</div>";

  $sql = "SELECT fldid_etage,sum(fldproz) as proz,count(*) as anz FROM tblorte WHERE fldo01typ=='ZIMMER' GROUP BY fldid_etage";
  $results = dbquery('../',$db,$sql);
  //echo "<br>";
  while ($row = dbfetch('../',$results)) {
    $anz=$row['anz'];
	if ($anz>0) {
	  $proz=$row['proz'] / $anz;
	} else {
	  $proz=0;
	}
	//echo $row['fldid_zimmer'].",".$anz.",".$proz."<br>";
	$sqlproz="UPDATE tbletagen SET fldproz=".$proz." WHERE fldindex=".$row['fldid_etage'];
	//echo $sqlproz."<br>";
    dbexecute('../',$db,$sqlproz);
  }
  echo "<div class='alert alert-success'>";
  echo "Prozent ETAGE aktualisiert.";
  echo "</div>";

  bootstrapend();
?>