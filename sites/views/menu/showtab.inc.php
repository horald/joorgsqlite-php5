<?php

$listarray = array ( array ( 'label' => 'Sort',
                             'name' => 'Sort',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldsort' ),
                     array ( 'label' => 'Bezeichnung',
                             'name' => 'Bezeichung',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                    array ( 'label' => 'Menü',
                             'name' => 'menu',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldmenu' ),
                    array ( 'label' => 'Link',
                             'name' => 'link',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldlink' ),
                    array ( 'label' => 'Icon',
                             'name' => 'glyphicon',
                             'width' => 200, 
                             'type' => 'text',
                             'dbfield' => 'fldglyphicon' ),
                     array ( 'label' => 'Anzeigen',
                             'name' => 'anzeigen',
                             'default' => 'N',
                             'width' => 50, 
                             'type' => 'text',
                             'dbfield' => 'fldview' ));


$pararray = array ( 'headline' => 'Menü',
                    'name' => 'menu',
                    'dbtable' => 'tblmenu_liste',
                    'orderby' => 'fldsort',
                    'fldindex' => 'fldindex');

?>