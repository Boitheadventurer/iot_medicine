#include <Servo.h>
Servo myservo;
String Input;

void setup() {
  Serial.begin(115200);
  myservo.attach(D4);
  delay(150);
}

void loop() {
  /*
  if (Serial.available()) {
    Input = Serial.readString();
    Serial.print("Set Servo to : "); Serial.println(Input);
    delay(150);
    myservo.write(Input.toInt());
    delay(3000);
  }
  delay(150);
  */

  for (int x = 0; x <= 180; x += 16) {
    myservo.write(x);
    Serial.println(x);
    delay(5000);
  }
  delay(1500 * 10);
  Serial.println("New loop testing");
}
