<?php
$listarray = array ( array ( 'label' => 'Barcode',
                             'name' => 'barcode',      
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbarcode' ),
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'bez', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldBez' ),
                     array ( 'label' => 'Konto',
                             'name' => 'kto', 
                             'width' => 20, 
                             'type' => 'select',
                             'dbtable' => 'tblktokonten',
                             'seldbfield' => 'fldKurz',
                             'dbfield' => 'fldKonto' ),
                     array ( 'label' => 'Verpack',
                             'name' => 'verpackbez', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldverpackbez' ),
                     array ( 'label' => 'Verpacksmenge',
                             'name' => 'verpackmeng', 
                             'width' => 20, 
                             'type' => 'text',
                             'dbfield' => 'fldverpackmeng' ));

$filterarray = array (
                       array ( 'label' => ' Konto:',
                               'name' => 'fltkonto', 
                               'width' => 10, 
                               'type' => 'select',
                               'sign' => '=',
                               'dbtable' => 'tblktokonten',
                               'seldbfield' => 'fldKurz',
                               'dbfield' => 'fldKonto' ));
							 
$pararray = array ( 'headline' => 'Artikel',
                    'dbtable' => 'tblartikel',
                    'orderby' => 'fldbarcode,fldBez',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');

?>