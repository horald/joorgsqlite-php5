<?php
$listarray = array ( 
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'cal',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Gruppe',
                             'name' => 'grp',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldgruppe' ),
                     array ( 'label' => 'Kalender',
                             'name' => 'cal',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldcal' ),
                     array ( 'label' => 'Farbe',
                             'name' => 'text',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldcolor' ),
                     array ( 'label' => 'Anzeigen',
                             'name' => 'anzeige',
                             'width' => 10, 
                             'type' => 'text',
                             'dbfield' => 'fldjn' ));
                             
$filterarray = array ( array ( 'label' => 'Gruppe:',
                               'name' => 'fltgrp', 
                               'width' => 10, 
                               'type' => 'select',
                               'sign' => '=',
                               'dbtable' => 'tblcalgrp',
                               'seldbfield' => 'fldbez',
                               'dbfield' => 'fldgruppe' ));



$pararray = array ( 'headline' => 'Google Kalendar',
                    'dbtable' => 'tblgooglecal',
                    'orderby' => '',
                    'strwhere' => '',
                    'marktype' => 'text',
                    'markbgcolor' => '22ff22',
                    'markfield' => 'fldStatus',
                    'marksign' => '=',
                    'marksuccess' => 'OK',
                    'dbsyncnr' => 'J',
                    'fldindex' => 'fldindex');
?>