<html>
<body>
<div align="center" style="font-family: Arial, Verdana">
<form action="unterweisungspeichern.php" method="post">
	<table style="width: 300px;">
		<tr height=70 valign="top">
			<td colspan=2 align="left"><a href=index.html><button type="button" style="height: 30px; width: 100%;">zurück</button></a>
			</td>
		</tr><tr>
			<td colspan=2 align="center"><b>
<?php
   date_default_timezone_set("Europe/Berlin");

   $dz=fopen("../privat/data.csv","a");
        if(!$dz)
          {
            echo "Datei konnte nicht zum Schreiben geöffnet werden.";
            exit;
          }

    fputs($dz,date("Y-m-d").",".$_POST["vorname"].",".$_POST["nachname"].","
        .$_POST["mail"].",".$_POST["id"]."\n");

        echo "Unterweisung wurde gespeichert.";

    fclose($dz);

?></b></td>
		</tr>
	</table>

</form>
</div>
</body>
</html>