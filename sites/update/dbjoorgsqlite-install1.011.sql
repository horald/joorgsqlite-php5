-- Adminer 4.1.0 SQLite 3 dump

DROP TABLE IF EXISTS "android_metadata";
CREATE TABLE android_metadata (locale TEXT);

INSERT INTO "android_metadata" ("locale") VALUES ('de_DE');

DROP TABLE IF EXISTS "sqlite_sequence";
CREATE TABLE sqlite_sequence(name,seq);

INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('tblktokonten',	'7');
INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('tblktoinhaber',	'4');
INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('tblktosal',	'0');
INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('tblprior',	'5');
INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('tbletagen',	'5');

DROP TABLE IF EXISTS "tblEinkauf_liste";
CREATE TABLE tblEinkauf_liste (fldKonto TEXT, fldStatus TEXT, fldArchivDat TEXT, fldEinkaufDatum TEXT, fldOrt TEXT, fldPreis TEXT, fldAnz TEXT, fldindex INTEGER PRIMARY KEY, fldBez TEXT);

INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.55',	'1.000',	1,	'Äpfel Braeburn');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.35',	'1.000',	2,	'Baguette-Brötchen');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.89',	'1.000',	3,	'Bananen');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.79',	'1.000',	4,	'Bio Kartoffeln');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.69',	'1.000',	5,	'Calciumbrause');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.39',	'1.000',	6,	'Käseaufschnitt');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Aldi',	'0.00',	'2.000',	7,	'vegane Bratwürstchen');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	8,	'Körnerbrot');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('HAUSHALT',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	9,	'Butterbrotpapier');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.89',	'6.000',	10,	'Traubenschorle');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Kaufland',	'0.49',	'6.000',	11,	'Orangenwasser');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'4.000',	12,	'Hafermilch');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	13,	'Sojamilch Alpro');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	14,	'Sojajoghurt natur');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Aldi',	'0.00',	'1.000',	15,	'Tiefkühlpommes');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Aldi',	'0.00',	'1.000',	16,	'Gemüse für Sonntag');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('HAUSHALT',	'offen',	'',	'2015-06-27',	'Aldi',	'0.00',	'1.000',	17,	'Kalkstopp für die Waschmaschine');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Aldi',	'0.00',	'2.000',	18,	'Agavendicksaft');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('HAUSHALT',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	19,	'Küchentücher');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('HAUSHALT',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	20,	'Papiertischdecke für Kindergeburtstag');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	21,	'Ahoi Brausepulver');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	22,	'Alsan');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.79',	'1.000',	23,	'Tofuaufschnitt');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.35',	'1.000',	24,	'passierte tomaten');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.79',	'2.000',	25,	'Sojaschnitzel');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.75',	'3.000',	26,	'Margarine');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'0.49',	'1.000',	27,	'Spiralinudeln');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.69',	'1.000',	28,	'Paprikaschoten rot');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'',	'Aldi',	'1.00',	'1.000',	29,	'Tomaten');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('HAUSHALT',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	30,	'Servietten für Friedas Geburtstag');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	31,	'Sojajoghurt');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'1.000',	32,	'veganer Aufschnitt');
INSERT INTO "tblEinkauf_liste" ("fldKonto", "fldStatus", "fldArchivDat", "fldEinkaufDatum", "fldOrt", "fldPreis", "fldAnz", "fldindex", "fldBez") VALUES ('LEBEN',	'offen',	'',	'2015-06-27',	'Kaufland',	'0.00',	'2.000',	33,	'Willmersburger Käse');

DROP TABLE IF EXISTS "tblartikel";
CREATE TABLE tblartikel (fldKonto TEXT, fldJN TEXT, fldAnz TEXT, fldindex INTEGER PRIMARY KEY, fldBez TEXT, fldPreis TEXT, fldOrt TEXT);

INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	1,	'Äpfel',	'1.15',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	3,	'Äpfel',	'3.75',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	5,	'Veganer Aufschnitt',	'1.85',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('LEBEN',	'J',	'1',	6,	'Aufbackbrötchen',	'0.35',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'N',	'1',	7,	'Handcreme',	'3.60',	'Baumarkt');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	8,	'Streichhölzer lang',	'1.15',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	9,	'Sojasosse',	'1.19',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	10,	'Dinkelmilch',	'1.85',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	11,	'Hafermilch',	'1.49',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('LEBEN',	'J',	'1',	12,	'Kaffeebohnen',	'8.49',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('HAUSHALT',	'J',	'1',	13,	'Kosmetiktücher',	'0.59',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	14,	'Erdbeerpulver',	'1.99',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	15,	'Körnerbrot',	'1.39',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	16,	'Wilmersburger käse',	'2.89',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	17,	'pilzpastete',	'1.19',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	18,	'barbecu sosse',	'1.69',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	19,	'Olivenöl',	'3.19',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	20,	'paprika bunt',	'1.29',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	21,	'Salatgurke',	'0.49',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	22,	'blattsalat',	'0.69',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	23,	'pommessalz',	'1.89',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('LEBEN',	'N',	'1',	24,	'Burgerbrötchen',	'0.69',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	25,	'berliner',	'1.59',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	26,	'jodsalz',	'0.89',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	27,	'Orangen',	'1.35',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	28,	'Weintrauben',	'1.65',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	29,	'cashewkerne',	'3.85',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('LEBEN',	'J',	'1',	30,	'Malzbier',	'3.09',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	31,	'Spültabs',	'4.95',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	32,	'Badeschaum',	'1.99',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	33,	'Orangenwasser',	'4.44',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	34,	'Traubenschorle',	'6.00',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('HAUSHALT',	'J',	'1',	35,	'Klopapier',	'1.95',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	36,	'chilischote',	'1.99',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES ('LEBEN',	'J',	'1',	37,	'Kartoffeln',	'1.15',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	38,	'Tofuaufschnitt',	'1.85',	'Aldi');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	39,	'Sojajoghurt',	'1.99',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	40,	'Nachthosen',	'8.25',	'Kaufland');
INSERT INTO "tblartikel" ("fldKonto", "fldJN", "fldAnz", "fldindex", "fldBez", "fldPreis", "fldOrt") VALUES (NULL,	'J',	'1',	41,	'Zündhölzer',	'0.39',	'Kaufland');

DROP TABLE IF EXISTS "tblerledigungen";
CREATE TABLE tblerledigungen (fldprior TEXT, fldErledigDat TEXT, fldDatum TEXT, fldcategory TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT, fldstatus TEXT);

INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'2015-03-07',	'2015-02-01',	'Erledigung',	7,	'Gadrobe für Frieda',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'2015-03-31',	'2015-02-12',	'Erledigung',	8,	'neuen Lohnsteuer Verein',	'in Arbeit');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-02-12',	'Erledigung',	9,	'neuen rechtschutz',	'in Arbeit');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('',	'',	'2015-02-12',	'Updates',	10,	'erledigungskategorie',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-02-12',	'Updates',	11,	'func table',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'2015-03-05',	'2015-02-27',	'Erledigung',	12,	'Peter von der Flüchtlingsinitiative anrufen',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'2015-03-05',	'2015-02-27',	'Erledigung',	13,	'Netcologne Rechnung',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-02-27',	'Erledigung',	14,	'Geno Energie',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'2015-03-31',	'2015-03-05',	'Erledigung',	15,	'klebepistole',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'2015-03-09',	'2015-03-06',	'Updates',	16,	'prior b Erledigung ',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('(ohne)',	'2015-03-09',	'2015-03-06',	'Updates',	17,	'datumsauswahl b eingabe',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-03-06',	'Updates',	18,	'submenues',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-03-06',	'Updates',	19,	'adressmodul',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-03-06',	'Updates',	20,	'terminkalendar',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('',	'',	'2015-03-06',	'Aufgaben',	21,	'flüchtlingsorga internet',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-03-10',	'Updates',	22,	'login function',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'2015-03-10',	'2015-03-10',	'Updates',	23,	'lizenz gpl',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-02',	'Erledigung',	24,	'horald ftp datensicherung',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-02',	'Erledigung',	25,	'horald auf joomla3 umstellen',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-02',	'Erledigung',	26,	'Lohnsteuerverein kündigen',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'2015-05-21',	'2015-04-02',	'Erledigung',	27,	'Neuem Lohnsteuerverein beitreten',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'2015-04-24',	'2015-04-02',	'Erledigung',	28,	'Mahnung klären',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-02',	'Erledigung',	29,	'Netcologne Rechnung Februar',	'erledigt');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-04-02',	'Erledigung',	30,	'GEZ Dauerauftrag für Chris umstellen',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'',	'2015-04-16',	'Erledigung',	31,	'garage entrümpeln',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-04-23',	'Updates',	32,	'Datum auswahl geht nicht mehr',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('3',	'',	'2015-04-27',	'Erledigung',	33,	'internetrechner neu kaufen',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-27',	'Erledigung',	34,	'internettechner voip testen',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('4',	'',	'2015-04-27',	'Erledigung',	35,	'voip weiterleitung einrichten',	'offen');
INSERT INTO "tblerledigungen" ("fldprior", "fldErledigDat", "fldDatum", "fldcategory", "fldindex", "fldbez", "fldstatus") VALUES ('5',	'',	'2015-05-21',	'Erledigung',	36,	'lohnsteuerunterlagen einreichen ',	'offen');

DROP TABLE IF EXISTS "tbletagen";
CREATE TABLE tbletagen (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldbez TEXT);

INSERT INTO "tbletagen" ("fldindex", "fldbez") VALUES (1,	'Untergeschoss');
INSERT INTO "tbletagen" ("fldindex", "fldbez") VALUES (2,	'Erdgeschoss');
INSERT INTO "tbletagen" ("fldindex", "fldbez") VALUES (3,	'1. Stock');
INSERT INTO "tbletagen" ("fldindex", "fldbez") VALUES (4,	'2. Stock');
INSERT INTO "tbletagen" ("fldindex", "fldbez") VALUES (5,	'Dachgeschoss');

DROP TABLE IF EXISTS "tblfahrtenbuch";
CREATE TABLE tblfahrtenbuch (fldind_datum TEXT, fldid_adr NUMERIC, fldStatus TEXT, fldindex INTEGER PRIMARY KEY, fldVondatum TEXT, fldVonkm TEXT, fldBiskm TEXT, fldFahrzeug TEXT, fldZeittarif TEXT, fldDauer TEXT);

INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	1,	'2014-07-16',	'28488',	'28549',	'Citroen ',	'2',	'3');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	2,	'2014-07-19',	'786',	'885',	'Ford ',	'2',	'10');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	3,	'2014-07-29',	'134',	'161',	'ford',	'2',	'6');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	4,	'2014-08-02',	'161',	'215',	'ford',	'2',	'7');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	5,	'2014-08-03',	'215',	'259',	'Ford ',	'2',	'5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	6,	'2014-08-27',	'710',	'770',	'Citroen ',	'1.5',	'3.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	7,	'2014-08-30',	'259',	'283',	'Ford ',	'2',	'6.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	8,	'2014-09-03',	'31193',	'31250',	'Citroen ',	'1.5',	'3.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	9,	'2014-09-07',	'283',	'474',	'Ford ',	'2',	'10');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	10,	'2014-09-14',	'474',	'656',	'ford',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	11,	'2014-09-20',	'656',	'684',	'Ford ',	'2',	'6,5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	12,	'2014-09-24',	'41258',	'41309',	'Citroen ',	'1.5',	'2.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	13,	'2014-09-28',	'12623',	'12877',	'Citroen ',	'1.5',	'14');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	14,	'2014-10-04',	'724',	'779',	'Ford ',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	15,	'2014-10-11',	'779',	'832',	'Ford ',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	16,	'2014-10-15',	'1946',	'',	'Citroen ',	'1.5',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	17,	'2014-10-17',	'832',	'873',	'Ford ',	'2',	'8');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	18,	'2014-10-22',	'59693',	'59758',	'Citroen ',	'1.5',	'3.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	19,	'2014-10-25',	'873',	'899',	'Ford ',	'2',	'8');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	20,	'2014-10-29',	'899',	'940',	'Ford ',	'2',	'2.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	21,	'2014-11-08',	'940',	'1037',	'Ford ',	'2',	'19');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	22,	'2014-11-14',	'1037',	'1078',	'Ford ',	'2',	'2,5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	23,	'2014-11-15',	'1082',	'1133',	'Ford ',	'2',	'10,5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	24,	'2014-11-20',	'1133',	'1173',	'Ford ',	'2',	'2,5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	25,	'2014-11-29',	'1173',	'1269',	'Ford ',	'2',	'15.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	26,	'2014-12-03',	'1269',	'1322',	'Ford ',	'2',	'3.25');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	27,	'2014-12-06',	'1322',	'1417',	'ford',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	28,	'2014-12-10',	'1417',	'1458',	'Ford ',	'2',	'2.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	29,	'2014-12-13',	'1458',	'1512',	'Ford ',	'2',	'10');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	30,	'2014-12-17',	'1512',	'1554',	'Ford ',	'2',	'3.25');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	31,	'2014-12-23',	'1554',	'1636',	'Ford ',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	32,	'2014-12-25',	'1636',	'1788',	'Ford ',	'2',	'11');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	33,	'2015-01-01',	'1788',	'1834',	'Ford ',	'2',	'1');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	34,	'2015-01-07',	'1834',	'1875',	'Ford ',	'2',	'2.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	35,	'2015-01-10',	'1875',	'1923',	'Ford ',	'2',	'10.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	36,	'2015-01-21',	'50786',	'50841',	'Citroen ',	'1.5',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	37,	'',	'1927',	'',	'',	'',	'');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	38,	'2015-01-28',	'51201',	'51259',	'Citroen ',	'1.5',	'5.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	39,	'2015-01-31',	'2019',	'2062',	'Ford ',	'2',	'4.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	40,	'',	'2',	'',	'',	'',	'');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	41,	'2015-02-04',	'0',	'',	'Citroen',	'1.5',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	42,	'2015-02-14',	'2196',	'2214',	'Ford',	'2',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	43,	'2015-02-16',	'26751',	'26793',	'Citroen ',	'1.5',	'5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	44,	'2015-02-18',	'53309',	'53363',	'Citroen ',	'1.5',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	45,	'2015-02-20',	'27257',	'27280',	'opel',	'1.5',	'3');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	46,	'2015-02-21',	'2246',	'2308',	'ford',	'2',	'10.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	47,	'2015-02-25',	'19169',	'19225',	'Toyota ',	'1.754',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	48,	'2015-04-25',	'2697',	'2750',	'Ford ',	'2.15',	'8.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'OK',	49,	'2015-04-29',	'2750',	'2792',	'ford',	'2.25',	'2.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES ('',	'',	'OK',	50,	'2015-05-02',	'2792',	'2822',	'ford',	'2.25',	'5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	51,	'2015-05-06',	'63049',	'63106',	'Citroen ',	'1.75',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	52,	'2015-05-09',	'2822',	'2877',	'Ford ',	'2.25',	'8.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	53,	'2015-05-14',	'2877',	'2923',	'Ford',	'2.25',	'4.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	54,	'2015-05-16',	'2923',	'2975',	'Ford ',	'2.25',	'10.5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	55,	'2015-05-20',	'2975',	'3103',	'Ford ',	'2.25',	'15');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	56,	'2015-05-23',	'3103',	'3123',	'ford',	'2.25',	'6');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES (NULL,	NULL,	'offen',	57,	'2015-05-27',	'65332',	'65392',	'Citroen ',	'1.75',	'4');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES ('',	'',	'offen',	58,	'2015-06-03',	'102433',	'102475',	'Citroen',	'1.75',	'5');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES ('',	'',	'offen',	59,	'2015-05-30',	'',	'',	'Ford',	'2.25',	'');
INSERT INTO "tblfahrtenbuch" ("fldind_datum", "fldid_adr", "fldStatus", "fldindex", "fldVondatum", "fldVonkm", "fldBiskm", "fldFahrzeug", "fldZeittarif", "fldDauer") VALUES ('',	'',	'offen',	60,	'2015-06-06',	'3175',	'3190',	'Ford',	'2.25',	'6');

