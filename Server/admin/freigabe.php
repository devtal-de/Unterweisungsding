<?php
if ($_POST['form_exist']) {
	if ($_POST["freigabe"] == 'true') {
		$enabled = 'true';
	} else {
		$enabled = 'false';
	}
	file_put_contents('../privat/enabled', $enabled);
}
?>


<html>
<body>
<div align="center" style="font-family: Arial, Verdana">
<form action="freigabe.php" method="post">
<input type="hidden" name="form_exist" value=TRUE>
	<table style="width: 300px;">
		<tr height=70 valign="top">
			<td colspan=2 align="left"><a href=index.html><button type="button" style="height: 30px; width: 100%;">zurück</button></a>
			</td>
		</tr><tr>
			<td colspan=2 align="center"><b>Maschinenfreigabe</b></td>
		</tr><tr>
			<td colspan=2><br></td>
		</tr><tr>
			<td colspan=2><input type="checkbox" name="freigabe" value="true"

<?php
if (file_get_contents('../privat/enabled') == 'true') echo 'checked';
?>

> Maschine freigegeben</td>
		</tr><tr>
			<td colspan=2><br></td>
		</tr><tr>
		       <td colspan=2 align="right"><input type="submit" value="absenden" style="height: 30px;"></td>
		</tr>
	</table>

</form>
</div>
</body>
</html>