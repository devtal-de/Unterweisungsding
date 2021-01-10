void update() {
  digitalWrite(PIN_LED1, HIGH); //rote LED ein
  
  Serial.print("connecting to ");
  Serial.print(host);
  Serial.print(':');
  Serial.println(port);

  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(host, port)) {
    Serial.println("connection failed");
    return;
  }

  // This will send a string to the server
  Serial.print("requesting URL: ");
  Serial.println(url);
  if (client.connected()) {
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  }

  // wait for data to be available
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }

  String line = "";
  digitalWrite(PIN_LED1, HIGH);
  digitalWrite(PIN_LED2, LOW);
  while (client.connected()) {
    line = client.readStringUntil('\n');
    // Maschinenstatus (gesperrt/freigegeben)
    if (line.startsWith("false")) {
      Serial.println("keine Freigabe");
      enabled = false;
    }
    // Zugangshashes
    if (line.startsWith("true")) {
      Serial.println("Freigabe");
      enabled = true;
      hashes = line.substring(4); //alle Hashes werden hier einfach in einen String gespeichert - lässt sich sicher hübscher lösen
    }
  }
  
  Serial.println("Hashes: " + hashes);
  
  // Close the connection
  Serial.println("closing connection");
  client.stop();
}