DROP TABLE IF EXISTS "tblfilter";
CREATE TABLE tblfilter (fldtablename TEXT, fldwert TEXT, fldfeld TEXT, fldindex INTEGER PRIMARY KEY);

INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblEinkauf_liste',	'(ohne)',	'fldort',	4);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblerledigungen',	'offen',	'fldstatus',	5);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblEinkauf_liste',	'(ohne)',	'fldStatus',	7);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblfahrtenbuch',	'(ohne)',	'fldStatus',	8);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblktosal',	'horst_bargeld',	'fldInhaber',	9);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblerledigungen',	'Erledigung',	'fldcategory',	10);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblerledigungen',	'4',	'fldprior',	11);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblorte',	'(ohne)',	'fldid_zimmer',	12);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblartikel',	'Aldi',	'fldort',	13);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblfunc',	'(ohne)',	'fldMenuID',	14);
INSERT INTO "tblfilter" ("fldtablename", "fldwert", "fldfeld", "fldindex") VALUES ('tblEinkauf_liste',	'(ohne)',	'fldKonto',	15);

DROP TABLE IF EXISTS "tblfunc";
CREATE TABLE tblfunc (fldindex INTEGER PRIMARY KEY, fldBez TEXT, fldphp TEXT, fldMenuID TEXT, fldTyp TEXT, fldTarget TEXT, fldParam TEXT, fldAktiv TEXT, fldName TEXT, fldtimestamp TEXT, fldversion TEXT);

