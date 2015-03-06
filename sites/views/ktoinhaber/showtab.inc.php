<?php
$listarray = array ( array ( 'label' => 'Bezeichnung',
                             'name' => 'bez',
                             'width' => 100, 
                             'type' => 'text',
                             'dbfield' => 'fldBez' ),
                     array ( 'label' => '',
                             'width' => 5, 
                             'type' => 'icon',
                             'func' => 'mark.php',
                             'dbfield' => 'icon-book' ) );

$pararray = array ( 'headline' => 'Konteninhaber',
                    'dbtable' => 'tblktoinhaber',
                    'orderby' => 'fldBez',
                    'strwhere' => '',
                    'markseldb' => 'JA',
                    'markselno' => 'NEIN',
                    'marktoggle' => 'true',
                    'markfield' => 'fldcalc',
                    'fldindex' => 'fldIndex');
?>