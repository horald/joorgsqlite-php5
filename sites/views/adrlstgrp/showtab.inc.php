<?php
$listarray = array ( array ( 'label' => 'Adresse',
                             'name' => 'adresse', 
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tbladr_liste',
                             'seldbfield' => 'fldfirstname,fldlastname',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_liste' ),
                     array ( 'label' => 'Gruppe',
                             'name' => 'gruppe', 
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tbladr_group',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_group' ));

$pararray = array ( 'headline' => 'Adressenzuordnung',
                    'dbtable' => 'tbladr_lstgrp',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');

?>