int digitalPin = D4;
int buzzer = D5;
int val = 0;
void setup() {
  pinMode(digitalPin, INPUT);
  pinMode(buzzer, OUTPUT);
  Serial.begin(115200);
}

void loop() {
  val = digitalRead(digitalPin);
  if (val == 0) { // Condition working at val == 0 (IR sensor active)
    Serial.println("OMG, IR sensor working!");
    digitalWrite(buzzer,1);
  } else if (val == 1) {
    Serial.println("None");
    digitalWrite(buzzer,0);
  }
  delay(500);
}
