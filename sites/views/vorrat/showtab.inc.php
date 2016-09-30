<?php
$listarray = array ( array ( 'label' => 'Barcode',
                             'name' => 'barcode',      
                             'width' => 100, 
                             'type' => 'text',
                             'schnellerfass' => 'key',
                             'dbfield' => 'fldbarcode' ),
                     array ( 'label' => 'Anz',
                             'name' => 'anz',      
                             'width' => 50, 
                             'type' => 'text',
                             'schnellerfass' => 'anz', 
                             'dbfield' => 'fldanz' ));

$pararray = array ( 'headline' => 'Vorrat',
                    'dbtable' => 'tblvorrat',
                    'orderby' => 'fldbarcode',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');

?>