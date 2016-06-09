<?php
include("bootstrapfunc.php");
include("../config.php");
include("dbtool.php");
bootstraphead();
bootstrapbegin("");
echo "<a class='btn btn-primary' href='../index.php'>Menü</a> ";
echo "<a class='btn btn-primary' href='showtab.php?menu=googlecal'>Einstellungen</a><br>";
bootstrapend();
$cal="&src=meh8bg5v4qo65dfl4v6as701fs@group.calendar.google.com&color=%23875509";
$cal=$cal."&src=de.german%23holiday%40group.v.calendar.google.com&color=%23875509";
$cal=$cal."&src=bu0hs6s4bkprpkr24bqt113fbo@group.calendar.google.com&color=%12163839";
$cal=$cal."&src=u5pdgv2fih5utqhlnps9ag96jqemk3ru@import.calendar.google.com&color=%16159154";
$cal=$cal."&src=7lie3jn3a26mct92vlnifu0mmo@group.calendar.google.com&color=%4252971";
$cal=$cal."&src=qbj34hc56ibbaha3jpjh0bc4fs@group.calendar.google.com&color=%23875509";
$cal=$cal."&src=krikki1967@gmail.com&color=%23875509";
$cal=$cal."&src=ekohq9k5ri6cq2k7u9jqs0dvpo@group.calendar.google.com&color=%23875509";
$src="https://www.google.com/calendar/embed?height=500&wkst=1&bgcolor=%23FFFFFF".$cal."&ctz=Europe%2FBerlin";
echo "<html>";
echo "<iframe src='".$src."' style=' border-width:0 ' width='800' height='500' frameborder='0' scrolling='no'></iframe>";
echo "</html>";
?>
