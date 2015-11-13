<?php
$listarray = array ( array ( 'label' => 'Stammdaten',
                             'name' => 'stammdaten',
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tblktostamm',
                             'seldbfield' => 'fldBez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_ktostamm' ),
                     array ( 'label' => 'Kontoinhaber',
                             'name' => 'kontoinhaber', 
                             'width' => 5, 
                             'type' => 'selectid',
                             'dbtable' => 'tblktoinhaber',
                             'seldbfield' => 'fldBez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_ktoinhaber' ));

$pararray = array ( 'headline' => 'Buchführung - Stammdatenzuordnung',
                    'dbtable' => 'tblktostamm_zuord',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>