INSERT INTO "tblfunc" ("fldindex", "fldBez", "fldphp", "fldMenuID", "fldTyp", "fldTarget", "fldParam", "fldAktiv", "fldName", "fldtimestamp", "fldversion") VALUES (1,	'Preis',	'preis.php',	'shopping',	'',	'',	'',	NULL,	'',	NULL,	'');
INSERT INTO "tblfunc" ("fldindex", "fldBez", "fldphp", "fldMenuID", "fldTyp", "fldTarget", "fldParam", "fldAktiv", "fldName", "fldtimestamp", "fldversion") VALUES (2,	'Stammdaten',	'stamm.php',	'shopping',	'',	'',	'',	NULL,	'',	NULL,	'');
INSERT INTO "tblfunc" ("fldindex", "fldBez", "fldphp", "fldMenuID", "fldTyp", "fldTarget", "fldParam", "fldAktiv", "fldName", "fldtimestamp", "fldversion") VALUES (3,	'delsel',	'delsel.php',	'shopping',	'',	'',	'',	NULL,	'',	NULL,	NULL);
INSERT INTO "tblfunc" ("fldindex", "fldBez", "fldphp", "fldMenuID", "fldTyp", "fldTarget", "fldParam", "fldAktiv", "fldName", "fldtimestamp", "fldversion") VALUES (4,	'Füllen',	'fuellen.php',	'shopping',	'',	'',	'',	NULL,	'',	NULL,	NULL);

