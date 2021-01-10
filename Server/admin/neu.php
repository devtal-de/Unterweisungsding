<html>
<body>
<div align="center" style="font-family: Arial, Verdana">
<form action="unterweisungspeichern.php" method="post">
	<table style="width: 300px;">
		<tr height=70 valign="top">
			<td colspan=2 align="left"><a href=index.html><button type="button" style="height: 30px; width: 100%;">zurück</button></a>
			</td>
		</tr><tr>
			<td colspan=2 align="center"><b>Unterweisung dokumentieren</b></td>
		</tr><tr>
			<td>Datum:</td><td><input type="text" name="datum" value="
<?php
 	date_default_timezone_set("Europe/Berlin");
	echo date("d.m.Y");
?>" disabled style="width: 100%;"></td>
		</tr><tr>
			<td>Vorname:</td><td><input type="text" name="vorname" style="width: 100%;"></td>
		</tr><tr>
		       <td>Nachname:</td><td><input type="text" name="nachname" style="width: 100%;"></td>
		</tr><tr>
		       <td>E-Mail:</td><td><input type="text" name="mail" style="width: 100%;"></td>
		</tr><tr>
		       <td>ID:</td><td><input type="text" name="id" style="width: 100%;"></td>
		</tr><tr>
		       <td align="left"><input type="reset" value="löschen" style="height: 30px;"></td><td align="right"><input type="submit" value="speichern" style="height: 30px;"></td>
		</tr>
	</table>

</form>
</div>
</body>
</html>
