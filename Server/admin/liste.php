<html>
<body>
<div align="center" style="font-family: Arial, Verdana">
	<table style="width: 300px;">
		<tr height=70 valign="top">
			<td colspan=4 align="left"><a href=index.html><button type="button" style="height: 30px; width: 100%;">zurück</button></a>
			</td>
		</tr><tr height=30 valign="top">
			<td colspan=4 align="center"><b>Unterweisungen ansehen</b></td>
		</tr>
	</table>
	<table style="width: 500px;" rules="rows">
<?php
 
// Konfiguration
$csvFile = "../privat/data.csv";
 
// Daten auslesen und Tabelle generieren
$handle = fopen($csvFile, "r");
$counter = 0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
 
  echo "<tr>";
  if(($counter == 0)) {
    echo "<th align=\"left\">".$data[0]."</th>";
    echo "<th align=\"left\">".$data[1]."</th>";
    echo "<th align=\"left\">".$data[2]."</th>";
    echo "<th align=\"left\">".$data[3]."</th>";
  }
  else {
    echo "<td>".date("d.m.Y", strtotime($data[0]))."</td>";
    echo "<td>".$data[1]."</td>";
    echo "<td>".$data[2]."</td>";
    echo "<td>".$data[3]."</td>";
  }
  echo "</tr>";
 
  $counter++;
}
fclose($handle);
?>
	</table>
</div>
</body>
</html>