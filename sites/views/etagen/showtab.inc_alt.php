<?php
$listarray = array ( array ( 'label' => 'Bez',
                             'name' => 'bez',      
                             'width' => 100, 
                             'type' => 'text',
                             'grafiklink' => 'J',
                             'grafiketageid' => 'fldindex',
                             'grafikurl' => 'roomgrafik.php',
                             'roomtyp' => 'ETAGEN',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Proz',
                             'name' => 'proz',
                             'width' => 200, 
                             'type' => 'prozref',
                             'roomid' => 'fldid_etage',
                             'dbfield' => 'fldproz' ),
                     array ( 'label' => 'Z',
                             'width' => 5, 
                             'type' => 'icon',
                             'func' => 'showtab.php?menu=zimmer',
                             'dbfield' => 'icon-book' ));

$filterarray = array ( array ( 'label' => 'Gesuchtes:',
                               'name' => 'gesuchtes', 
                               'width' => 10, 
                               'type' => 'prozref',
                               'sign' => '=',
                               'dbtable' => 'tblsuchobj',
                               'seldbindex' => 'fldindex',
                               'seldbfield' => 'fldbez',
                               'dbfield' => 'fldid_suchobj' ));

$pararray = array ( 'headline' => 'Stockwerke',
                    'dbtable' => 'tbletagen',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');

?>