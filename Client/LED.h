
int lastgreenflash = 0;
int lastredflash = 0;
bool statusgreen;
bool statusred;


void flashgreen() {
  if ((!statusgreen) && (lastgreenflash + 1500 < millis())) {
    statusgreen = HIGH;
    lastgreenflash = millis();
    digitalWrite(PIN_LED2, statusgreen);
  } 
  if ((statusgreen) && (lastgreenflash + 50 < millis())) {
    statusgreen = LOW;
    lastgreenflash = millis();
    digitalWrite(PIN_LED2, statusgreen);
  } 
}

void flashred() {
  if ((!statusred) && (lastredflash + 1500 < millis())) {
    statusred = HIGH;
    lastredflash = millis();
    digitalWrite(PIN_LED1, statusred);
  } 
  if ((statusred) && (lastredflash + 50 < millis())) {
    statusred = LOW;
    lastredflash = millis();
    digitalWrite(PIN_LED1, statusred);
  } 
}
