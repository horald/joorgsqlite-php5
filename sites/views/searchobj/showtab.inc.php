<?php
$listarray = array ( array ( 'label' => 'Suchobjekt',
                             'name' => 'bezsuchobj', 
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldbez' ),
                     array ( 'label' => 'Benutzer',
                             'name' => 'user', 
                             'width' => 100, 
                             'type' => 'selectid',
                             'dbtable' => 'tblbenutzer',
                             'seldbfield' => 'fldbez',
                             'seldbindex' => 'fldindex',
                             'dbfield' => 'fldid_user' ));

$pararray = array ( 'headline' => 'Suchobjekt',
                    'name' => 'suchobj', 
                    'dbtable' => 'tblsuchobj',
                    'orderby' => '',
                    'strwhere' => '',
                    'fldindex' => 'fldindex');
?>