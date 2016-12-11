<?php
$listarray = array ( array ( 'label' => 'Kurz',
                             'name' => 'ortkurz',      
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldkurz' ),
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'bez',      
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ));

$pararray = array ( 'headline' => 'Ort (kurz)',
                    'dbtable' => 'tblortkurz',
                    'orderby' => 'fldkurz',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');

?>