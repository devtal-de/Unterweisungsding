<?php

date_default_timezone_set("Europe/Berlin");
require './privat/config.php';


$ZUGANG = array();
echo file_get_contents('./privat/enabled'); // Maschinenfreigabe
echo sha1(SCHLUESSEL . strtolower(MASTER)); // Masterkarte 

if (($handle = fopen("./privat/data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	// Wenn das "gültig bis" Datum in der CSV in der zukunft liegt:
	if ( strtotime("-" . INTERVALL) < strtotime($data[0]) ) {
        	echo sha1(SCHLUESSEL . strtolower($data[4]));
	}
    }
    fclose($handle);
}
echo "\n";
?>



