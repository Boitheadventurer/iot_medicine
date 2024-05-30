#include <Servo.h>
Servo myservo;
String Input;

void setup() {
  Serial.begin(115200);
  myservo.attach(D4);
}

void loop() {
  myservo.writeMicroseconds(1250);
  delay(145);
  myservo.writeMicroseconds(1500);
  delay(500*10);

  /*
  if (Serial.available()) {
    Input = Serial.readString();
    Serial.print("Delay == "); Serial.println(Input);
    delay(150);

    myservo.writeMicroseconds(1250);
    delay(Input.toInt());
    myservo.writeMicroseconds(1500);
    delay(2000);
  }*/
}