DROP TABLE IF EXISTS "tblkategorie";
CREATE TABLE tblkategorie (fldindex INTEGER PRIMARY KEY, fldbez TEXT);

INSERT INTO "tblkategorie" ("fldindex", "fldbez") VALUES (1,	'Erledigung');
INSERT INTO "tblkategorie" ("fldindex", "fldbez") VALUES (2,	'Updates');
INSERT INTO "tblkategorie" ("fldindex", "fldbez") VALUES (3,	'Aufgaben');

DROP TABLE IF EXISTS "tblktoinhaber";
CREATE TABLE tblktoinhaber (flindex INTEGER PRIMARY KEY AUTOINCREMENT, fldBez TEXT);

INSERT INTO "tblktoinhaber" ("flindex", "fldBez") VALUES (1,	'horst_bargeld');
INSERT INTO "tblktoinhaber" ("flindex", "fldBez") VALUES (2,	'horst_bank');
INSERT INTO "tblktoinhaber" ("flindex", "fldBez") VALUES (3,	'chris_bargeld');
INSERT INTO "tblktoinhaber" ("flindex", "fldBez") VALUES (4,	'Frieda_sparkonto');

DROP TABLE IF EXISTS "tblktokonten";
CREATE TABLE tblktokonten (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldKurz TEXT, fldBez TEXT, fldTyp TEXT);

INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (1,	'LEBEN',	'Lebensmittel',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (2,	'HAUSHALT',	'Haushaltswaren',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (3,	'KIND',	'Kind',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (4,	'LEBEN_HORST',	'Lebensmittel Horst',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (5,	'PFLEGE',	'Pflegemittel',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (6,	'SONSTIGES',	'Sonstige kosten',	'AUSGABE');
INSERT INTO "tblktokonten" ("fldindex", "fldKurz", "fldBez", "fldTyp") VALUES (7,	'PFAND',	'Pfand',	'Umbuch');

DROP TABLE IF EXISTS "tblktosal";
CREATE TABLE tblktosal (fldindex INTEGER PRIMARY KEY, fldDatum TEXT, fldUhrzeit TEXT, fldBez TEXT, fldKonto TEXT, fldInhaber TEXT, fldBetrag TEXT, fldFix NUMERIC);

INSERT INTO "tblktosal" ("fldindex", "fldDatum", "fldUhrzeit", "fldBez", "fldKonto", "fldInhaber", "fldBetrag", "fldFix") VALUES (1,	'2015-02-17',	'07:41',	'Käsebrötchen',	'LEBEN_HORST',	'horst_bargeld',	'-0.75',	NULL);
INSERT INTO "tblktosal" ("fldindex", "fldDatum", "fldUhrzeit", "fldBez", "fldKonto", "fldInhaber", "fldBetrag", "fldFix") VALUES (2,	'2015-02-17',	'18:03',	'test',	'LEBEN',	'chris_bargeld',	'-1',	NULL);
INSERT INTO "tblktosal" ("fldindex", "fldDatum", "fldUhrzeit", "fldBez", "fldKonto", "fldInhaber", "fldBetrag", "fldFix") VALUES (3,	'2014-12-31',	'18:11',	'Endbestand',	'(ohne)',	'horst_bargeld',	'100',	NULL);
INSERT INTO "tblktosal" ("fldindex", "fldDatum", "fldUhrzeit", "fldBez", "fldKonto", "fldInhaber", "fldBetrag", "fldFix") VALUES (4,	'2015-05-12',	'15:15',	'Eröffnung',	'SONSTIGES',	'Frieda_sparkonto',	NULL,	NULL);

DROP TABLE IF EXISTS "tblktotyp";
CREATE TABLE tblktotyp (fldtyp TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT);

INSERT INTO "tblktotyp" ("fldtyp", "fldindex", "fldbez") VALUES ('FINANCISTO',	1,	'CSV-Financisto');

DROP TABLE IF EXISTS "tblmenu_liste";
CREATE TABLE tblmenu_liste (fldid_parent NUMERIC, fldglyphicon TEXT, fldlink TEXT, fldsort TEXT, fldbez TEXT, fldindex INTEGER PRIMARY KEY, fldmenu TEXT, fldview TEXT);

INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-tasks',	'',	'001',	'Einkaufsliste',	1,	'shopping',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-flag',	'',	'002',	'Orte',	2,	'orte',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-list',	'',	'003',	'Konten',	3,	'konten',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list-alt',	'',	'004',	'Stammdaten',	4,	'stamm',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-pencil',	'admin/index.php',	'901',	'Admin',	5,	'',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list',	'',	'005',	'Erledigungen',	6,	'tasks',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list',	'',	'009',	'Kategorie',	7,	'category',	'N');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list',	'',	'006',	'Fahrtenbuch',	8,	'drive',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-play',	'',	'007',	'Buchführung',	9,	'ktosal',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list',	'',	'008',	'Kontoinhaber',	10,	'ktoinhaber',	'N');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-info-sign',	'classes/about.php',	'801',	'About',	11,	'',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-list',	'',	'010',	'Prior',	12,	'prior',	'N');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-flag',	'',	'002',	'Privat',	13,	'SUBMENU',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-tasks',	'',	'',	'Vorrat',	14,	'vorrat',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-picture',	'classes/roomgrafik.php',	'',	'Grafik',	15,	'',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-credit-card',	'',	'',	'Etagen',	16,	'etagen',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'glyphicon-home',	'',	'',	'Zimmer',	17,	'zimmer',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'',	'',	'',	'Status',	18,	'status',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'',	'classes/verbrauch.php',	'',	'Verbrauch',	19,	'',	'N');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('0',	'glyphicon-calendar',	'classes/calendar.php',	'',	'Kalender',	20,	'',	'N');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'',	'',	'',	'Kontoinhaber ',	21,	'ktoinhabet',	'J');
INSERT INTO "tblmenu_liste" ("fldid_parent", "fldglyphicon", "fldlink", "fldsort", "fldbez", "fldindex", "fldmenu", "fldview") VALUES ('13',	'',	'',	'',	'Kontotyp',	22,	'ktotyp',	'J');

DROP TABLE IF EXISTS "tblorte";
CREATE TABLE tblorte (fldhoehe NUMERIC, fldbreite NUMERIC, fldykoor NUMERIC, fldxkoor NUMERIC, fldview TEXT, fldid_zimmer NUMERIC, fldindex INTEGER PRIMARY KEY, fldBez TEXT, fldo01typ TEXT);

INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'Aldi',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'Kaufland',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	3,	'Penny',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	4,	'Baumarkt',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	5,	'REWE',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	6,	'DM',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('75',	'150',	'100',	'400',	'J',	'1',	7,	'Tresorkeller',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('75',	'200',	'100',	'200',	'J',	'1',	8,	'Stromkeller',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('75',	'195',	'100',	'5',	'J',	'1',	9,	'Weinkeller',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('75',	'200',	'25',	'200',	'J',	'1',	10,	'Waschkeller',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('75',	'200',	'25',	'200',	'J',	'2',	11,	'Garage',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('',	'',	'',	'',	'',	'2',	12,	'Vorkeller',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES ('',	'',	'',	'',	'',	'2',	13,	'Hausflur',	'ZIMMER');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	14,	'Alnatura',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	15,	'Restaurant ',	'FREMD');
INSERT INTO "tblorte" ("fldhoehe", "fldbreite", "fldykoor", "fldxkoor", "fldview", "fldid_zimmer", "fldindex", "fldBez", "fldo01typ") VALUES (NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	16,	'Fete',	'FREMD');

DROP TABLE IF EXISTS "tblprior";
CREATE TABLE tblprior (fldindex INTEGER PRIMARY KEY AUTOINCREMENT, fldprior TEXT);

INSERT INTO "tblprior" ("fldindex", "fldprior") VALUES (1,	'1');
INSERT INTO "tblprior" ("fldindex", "fldprior") VALUES (2,	'2');
INSERT INTO "tblprior" ("fldindex", "fldprior") VALUES (3,	'3');
INSERT INTO "tblprior" ("fldindex", "fldprior") VALUES (4,	'4');
INSERT INTO "tblprior" ("fldindex", "fldprior") VALUES (5,	'5');

DROP TABLE IF EXISTS "tblstatus";
CREATE TABLE tblstatus (fldtyp TEXT, fldindex INTEGER PRIMARY KEY, fldbez TEXT);

INSERT INTO "tblstatus" ("fldtyp", "fldindex", "fldbez") VALUES ('',	1,	'offen');
INSERT INTO "tblstatus" ("fldtyp", "fldindex", "fldbez") VALUES ('',	2,	'OK');
INSERT INTO "tblstatus" ("fldtyp", "fldindex", "fldbez") VALUES ('',	3,	'erledigt');
INSERT INTO "tblstatus" ("fldtyp", "fldindex", "fldbez") VALUES ('',	4,	'in Arbeit');

DROP TABLE IF EXISTS "tblversion";
CREATE TABLE tblversion (fldindex INTEGER PRIMARY KEY, fldbez TEXT, fldversion TEXT, flddatum TEXT);

INSERT INTO "tblversion" ("fldindex", "fldbez", "fldversion", "flddatum") VALUES (1,	'Version 1.004',	'1.004',	'2015-02-14');
INSERT INTO "tblversion" ("fldindex", "fldbez", "fldversion", "flddatum") VALUES (2,	'Version 1.003',	'1.003',	'2015-02-01');
INSERT INTO "tblversion" ("fldindex", "fldbez", "fldversion", "flddatum") VALUES (3,	'Version 1.005',	'1.005',	'10.03.2015');

-- 
