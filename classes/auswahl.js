function selectbox_auswahl(parauswahl,parmenu) {
  strval=document.getElementById(parauswahl).value;
  //alert(parauswahl+","+parmenu);
  window.location.href = "showtab.php?menu="+parmenu+"&"+parauswahl+"ID=" + strval; 
}