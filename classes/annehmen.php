<?php
  $menu=$_POST['menu'];
  include("../sites/views/".$menu."/showtab.inc.php");
  $db = new SQLite3('../data/joorgsqlite.db');
  $datcnt=$_POST['datcnt'];
  $table=$_POST['table'];

  $fields="";
  foreach ( $listarray as $arrelement ) {
    $weiter='N';
    if ($arrelement[type]=='text') {
      $weiter='J';
    }
    if ($arrelement[type]=='select') {
      $weiter='J';
    }
    if ($arrelement[type]=='date') {
      $weiter='J';
    }
    if ($arrelement[type]=='time') {
      $weiter='J';
    }
    if ($arrelement[type]=='calc') {
      $weiter='J';
    }
    if ($weiter=='J') {
      if ($fields=="") {
        $fields="'".$arrelement['dbfield']."'";
      } else {
        $fields=$fields.",'".$arrelement['dbfield']."'";
      }
    }
  } 

  for ($i = 0; $i < $datcnt; $i++) {
    $id=$_POST['idarr'.$i];
    $sql="SELECT fldindex FROM ".$table." WHERE fldindex=".$id;   
//echo $sql."<br>";
    $results = $db->query($sql);
    while ($row = $results->fetchArray()) {
      $arr=$row;
    }	
    $daten=""; 
    if ($arr['fldindex']==$id) {
      foreach ( $listarray as $arrelement ) {
        $weiter='N';
        if ($arrelement[type]=='text') {
          $weiter='J';
        }
        if ($arrelement[type]=='select') {
          $weiter='J';
        }
        if ($arrelement[type]=='date') {
          $weiter='J';
        }
        if ($arrelement[type]=='time') {
          $weiter='J';
        }
        if ($arrelement[type]=='calc') {
          $weiter='J';
        }
        if ($weiter=='J') {
          if ($daten=="") {
            $daten=$arrelement['dbfield']."='".$_POST[$arrelement['name'].'arr'.$i]."'";
          } else {
            $daten=$daten.", ".$arrelement['dbfield']."='".$_POST[$arrelement['name'].'arr'.$i]."'";
          }
        }
      }
      $sqlexec="UPDATE ".$table." SET ".$daten." WHERE fldindex=".$id; 
    } else {
      foreach ( $listarray as $arrelement ) {
        $weiter='N';
        if ($arrelement[type]=='text') {
          $weiter='J';
        }
        if ($arrelement[type]=='select') {
          $weiter='J';
        }
        if ($arrelement[type]=='date') {
          $weiter='J';
        }
        if ($arrelement[type]=='time') {
          $weiter='J';
        }
        if ($arrelement[type]=='calc') {
          $weiter='J';
        }
        if ($weiter=='J') {
          if ($daten=="") {
            $daten="'".$_POST[$arrelement['name'].'arr'.$i]."'";
          } else {
            $daten=$daten.",'".$_POST[$arrelement['name'].'arr'.$i]."'";
          }
        }
      }
      $sqlexec="INSERT INTO ".$table." (".$fields.") VALUES (".$daten.")";
    }
//echo $sqlexec."<br>";
    $db->exec($sqlexec);
  }
?>