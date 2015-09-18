<?php
$listarray = array ( array ( 'label' => 'Typ',
                             'name' => 'typ', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Sort',
                             'name' => 'sort', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldsort' ));


$pararray = array ( 'headline' => 'Suchtyp',
                    'name' => 'suchtyp', 
                    'dbtable' => 'tblsuchtyp',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>