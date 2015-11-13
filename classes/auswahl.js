function selectbox_auswahl(parauswahl) {
  strval=document.getElementById(parauswahl).value;
  //alert(strval);
  window.location.href = "showtab.php?menu=moebel&"+parauswahl+"ID=" + strval; 
}