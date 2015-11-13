<?php
$listarray = array ( array ( 'label' => 'Hilfsseite',
                             'name' => 'bez', 
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tblhelppage',
                             'seldbfield' => 'fldpagename',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_helppage' ),
                     array ( 'label' => 'Zeile',
                             'name' => 'row', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldrow' ),
                     array ( 'label' => 'Inhalt',
                             'name' => 'content', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldcontent' ));

$filterarray = array ( array ( 'label' => 'Hilfsseite',
                             'name' => 'parent', 
                             'width' => 10, 
                             'type' => 'selectid',
                             'sign' => '=',
                             'dbtable' => 'tblhelppage',
                             'seldbfield' => 'fldpagename',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_helppage' ));

$pararray = array ( 'headline' => 'Hilfsinhalt',
                    'dbtable' => 'tblhelprows',
                    'orderby' => 'fldid_helppage,fldrow',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>