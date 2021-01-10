# Unterweisungsding

Das hier kann:

Server:
* Unterweisungen für eine Maschine online dokumentieren
* Unterwiesene Personen haben eine RFID-Karte
* die Unterweisungen sind nur einen bestimmten Zeitraum gültig
* vor Ablauf der Gültigkeit wird eine Erinnerungsmail verschickt
* Rundmail an alle unterwiesenen Personen schicken
* Maschine freigeben oder sperren


Client:
* Schaltet die Maschine mit "unterwiesener" RFID-Karte frei
* lässt sich auch als Türöffner nutzen (z.B. in Kombination mit Türsummer)
* ESP8266 mit MRC522 RFID-Reader, einem Relais und zwei LEDs (grün/rot)
* nach dem Booten läd der ESP8266 die IDs der Personen mit gültiger Unterweisung runter 
* solange eine RFID-Karte mit aktuell "unterwiesener" ID an den Reader gehalten wird, leuchtet die grüne LED und das Relais schaltet (Maschine wird freigeschaltet)
* wird die Karte weggenommen, fällt das Relais wieder ab (Maschine wird gesperrt)
* eine ungültige Karte lässt die rote LED leuchten



Was noch getan werden könnte:
* Code verbessern...
* Serverseitig alles besser, sicherer, hübscher machen
* Verwaltung für mehrere Maschinen
* Verwaltung der unterwiesenen Personen
* Unterweisungen nach Ablauf einer bestimmten Zeit wieder löschen
* Personen sperren/Unterweisungen manuell löschen
* dynamische Gültigkeit der Unterweisungen (Berücksichtigung von Routine/Nicht-Routine im Umgang mit der Maschine - z.B. bei regelmäßiger Benutzung ist eine Unterweisung max. ein Jahr lang gültig, bei Nichtbenutzung läuft sie nach einem Vierteljahr ab)
* Platinenlayout für den Client
