<?php

$listarray = array (array ( 'label' => 'Menü',
                             'name' => 'menu',
                             'width' => 200, 
                             'type' => 'selectid',
                             'dbtable' => 'tblmenu_liste',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_menu' ),
                    array ( 'label' => 'Gruppe',
                             'name' => 'menugrp',
                             'width' => 200, 
                             'type' => 'selectid',
                             'dbtable' => 'tblmenu_grp',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_menugrp' ));


$pararray = array ( 'headline' => 'Menüzuordnung',
                    'name' => 'menuzuord',
                    'dbtable' => 'tblmenu_zuord',
                    'orderby' => '',
                    'fldindex' => 'fldindex');

?>