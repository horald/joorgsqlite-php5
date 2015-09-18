<?php
$listarray = array ( array ( 'label' => 'Suchobjekt',
                             'name' => 'suchobj', 
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tblsuchobj',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_suchobj' ),
                     array ( 'label' => 'Etage',
                             'name' => 'etage',
                             'width' => 20, 
                             'type' => 'selectid',
                             'dbtable' => 'tblorte',
                             'seldbfield' => 'fldBez',
                             'seldbindex' => 'fldindex',
                             'seldbwhere' => 'fldo01typ="ETAGEN"',
                             'dbfield' => 'fldid_etage' ),
                     array ( 'label' => 'Zimmer',
                             'name' => 'zimmer',
                             'width' => 20, 
                             'type' => 'selectid',
                             'dbtable' => 'tblorte',
                             'seldbfield' => 'fldBez',
                             'seldbindex' => 'fldindex',
                             'seldbwhere' => 'fldo01typ="ZIMMER"',
                             'dbfield' => 'fldid_zimmer' ),
                     array ( 'label' => 'Möbel',
                             'name' => 'moebel',
                             'width' => 20, 
                             'type' => 'selectid',
                             'dbtable' => 'tblorte',
                             'seldbfield' => 'fldBez',
                             'seldbindex' => 'fldindex',
                             'seldbwhere' => 'fldo01typ="MOEBEL"',
                             'dbfield' => 'fldid_moebel' ),
                     array ( 'label' => 'Typ',
                             'name' => 'typ', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldtyp' ),
                     array ( 'label' => 'Proz',
                             'name' => 'proz',
                             'width' => 200, 
                             'type' => 'proz',
                             'dbfield' => 'fldproz' ));

$filterarray = array ( 
                       array ( 'label' => 'Gesuchtes:',
                               'name' => 'gesuchtes', 
                               'width' => 10, 
                               'type' => 'selectid',
                               'sign' => '=',
                               'dbtable' => 'tblsuchobj',
                               'seldbindex' => 'fldindex',
                               'seldbfield' => 'fldbez',
                               'dbfield' => 'fldid_suchobj' ),
                       array ( 'label' => 'Etage:',
                               'name' => 'etage', 
                               'width' => 10, 
                               'type' => 'selectid',
                               'sign' => '=',
                               'dbtable' => 'tblorte',
                               'seldbindex' => 'fldindex',
                               'seldbfield' => 'fldBez',
                               'seldbwhere' => 'fldo01typ="ETAGEN"',
                               'dbfield' => 'fldid_etage' ),
                       array ( 'label' => 'Typ:',
                               'name' => 'flttyp', 
                               'width' => 10, 
                               'type' => 'select',
                               'sign' => '=',
                               'dbtable' => 'tblsuchtyp',
                               'seldbindex' => 'fldindex',
                               'seldbfield' => 'fldbez',
                               'seldborder' => 'fldsort',
                               'dbfield' => 'fldtyp' ));


$pararray = array ( 'headline' => 'Suchobjektreferenz',
                    'name' => 'suchobjref', 
                    'dbtable' => 'tblrefsuchobj',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>