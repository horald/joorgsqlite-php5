<?php
$listarray = array ( array ( 'label' => 'Bezeichnung',
                             'name' => 'bez', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Kurz',
                             'name' => 'typ', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldkurz' ));

$pararray = array ( 'headline' => 'Schicht',
                    'dbtable' => 'tblschicht',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>