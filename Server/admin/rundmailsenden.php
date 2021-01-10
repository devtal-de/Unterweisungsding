<html>
<body>
<div align="center" style="font-family: Arial, Verdana">
	<table style="width: 300px;">
		<tr height=70 valign="top">
			<td colspan=2 align="left"><a href=index.html><button type="button" style="height: 30px; width: 100%;">zurück</button></a>
			</td>
		</tr><tr>
			<td colspan=2 align="center"><b>
<?php
$csvFile = "../privat/data.csv";

require '../privat/config.php';

$handle = fopen($csvFile, "r");
$counter = 0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	if(($counter != 0)) {
		$text = str_replace('*Vorname*', $data[1], $_POST["text"]);
		$text = str_replace('*Name*', $data[2], $text);
		$text = str_replace('*Datum*', date("d.m.Y", strtotime($data[0])), $text);
		$betreff = str_replace('*Vorname*', $data[1], $_POST["betreff"]);
		$betreff = str_replace('*Name*', $data[2], $betreff);
		$betreff = str_replace('*Datum*', date("d.m.Y", strtotime($data[0])), $betreff);
		mail($data[3], $betreff, $text, "From: ".REMINDERADMIN);
  }
 
  $counter++;
}
fclose($handle);

echo "Mail wurde versendet.";

?></b></td>
		</tr>
	</table>

</form>
</div>
</body>
</html>