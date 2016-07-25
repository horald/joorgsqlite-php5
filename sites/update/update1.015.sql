ALTER TABLE tblfilter ADD fldmaske text;
ALTER TABLE tblfilter ADD fldName text;
CREATE TABLE "tblindex" (
  "fldindex" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "fldtable" text NOT NULL,
  "fldid" integer NOT NULL
);