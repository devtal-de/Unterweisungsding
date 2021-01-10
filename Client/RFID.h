String printHex(byte *buffer, byte bufferSize) {
  String idt = "";
  for (byte i = 0; i < bufferSize; i++) {
    idt += buffer[i] < 0x10 ? "0" : "";
    idt += String(buffer[i], HEX);
  }
  return idt;
}

void handleRFID() {
  if (!rfid.PICC_IsNewCardPresent()) return;
  if (!rfid.PICC_ReadCardSerial()) return;

  ID = printHex(rfid.uid.uidByte, rfid.uid.size);
  
  Serial.print("Karte erkannt: ");
  Serial.println(ID);

}
