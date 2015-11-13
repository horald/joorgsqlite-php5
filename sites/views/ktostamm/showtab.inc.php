<?php
$listarray = array ( array ( 'label' => 'Datum',
                             'name' => 'datum',
                             'width' => 100, 
                             'type' => 'date',
                             'default' => 'now()',
                             'dbfield' => 'fldDatum' ),
                     array ( 'label' => 'Uhrzeit',
                             'name' => 'uhrzeit',
                             'width' => 100, 
                             'type' => 'time',
                             'default' => 'now()',
                             'dbfield' => 'fldUhrzeit' ),
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'bez',
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldBez' ),
                     array ( 'label' => 'Konto',
                             'name' => 'konto', 
                             'getdefault' => 'true',
                             'width' => 5, 
                             'type' => 'select',
                             'dbtable' => 'tblktokonten',
                             'seldbfield' => 'fldKurz',
                             'dbfield' => 'fldKonto' ),
                     array ( 'label' => 'Kontoinhaber',
                             'name' => 'kontoinhaber', 
                             'width' => 5, 
                             'type' => 'select',
                             'dbtable' => 'tblktoinhaber',
                             'seldbfield' => 'fldBez',
                             'fieldhide' => 'true1',
                             'dbfield' => 'fldInhaber' ),
                     array ( 'label' => 'Betrag',
                             'name' => 'betrag',
                             'width' => 100, 
                             'type' => 'calc',
                             'dbfield' => 'fldBetrag' ),
                     array ( 'label' => 'Bar',
                             'name' => 'bar',
                             'width' => 100, 
                             'type' => 'calcsum',
                             'dbfield' => 'fldBetrag' ),
                     array ( 'label' => 'Fix',
                             'name' => 'fix',
                             'fieldhide' => 'true',
                             'width' => 70, 
                             'type' => 'zahl',
                             'dbfield' => 'fldFix' ));

$pararray = array ( 'headline' => 'Buchführung - Stammdaten',
                    'dbtable' => 'tblktostamm',
                    'orderby' => 'fldDatum',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>