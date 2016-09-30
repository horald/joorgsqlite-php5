<?php
$listarray = array ( 
                     array ( 'label' => 'Schicht',
                             'name' => 'schicht',
                             'width' => 50, 
                             'type' => 'selectid',
                             'dbtable' => 'tblschicht',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_schicht' ),
                     array ( 'label' => 'Datum',
                             'name' => 'datum',
                             'width' => 50, 
                             'type' => 'date',
                             'dbfield' => 'flddatum' ));
                             

$filterarray = array ( array ( 'label' => 'Schicht:',
                               'name' => 'fltschicht', 
                               'width' => 10, 
                               'type' => 'selectid',
                               'sign' => '=',
                               'dbtable' => 'tblschicht',
                               'seldbfield' => 'fldbez',
                               'seldbindex' => 'fldindex',
                               'dbfield' => 'fldid_schicht' ),
                       array ( 'label' => 'ab Datum:',
                               'name' => 'abdatum', 
                               'width' => 10, 
                               'type' => 'date',
                               'sign' => '>=',
                               'dbfield' => 'flddatum' ));


$pararray = array ( 'headline' => 'Dienstplan',
                    'dbtable' => 'tbldienstplan',
                    'orderby' => 'flddatum',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>