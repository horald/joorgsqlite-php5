DROP TABLE tblktosal

CREATE TABLE `tblktosal_neu` (
  `fldindex` INTEGER PRIMARY KEY AUTOINCREMENT,
  `fldDatum` text,
  `fldUhrzeit` text,
  `fldPos` int,
  `fldBez` text,
  `fldArt` text,
  `fldKonto` text,
  `fldBetrag` text,
  `fldInhaber` text,
  `fldKtoart` text,
  `fldFix` text,
  `fldorgdatum` text,
  `fldfremdbetrag` text,
  `fldwaehrung` text,
  `fldDetailind` int NOT NULL DEFAULT '0',
  `fldUmbuchinhaber` text,
  `fldsel` text NOT NULL DEFAULT 'N',
  `fldid_ort` int,
  `fldtyp` text,
  `fldfilename` text,
  `fldcomputer` text,
  `fldtimestamp` text,
  `flddbsyncnr` int NOT NULL DEFAULT '1',
  `flddbsyncstatus` text NOT NULL DEFAULT 'SYNC',
  `flddel` text NOT NULL DEFAULT 'N'
) 

ALTER TABLE tblktosal RENAME TO tblktosal_alt
ALTER TABLE tblktosal_neu RENAME TO tblktosal

INSERT INTO tblktosal (fldindex,fldDatum,fldUhrzeit,fldPos,fldBez,fldArt,fldKonto,fldBetrag,fldInhaber,fldKtoart,fldFix,fldorgdatum,fldfremdbetrag,fldtyp,flddel,fldtimestamp,flddbsyncnr,flddbsyncstatus,fldwaehrung,fldDetailind,fldUmbuchinhaber,fldsel,fldid_ort,fldtyp,fldfilename,fldcomputer)
SELECT fldindex,fldDatum,fldUhrzeit,0,fldBez,'',fldKonto,fldBetrag,fldInhaber,'',ifnull(fldFix,''),'','','',flddel,fldtimestamp,flddbsyncnr,flddbsyncstatus,'',0,'','',0,'','','' FROM tblktosal_alt WHERE fldDatum>'2016-01-01'
