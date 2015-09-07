<?php
$listarray = array ( array ( 'label' => 'Bezeichnung',
                             'name' => 'bez', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Typ',
                             'name' => 'typ', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldtyp' ));

$pararray = array ( 'headline' => 'Tables',
                    'dbtable' => 'tbltable',
                    'orderby' => 'fldbez',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>