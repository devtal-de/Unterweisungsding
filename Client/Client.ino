#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Hash.h>


// GPIOs
#define PIN_RLS 0 //D3 - Relais
#define PIN_LED1 16 //D0 - rote LED
#define PIN_LED2 2 //D4 - grüne LED
#define SS_PIN 4  //D1 - RFID
#define RST_PIN 5 //D2 - RFID

//WLAN und Url
const char* ssid     = "xxx";
const char* password = "xxx";
const char* host = "xxx";
const char* url = "xxx";
const uint16_t port = 80;
const char* SCHLUESSEL= "xxx";


// Veriablen
String ID = "";
bool success = false;
int lastupdate = 0;
String hashes = "";
String hash = "";
bool enabled = false;



// RFID
MFRC522 rfid(SS_PIN, RST_PIN); // Instance of the class



#include "LED.h"
#include "UPDATE.h"
#include "RFID.h"


void setup() {
  digitalWrite(PIN_LED1, HIGH);
  Serial.begin(115200);
  
//GPIOs
  pinMode(PIN_RLS, OUTPUT);
  pinMode(PIN_LED1, OUTPUT);
  pinMode(PIN_LED2, OUTPUT);
  digitalWrite(PIN_RLS, LOW);
  digitalWrite(PIN_LED1, LOW);
  digitalWrite(PIN_LED2, LOW);

// RFID
  SPI.begin();
  rfid.PCD_Init();

// WIFI
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  while (true) {
    update();
    if (hashes != "") {
      lastupdate = millis();
      break;
    }
  }
}


void loop() {

    ID = "";
    
    if (!enabled) {
      flashred(); // rot blitzen, wenn die Maschine gesperrt ist
    } else {
      success = false;
      handleRFID();
      handleRFID(); // Liest nur beim zweiten Mal die Karte richtig - warum auch immer??
    
      if (ID != "") {
        
        hash = sha1(SCHLUESSEL + ID);
        for(int pos=0; pos<hashes.length(); pos=pos+40){
          if (hash == hashes.substring(pos,(pos+40))) {
            success = true;
          }
        }
        if (success) {    // Erlaubt: grüne LED an, rote LED aus, Relais schaltet
          Serial.println("Erlaubt!");
          digitalWrite(PIN_LED1, LOW);
          digitalWrite(PIN_LED2, HIGH);
          digitalWrite(PIN_RLS, HIGH); 
        }
        if (!success) {   // Verweigert: rote LED an, grüne LED aus, Relais ausschalten
          Serial.println("Verweigert!");
          digitalWrite(PIN_LED1, HIGH);
          digitalWrite(PIN_LED2, LOW);
          digitalWrite(PIN_RLS, LOW); 
          update(); // Verweigerte Karte löst ein Update aus - so kann die Maschine sofort nach der Unterweisung genutzt werden. 
          Serial.println("Hashes: " + hashes);
          lastupdate = millis();
        }
        delay(500);
        
      } else {  // Standby (keine ID eingelesen): grün blitzen und Relais ausschalten
        
        digitalWrite(PIN_LED1, LOW);
        digitalWrite(PIN_RLS, LOW); 
        flashgreen();
      }
    }
 
    //viertelstündlich aktuelle Zugang-Hashes abholen 
    //aber nur wenn gerade keine ID eingelesen ist, um Chaos zu vermeiden.
    if ( (ID == "") && (lastupdate + 900000 < millis()) ) {
      update();
      Serial.println("Hashes: " + hashes);
      lastupdate = millis();  
    }
}
