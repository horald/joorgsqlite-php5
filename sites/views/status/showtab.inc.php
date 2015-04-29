<?php
$listarray = array ( array ( 'label' => '',
                             'name' => 'chkbox', 
                             'width' => 5, 
                             'type' => 'checkbox',
                             'dbfield' => 'flddummy' ),
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'bez', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Typ',
                             'name' => 'typ', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldtyp' ));

$pararray = array ( 'headline' => 'Status',
                    'dbtable' => 'tblstatus',
                    'addfunc' => 'true',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>