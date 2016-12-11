ALTER TABLE tblvorrat ADD fldortkurz text NULL;
ALTER TABLE tblvorrat ADD fldmhdatum text NULL;
ALTER TABLE tblvorrat ADD flddbsyncstatus text DEFAULT 'SYNC';

ALTER TABLE tblartikel ADD fldbarcode text NULL;
ALTER TABLE tblartikel ADD fldverpackbez text NULL;
ALTER TABLE tblartikel ADD fldverpackmeng text NULL;
ALTER TABLE tblartikel ADD flddbsyncstatus text DEFAULT 'SYNC';

CREATE TABLE "tblortkurz" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldkurz" text NULL,
  "fldbez" text NULL,
  "flddbsyncstatus" text NULL DEFAULT 'SYNC'
);

UPDATE tblmenu_liste SET fldglyphicon='glyphicon-barcode' WHERE fldmenu='SUBMENU' AND fldbez='Vorrat';
