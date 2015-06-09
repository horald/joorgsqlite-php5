<?php

function buchfunc($menu,$pararray) {
  echo "menu=".$menu.",".$pararray['dbtable']."<br>";
  $query="SELECT fldOrt,fldKonto,sum(fldPreis*fldAnz),fldKonto FROM ".$pararray['dbtable'];
}

?>