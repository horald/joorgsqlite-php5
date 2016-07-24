-- Adminer 4.2.4 SQLite 3 dump

CREATE TABLE "tblfilemanager" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldBez" text NULL,
  "fldPfad" text NULL,
  "fldWildcard" text NULL,
  "flddbsyncstatus" text NOT NULL DEFAULT 'SYNC'
);


-- 
