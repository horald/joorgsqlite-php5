<?php
$tablearray = array ( array('tablename' => 'sqlite_sequence',
'sql' => 'CREATE TABLE sqlite_sequence(name,seq)',
'column' => array('name','seq')),
array('tablename' => 'tblfilter',
'sql' => 'CREATE TABLE tblfilter (fldtablename TEXT, fldwert TEXT, fldfeld TEXT, fldindex INTEGER PRIMARY KEY)',
'column' => array('fldtablename TEXT',' fldwert TEXT',' fldfeld TEXT',' fldindex INTEGER PRIMARY KEY')),
array('tablename' => 'tblkategorie',
'sql' => 'CREATE TABLE tblkategorie (fldindex INTEGER PRIMARY KEY, fldbez TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY',' fldbez TEXT')),
array('tablename' => 'tblktokonten',
'sql' => 'CREATE TABLE tblktokonten (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldKurz TEXT, fldBez TEXT, fldTyp TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY AUTOINCREMENT',' fldKurz TEXT',' fldBez TEXT',' fldTyp TEXT')),
array('tablename' => 'tblktoinhaber',
'sql' => 'CREATE TABLE tblktoinhaber (flindex INTEGER PRIMARY KEY AUTOINCREMENT, fldBez TEXT)',
'column' => array('flindex INTEGER PRIMARY KEY AUTOINCREMENT',' fldBez TEXT')),
array('tablename' => 'tblversion',
'sql' => 'CREATE TABLE tblversion (fldindex INTEGER PRIMARY KEY, fldbez TEXT, fldversion TEXT, flddatum TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY',' fldbez TEXT',' fldversion TEXT',' flddatum TEXT')),
array('tablename' => 'tblprior',
'sql' => 'CREATE TABLE tblprior (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldprior TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY AUTOINCREMENT',' fldprior TEXT')),
array('tablename' => 'tblerledigungen',
'sql' => 'CREATE TABLE tblerledigungen (fldprior TEXT, fldErledigDat TEXT, fldDatum TEXT, fldcategory TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT, fldstatus TEXT)',
'column' => array('fldprior TEXT',' fldErledigDat TEXT',' fldDatum TEXT',' fldcategory TEXT',' fldindex INTEGER PRIMARY KEY',' fldbez TEXT',' fldstatus TEXT')),
array('tablename' => 'tblartikel',
'sql' => 'CREATE TABLE tblartikel (fldKonto TEXT, fldJN TEXT, fldAnz TEXT, fldindex INTEGER PRIMARY KEY, fldBez TEXT, fldPreis TEXT, fldOrt TEXT)',
'column' => array('fldKonto TEXT',' fldJN TEXT',' fldAnz TEXT',' fldindex INTEGER PRIMARY KEY',' fldBez TEXT',' fldPreis TEXT',' fldOrt TEXT')),
array('tablename' => 'tblstatus',
'sql' => 'CREATE TABLE tblstatus (fldtyp TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT)',
'column' => array('fldtyp TEXT',' fldindex INTEGER PRIMARY KEY',' fldbez TEXT')),
array('tablename' => 'android_metadata',
'sql' => 'CREATE TABLE android_metadata (locale TEXT)',
'column' => array('locale TEXT')),
array('tablename' => 'tblfahrtenbuch',
'sql' => 'CREATE TABLE tblfahrtenbuch (fldind_datum TEXT, fldid_adr NUMERIC, fldStatus TEXT, fldindex INTEGER PRIMARY KEY, fldVondatum TEXT, fldVonkm TEXT, fldBiskm TEXT, fldFahrzeug TEXT, fldZeittarif TEXT, fldDauer TEXT)',
'column' => array('fldind_datum TEXT',' fldid_adr NUMERIC',' fldStatus TEXT',' fldindex INTEGER PRIMARY KEY',' fldVondatum TEXT',' fldVonkm TEXT',' fldBiskm TEXT',' fldFahrzeug TEXT',' fldZeittarif TEXT',' fldDauer TEXT')),
array('tablename' => 'tblfunc',
'sql' => 'CREATE TABLE tblfunc (fldindex INTEGER PRIMARY KEY, fldBez TEXT, fldphp TEXT, fldMenuID TEXT, fldTyp TEXT, fldTarget TEXT, fldParam TEXT, fldAktiv TEXT, fldName TEXT, fldtimestamp TEXT, fldversion TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY',' fldBez TEXT',' fldphp TEXT',' fldMenuID TEXT',' fldTyp TEXT',' fldTarget TEXT',' fldParam TEXT',' fldAktiv TEXT',' fldName TEXT',' fldtimestamp TEXT',' fldversion TEXT')),
array('tablename' => 'tblktotyp',
'sql' => 'CREATE TABLE tblktotyp (fldtyp TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT)',
'column' => array('fldtyp TEXT',' fldindex INTEGER PRIMARY KEY',' fldbez TEXT')),
array('tablename' => 'tbletagen',
'sql' => 'CREATE TABLE tbletagen (fldproz TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT)',
'column' => array('fldproz TEXT',' fldindex INTEGER PRIMARY KEY',' fldbez TEXT')),
array('tablename' => 'tblbenutzer',
'sql' => 'CREATE TABLE tblbenutzer (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldbez TEXT, fldbackgroundfilename TEXT)',
'column' => array('fldindex INTEGER PRIMARY KEY AUTOINCREMENT',' fldbez TEXT',' fldbackgroundfilename TEXT')),
array('tablename' => 'tblsuchobj',
'sql' => 'CREATE TABLE tblsuchobj (fldid_user NUMERIC, fldindex INTEGER PRIMARY KEY, fldbez TEXT)',
'column' => array('fldid_user NUMERIC',' fldindex INTEGER PRIMARY KEY',' fldbez TEXT')),
array('tablename' => 'tblrefsuchobj',
'sql' => 'CREATE TABLE tblrefsuchobj (fldid_zimmer NUMERIC, fldid_moebel NUMERIC, fldtyp TEXT, fldid_orte NUMERIC, fldproz NUMERIC, fldindex INTEGER PRIMARY KEY, fldid_suchobj NUMERIC, fldid_etage NUMERIC)',
'column' => array('fldid_zimmer NUMERIC',' fldid_moebel NUMERIC',' fldtyp TEXT',' fldid_orte NUMERIC',' fldproz NUMERIC',' fldindex INTEGER PRIMARY KEY',' fldid_suchobj NUMERIC',' fldid_etage NUMERIC')),
array('tablename' => 'tblktostamm',
'sql' => 'CREATE TABLE tblktostamm (fldindex INTEGER PRIMARY KEY, fldDatum TEXT, fldUhrzeit TEXT, fldBez TEXT, fldKonto TEXT, fldInhaber TEXT, fldBetrag TEXT, fldFix NUMERIC)',
'column' => array('fldindex INTEGER PRIMARY KEY',' fldDatum TEXT',' fldUhrzeit TEXT',' fldBez TEXT',' fldKonto TEXT',' fldInhaber TEXT',' fldBetrag TEXT',' fldFix NUMERIC')),
array('tablename' => 'tblsession',
'sql' => 'CREATE TABLE "tblsession" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldid" integer NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldid" integer NOT NULL
')),
array('tablename' => 'tblEinkauf_liste',
'sql' => 'CREATE TABLE "tblEinkauf_liste" (
  "fldKonto" text NULL,
  "fldStatus" text NULL,
  "fldArchivDat" text NULL,
  "fldEinkaufDatum" text NULL,
  "fldEinkaufUhrzeit" text NULL,
  "fldOrt" text NULL,
  "fldPreis" text NULL,
  "fldAnz" text NULL,
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT,
  "fldBez" text NULL
)',
'column' => array('
  "fldKonto" text NULL','
  "fldStatus" text NULL','
  "fldArchivDat" text NULL','
  "fldEinkaufDatum" text NULL','
  "fldEinkaufUhrzeit" text NULL','
  "fldOrt" text NULL','
  "fldPreis" text NULL','
  "fldAnz" text NULL','
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT','
  "fldBez" text NULL
')),
array('tablename' => 'tbltable',
'sql' => 'CREATE TABLE "tbltable" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldbez" integer NOT NULL,
  "fldtyp" integer NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldbez" integer NOT NULL','
  "fldtyp" integer NOT NULL
')),
array('tablename' => 'tblorte',
'sql' => 'CREATE TABLE "tblorte" (
  "fldkurz" text NULL,
  "fldid_moebel" numeric NULL,
  "fldproz" numeric NULL,
  "fldid_etagealt" numeric NULL,
  "fldhoehe" numeric NULL,
  "fldbreite" numeric NULL,
  "fldykoor" numeric NULL,
  "fldxkoor" numeric NULL,
  "fldview" text NULL,
  "fldid_zimmer" numeric NULL,
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT,
  "fldBez" text NULL,
  "fldo01typ" text NULL,
  "fldid_etage" numeric NULL
, "fldid_suchobj" numeric NULL)',
'column' => array('
  "fldkurz" text NULL','
  "fldid_moebel" numeric NULL','
  "fldproz" numeric NULL','
  "fldid_etagealt" numeric NULL','
  "fldhoehe" numeric NULL','
  "fldbreite" numeric NULL','
  "fldykoor" numeric NULL','
  "fldxkoor" numeric NULL','
  "fldview" text NULL','
  "fldid_zimmer" numeric NULL','
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT','
  "fldBez" text NULL','
  "fldo01typ" text NULL','
  "fldid_etage" numeric NULL
',' "fldid_suchobj" numeric NULL')),
array('tablename' => 'tblsuchtyp',
'sql' => 'CREATE TABLE "tblsuchtyp" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldbez" text NOT NULL
, "fldsort" text NULL)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldbez" text NOT NULL
',' "fldsort" text NULL')),
array('tablename' => 'tblktosal',
'sql' => 'CREATE TABLE "tblktosal" (
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT,
  "fldDatum" text NULL,
  "fldUhrzeit" text NULL,
  "fldBez" text NULL,
  "fldKonto" text NULL,
  "fldInhaber" text NULL,
  "fldBetrag" text NULL,
  "fldFix" numeric NULL,
  "fldtyp" text NULL,
  "flddel" text NULL DEFAULT 'N',
  "fldtimestamp" text NULL
)',
'column' => array('
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT','
  "fldDatum" text NULL','
  "fldUhrzeit" text NULL','
  "fldBez" text NULL','
  "fldKonto" text NULL','
  "fldInhaber" text NULL','
  "fldBetrag" text NULL','
  "fldFix" numeric NULL','
  "fldtyp" text NULL','
  "flddel" text NULL DEFAULT 'N'','
  "fldtimestamp" text NULL
')),
array('tablename' => 'tblsyncstatus',
'sql' => 'CREATE TABLE "tblsyncstatus" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldtable" text NOT NULL,
  "fldtimestamp" text NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldtable" text NOT NULL','
  "fldtimestamp" text NOT NULL
')),
array('tablename' => 'tblindex',
'sql' => 'CREATE TABLE "tblindex" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldtable" text NOT NULL,
  "fldid" integer NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldtable" text NOT NULL','
  "fldid" integer NOT NULL
')),
array('tablename' => 'tblmenu_grp',
'sql' => 'CREATE TABLE "tblmenu_grp" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldbez" text NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldbez" text NOT NULL
')),
array('tablename' => 'tblmenu_liste',
'sql' => 'CREATE TABLE "tblmenu_liste" (
  "fldid_parent" numeric NULL,
  "fldglyphicon" text NULL,
  "fldlink" text NULL,
  "fldsort" text NULL,
  "fldbez" text NULL,
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT,
  "fldmenu" text NULL,
  "fldview" text NULL
)',
'column' => array('
  "fldid_parent" numeric NULL','
  "fldglyphicon" text NULL','
  "fldlink" text NULL','
  "fldsort" text NULL','
  "fldbez" text NULL','
  "fldindex" integer NULL PRIMARY KEY AUTOINCREMENT','
  "fldmenu" text NULL','
  "fldview" text NULL
')),
array('tablename' => 'tblmenu_zuord',
'sql' => 'CREATE TABLE "tblmenu_zuord" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldid_menu" integer NOT NULL,
  "fldid_menugrp" integer NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldid_menu" integer NOT NULL','
  "fldid_menugrp" integer NOT NULL
')),
array('tablename' => 'tbladr_liste',
'sql' => 'CREATE TABLE "tbladr_liste" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldfirstname" text NOT NULL,
  "fldlastname" text NOT NULL,
  "fldemail" text NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldfirstname" text NOT NULL','
  "fldlastname" text NOT NULL','
  "fldemail" text NOT NULL
')),
array('tablename' => 'tbladr_group',
'sql' => 'CREATE TABLE "tbladr_group" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldbez" text NOT NULL,
  "fldtyp" text NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldbez" text NOT NULL','
  "fldtyp" text NOT NULL
')),
array('tablename' => 'tbladr_lstgrp',
'sql' => 'CREATE TABLE "tbladr_lstgrp" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldid_liste" integer NOT NULL,
  "fldid_group" integer NOT NULL
)',
'column' => array('
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT','
  "fldid_liste" integer NOT NULL','
  "fldid_group" integer NOT NULL
')),
);
?>