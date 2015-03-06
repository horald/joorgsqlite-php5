<?php

$listarray = array ( array ( 'label' => 'Bezeichnung',
                             'name' => 'Bezeichung',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldBez' ),
                     array ( 'label' => 'Typ',
                             'name' => 'Typ',
                             'default' => 'FREMD',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldo01typ' ));


$pararray = array ( 'headline' => 'Orte',
                    'name' => 'Orte',
                    'dbtable' => 'tblorte',
                    'fldindex' => 'fldindex');

?>