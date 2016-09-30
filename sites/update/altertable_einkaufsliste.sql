ALTER TABLE tblEinkauf_liste RENAME TO tblEinkauf_liste_alt

CREATE TABLE `tblEinkauf_liste` (
  `fldIndex` INTEGER PRIMARY KEY AUTOINCREMENT,
  `fldReihenfolge` int,
  `fldBez` text DEFAULT '0',
  `fldArtikelnr` text,
  `fldTyp` text,
  `fldSort` text,
  `fldAbteilung` text,
  `fldOrt` text,
  `fldPreis` text,
  `fldAnz` text,
  `fldArchivDat` text,
  `fldKonto` text,
  `fldBarcode` text,
  `flde01vorrat` int,
  `fldStatus` text DEFAULT 'offen',
  `fldEinkaufDatum` text,
  `fldEinkaufUhrzeit` text,
  `fldid_kopf` int,
  `flddbsyncnr` int NOT NULL DEFAULT '1',
  `fldtimestamp` text,
  `flddbsyncstatus` text DEFAULT 'SYNC'
)


INSERT INTO tblEinkauf_liste (fldIndex,fldKonto,fldStatus,fldArchivDat,fldEinkaufDatum,fldEinkaufUhrzeit,fldOrt,fldPreis,fldAnz,fldBez,flddbsyncstatus,fldtimestamp)
SELECT fldindex,fldKonto,fldStatus,fldArchivDat,fldEinkaufDatum,fldEinkaufUhrzeit,fldOrt,fldPreis,fldAnz,fldBez,flddbsyncstatus,fldtimestamp FROM tblEinkauf_liste_alt

