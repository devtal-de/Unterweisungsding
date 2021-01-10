<?php
define('SCHLUESSEL', "####"); // Privater Schlüssel für die Kommunikation mti dem ESP
define('MASTER', "####"); // Masterkarte, die dauerhaft gültig ist
define('INTERVALL', "365 Days"); // Gültigkeitsdauer einer Unterweisung
define('REMINDERDATUM',  "351 Days"); // Zeitpunkt, bei dem eine Erinnerung geschickt wird (Angabe in *Tage nach der Unterweisung*)
define('REMINDERBETREFF',  "Deine Unterweisung läuft ab"); // Betreff der Erinnerungsmail
define('REMINDERTEXT', "Hallo *Vorname*, deine Unterweisung läuft in zwei Wochen ab. Denk bitte rechtzeitig an einer Aktualisierung!"); // Text der Erinnerungsmail
define('REMINDERADMIN', "####"); // Absender der Erinnerungsmail
?>