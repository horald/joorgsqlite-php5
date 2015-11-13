<?php
//header('Content-Type: text/html; charset=utf-8');
require_once("../includes/html2pdf/html2pdf.class.php");

$filename="help";
//$content = '<html><body><h1>Einfaches Beispiel</h1></body></html>'; 
//HTML to PDF conversion 
$html2pdf = new HTML2PDF('P','A4','de', true, 'UTF-8');
//$html2pdf->setModeDebug();	
$html2pdf->setDefaultFont('Arial');
$db = new SQLite3('../data/joorgsqlite.db');
$qrypage="SELECT * FROM tblhelppage ORDER BY fldpageno";
$respage = $db->query($qrypage);
$zaehl=0;
$content="<html><head>";
$content=$content.'<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
$content=$content."</head><body>";
while ($linpage = $respage->fetchArray() ) { 
  $zaehl=$zaehl+1;
  if ($zaehl>1) {
    $content=$content."<page>";
  }
  $content=$content."Seite -".$linpage['fldpageno']."-<br>";
//  $qryrows="SELECT * FROM tblhelprows WHERE fldid_helppage=".$linpage['fldindex']." ORDER BY fldrow";
//  $resrows = $db->query($qryrows);
//  while ($linrows = $resrows->fetchArray() ) { 
//    $content=$content.$linrows['fldcontent'];
//  }

  if (substr($linpage['fldhelpurl'],-4)==".php") {
    ob_start();
    include("../help/de-DE/".$linpage['fldhelpurl']);
    $conthtml = ob_get_contents();
    ob_end_clean();
    $content=$content.$linpage['fldhelpurl']."<br>";
    $content=$content.$conthtml;
  }
  if (substr($linpage['fldhelpurl'],-5)==".html") {
    //$conthtml = file_get_contents("../help/de-DE/".$linpage['fldhelpurl'],true);
    $conthtml="<a href='".$linpage['fldhelpurl']."'>".$linpage['fldheadline']."</a>";
    $content=$content.$linpage['fldhelpurl']."<br>";
    $content=$content.$conthtml;
  }
  if ($zaehl>1) {
    $content=$content."</page>";
  }
//  $html2pdf->WriteHTML($content); 
//  $content="";
}
$content=$content."</body></html>";
//echo $content;
//$html2pdf->setModeDebug(true);  
$html2pdf->WriteHTML($content,false); 
$html2pdf->Output($filename.'.pdf');

?>