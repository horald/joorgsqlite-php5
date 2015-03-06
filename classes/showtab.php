<?php
session_start();
include("bootstrapfunc.php");
include("showtabfunc.php");
$menu=$_GET['menu'];
$filter=$_GET['filter'];
//echo $menu."=menu<br>";
include("../sites/views/".$menu."/showtab.inc.php");
bootstraphead();
bootstrapbegin($pararray['headline']);

$db = new SQLite3('../data/joorgsqlite.db');

$sql=showtabfilter($filter,$filterarray,$pararray,$menu);
//echo $sql."=sql<br>";

showtabfunc($menu,$sql);

$dbselarr=array();
$results = $db->query($sql);
echo "<table class='table table-hover'>";
echo "<tr>";
foreach ( $listarray as $arrelement ) {
  if ($arrelement['fieldhide']!="true") {
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'select':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'time':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'date':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'calcaddsum':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'calcdiffsum':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'calcdiff':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'calc':
        echo "<th>".$arrelement['label']."</th>";
      break;
      case 'calcsum':
        echo "<th>".$arrelement['label']."</th>";
      break;
    }
  }
}
echo "</tr>";
while ($row = $results->fetchArray()) {
  echo "<tr>";
  foreach ( $listarray as $arrelement ) {
    if ($arrelement['fieldhide']!="true") {
      switch ( $arrelement['type'] )
      {
        case 'text':
          echo "<td>".$row[$arrelement['dbfield']]."</td>";
        break;
        case 'select':
          echo "<td>".$row[$arrelement['dbfield']]."</td>";
        break;
        case 'time':
          echo "<td>".$row[$arrelement['dbfield']]."</td>";
        break;
        case 'date':
          echo "<td>".$row[$arrelement['dbfield']]."</td>";
        break;
        case 'calcaddsum':
          $nachkomma=2;
          $wert=strval($row[$arrelement['dbfield']]);
          if ($arrelement['calcfield']!="") {
            $wert=$wert - strval($row[$arrelement['calcfield']]);
            $wert=$wert * strval($arrelement['calcfix']);
            $zeitpreis=strval($row[$arrelement['calcaddfield']])*strval($row[$arrelement['calcadddbfield']]);
            //echo $arrelement['calcaddfield']."<br>"; 
            $wert=$wert + $zeitpreis;
          }
          $sumadd=$sumadd+$wert;
          echo "<td style='text-align:right;padding-right:10px;' width='".$arrelement['width']."'>".sprintf("%.".$nachkomma."f",$wert)."</td>";
        break;
        case 'calcdiffsum':
          $nachkomma=2;
          $wert=strval($row[$arrelement['dbfield']]);
          if ($arrelement['calcfield']!="") {
            $wert=$wert - strval($row[$arrelement['calcfield']]);
            $wert=$wert * strval($arrelement['calcfix']);
          }
          echo "<td style='text-align:right;padding-right:10px;' width='".$arrelement['width']."'>".sprintf("%.".$nachkomma."f",$wert)."</td>";
        break;
        case 'calcdiff':
          $nachkomma=0;
          $wert=strval($row[$arrelement['dbfield']]);
          if ($arrelement['calcfield']!="") {
            $wert=$wert - strval($row[$arrelement['calcfield']]);
          }
          echo "<td style='text-align:right;padding-right:10px;' width='".$arrelement['width']."'>".sprintf("%.".$nachkomma."f",$wert)."</td>";
        break;
        case 'calc':
          $nachkomma=2;
          $wert=strval($row[$arrelement['dbfield']]);
          if ($arrelement['calcfield']!="") {
            $wert=$wert * strval($row[$arrelement['calcfield']]);
          }
          $sum=$sum+$wert;
          echo "<td style='text-align:right;padding-right:10px;' width='".$arrelement['width']."'>".sprintf("%.".$nachkomma."f",$wert)."</td>";
        break;
        case 'calcsum':
          $nachkomma=2;
          $wert=strval($row[$arrelement['dbfield']]);
          //$calcsum=$calcsum+$wert+$startsum;
          $calcsum=$calcsum+$wert;
          echo "<td style='text-align:right;padding-right:10px;' width='".$arrelement['width']."'>".sprintf("%.".$nachkomma."f",$calcsum)."</td>";
        break;
      }
    }
  }
  echo "<td><a href='mark.php?menu=".$menu."&id=".$row['fldindex']."' class='btn btn-primary btn-sm active' role='button'>OK</a></td> ";
  echo "<td><a href='update.php?menu=".$menu."&id=".$row['fldindex']."' class='btn btn-primary btn-sm active' role='button'>U</a></td> ";
  echo "<td><a href='delete.php?menu=".$menu."&id=".$row['fldindex']."' class='btn btn-primary btn-sm active' role='button'>D</a></td>";
  echo "</tr>";
  $menge = array_push ( $dbselarr, $row[$pararray['fldindex']] );
}
$_SESSION['DBSELARR']=$dbselarr;
echo "<tr>";
foreach ( $listarray as $arrelement ) {
  if ($arrelement['fieldhide']!="true") {
    switch ( $arrelement['type'] )
    {
      case 'text':
        echo "<td></td>";
      break;
      case 'select':
        echo "<td></td>";
      break;
      case 'date':
        echo "<td></td>";
      break;
      case 'time':
        echo "<td></td>";
      break;
      case 'calcdiffsum':
        echo "<td></td>";
      break;
      case 'calcdiff':
        echo "<td></td>";
      break;
      case 'calc':
        $nachkomma=2;
        echo "<td style='text-align:right;padding-right:10px;'>".sprintf("%.".$nachkomma."f",$sum)."</td>";
      break;
      case 'calcaddsum':
        $nachkomma=2;
        echo "<td style='text-align:right;padding-right:10px;'>".sprintf("%.".$nachkomma."f",$sumadd)."</td>";
      break;
    }
  }
}
echo "</tr>";
echo "</table>";
bootstrapend();
?>