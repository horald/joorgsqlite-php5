-- Adminer 4.1.0 SQLite 3 dump

CREATE TABLE "tbldienstplan" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldid_schicht" integer NOT NULL,
  "flddatum" text NOT NULL,
  "flddbsyncstatus" text NOT NULL DEFAULT 'SYNC'
);


CREATE TABLE "tblschicht" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldbez" text NOT NULL,
  "fldkurz" text NOT NULL,
  "fldvonzeit" text NULL,
  "fldbiszeit" text NULL,
  "flddbsyncstatus" text NOT NULL DEFAULT 'SYNC'
);

INSERT INTO "tblschicht" ("fldindex", "fldbez", "fldkurz", "fldvonzeit", "fldbiszeit", "flddbsyncstatus") VALUES (1,	'Frühschicht',	'F',	NULL,	NULL,	'SYNC');
INSERT INTO "tblschicht" ("fldindex", "fldbez", "fldkurz", "fldvonzeit", "fldbiszeit", "flddbsyncstatus") VALUES (2,	'Spätschicht',	'S',	NULL,	NULL,	'SYNC');
INSERT INTO "tblschicht" ("fldindex", "fldbez", "fldkurz", "fldvonzeit", "fldbiszeit", "flddbsyncstatus") VALUES (3,	'Nachtschicht',	'N',	NULL,	NULL,	'SYNC');

-- 
