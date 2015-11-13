<?php

$listarray = array ( array ( 'label' => 'Bezeichnung',
                             'name' => 'bez',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Datum',
                             'name' => 'datum', 
                             'width' => 50, 
                             'type' => 'date',
                             'default' => 'now()',
                             'dbfield' => 'fldvondatum' ),
                     array ( 'label' => 'Typ',
                             'name' => 'typ',
                             'width' => 200, 
                             'type' => 'text',
                             'fieldhide' => 'true',
                             'dbfield' => 'fldserientyp' ),
                     array ( 'label' => 'Typ',
                             'name' => 'tage',
                             'width' => 200, 
                             'type' => 'text',
                             'fieldhide' => 'true',
                             'dbfield' => 'fldserientage' ));


$pararray = array ( 'headline' => 'Termine',
                    'name' => 'termine',
                    'dbtable' => 'tbltermin_lst',
                    'fldindex' => 'fldindex');

?>