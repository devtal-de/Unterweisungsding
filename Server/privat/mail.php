<?php
date_default_timezone_set("Europe/Berlin");

require './config.php'; //Ausführen über cronjob: absoluten Pfad angeben!

if (($handle = fopen("./data.csv", "r")) !== FALSE) { //Ausführen über cronjob: absoluten Pfad angeben!
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	
	if ( date("d.m.Y",strtotime("-" . REMINDERDATUM)) == date("d.m.Y",strtotime($data[0])) ) {
		$text = str_replace('*Vorname*', $data[1], REMINDERTEXT);
		$text = str_replace('*Name*', $data[2], $text);
		mail($data[3], REMINDERBETREFF, $text, "From: ".REMINDERADMIN."\r\n Bcc: ".REMINDERADMIN);
	}
    }
    fclose($handle);
}

?>