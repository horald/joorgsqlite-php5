UPDATE tblmenu_liste SET fldview='N';
UPDATE tblmenu_liste SET fldview='J', fldid_parent=0 WHERE fldmenu='shopping';
DELETE FROM tblEinkauf_liste;
UPDATE tblmenu_liste SET fldview='J' WHERE fldbez='About';
UPDATE tblmenu_liste SET fldview='J', fldid_parent=0 WHERE fldmenu='ktosal';
DELETE FROM tblktosal WHERE fldInhaber<>'chris_bargeld';
UPDATE tblmenu_liste SET fldview='J', fldmenu='menu', fldlink='' WHERE fldbez='Admin'