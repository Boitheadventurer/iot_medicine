#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Servo.h>
#include <String.h>
#include <TridentTD_LineNotify.h>
//#include <Wire.h>
Servo myservo;

#define sensor D5
int x, i, k, val;

/*2.4G*/
const char* ssid = "CTN floor 2 teacher"; // Wi-Fi SSID
const char* password = "ctnphrae"; // Wi-Fi password

const char* LINE_TOKEN = "QIChSQJdNBnK08VtgMSjRPhikDUQVGP3ikBPexwgQFU";

// URL by file PHP (http://(IP4)/(folder)(file.php))

String POSTURL = "http://medicine5iot.000webhostapp.com/post.php";
String GETURL  = "http://medicine5iot.000webhostapp.com/get.php";

//String POSTURL = "http://192.168.10.41/Medic/post.php";
//String GETURL  = "http://192.168.10.41/Medic/get.php";

WiFiClient client;
HTTPClient http;
int httpCode;

//***GET***//
int UserID; // UserID
String time_get;
String Fullname;

// Time meal
String bf_time;
String lun_time;
String dn_time;
String bb_time;

//Medic take follow ID
int bf_medic[4];
int lun_medic[4];
int dn_medic[4];
int bb_medic[4];
int medic_send[4];

int meal; // Meal for send data_tb
String status; // Status medicine success

void setup() {
  Serial.begin(115200);
  pinMode(sensor, INPUT);
  myservo.attach(D4);
  //Wire.begin(); // Start the I2C
  connectWiFi(); // Connect WiFi function

  //condition_GET();
  http.begin(client, GETURL);
  httpCode = http.GET();
  String payload = http.getString();
  Serial.print("HTTP_GET Response Code: "); Serial.println(httpCode);
  delay(5000);
  while (httpCode != 200) {
    Serial.print(".");
    condition_GET();
    delay(500);
  }
  Serial.print("Connect Code: "); Serial.println(httpCode);
  Serial.println(LINE.getVersion());
  LINE.setToken(LINE_TOKEN);
  LINE.notify("SETUP COMPLETE");
  Serial.print("payload: ");    Serial.println(payload);
  Serial.println("----------SETUP CONTROL.INO READY--------------");
  delay(250);
}

void loop() {
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print("-");
    connectWiFi();
    delay(500);
  }
  while (UserID <= 0 || httpCode != 200) {
    Serial.print("=");
    condition_GET();
    delay(500);
  }
  val = digitalRead(sensor);
  condition_GET();
  condition_CHECK();
  delay(1000 * 10);
}

// ConnectWiFi
void connectWiFi() {
  WiFi.mode(WIFI_OFF);
  delay(1000);
  //This line hides the viewing of ESP as wifi hotspot
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.print("connected to : ");  Serial.println(ssid);
  Serial.print("IP address: ");     Serial.println(WiFi.localIP());
}

// Servo rotate counter-clockwise full-speed
void rotateservo() {
  myservo.writeMicroseconds(1250);
}

// Servo rotation stopped
void stopservo() {
  myservo.writeMicroseconds(1500);
}

// Condition_GET
void condition_GET() {
  http.begin(client, GETURL);
  httpCode = http.GET();
  String payload = http.getString();
  //Serial.print("HTTP_GET Response Code: "); Serial.println(httpCode);
  //Serial.print("payload : ");               Serial.println(payload);

  // GET UserID from INPUT Website
  int index = payload.indexOf("UserID=");
    String userIDString = payload.substring(index + 7);
    UserID = userIDString.toInt();

  // GET RealTime from PHP
  int t = payload.indexOf("time=");
    String tt = payload.substring(t + 5);
    int substr_tt = tt.indexOf("UserID=");
    tt = tt.substring(0, substr_tt);
  time_get = tt;
  
  /**/
  // GET Fullname = firstname + lastname
  int n = payload.indexOf("Fullname=");
    String nn = payload.substring(n + 9);
    int substr_nn = nn.indexOf("bf_time=");
    nn = nn.substring(0, substr_nn);
  Fullname = nn;
  /**/

  // GET bf_time
  int bf = payload.indexOf("bf_time=");
    String bf_timeString = payload.substring(bf + 8);
    int substr_bf = bf_timeString.indexOf("bf_medic");
    bf_timeString = bf_timeString.substring(0, substr_bf);
  bf_time = bf_timeString;
  int bf1 = payload.indexOf("bf_medic1=");
    String bf1_String = payload.substring(bf1 + 10);
    bf_medic[0] = bf1_String.toInt();
  int bf2 = payload.indexOf("bf_medic2=");
    String bf2_String = payload.substring(bf2 + 10);
    bf_medic[1] = bf2_String.toInt();
  int bf3 = payload.indexOf("bf_medic3=");
    String bf3_String = payload.substring(bf3 + 10);
    bf_medic[2] = bf3_String.toInt();
  int bf4 = payload.indexOf("bf_medic4=");
    String bf4_String = payload.substring(bf4 + 10);
    bf_medic[3] = bf4_String.toInt();

  // GET lun_time
  int lun = payload.indexOf("lun_time=");
    String lun_timeString = payload.substring(lun + 9);
    int substr_lun = lun_timeString.indexOf("lun_medic");
    lun_timeString = lun_timeString.substring(0, substr_lun);
  lun_time = lun_timeString;
  int lun1 = payload.indexOf("lun_medic1=");
    String lun1_String = payload.substring(lun1 + 11);
    lun_medic[0] = lun1_String.toInt();
  int lun2 = payload.indexOf("lun_medic2=");
    String lun2_String = payload.substring(lun2 + 11);
    lun_medic[1] = lun2_String.toInt();
  int lun3 = payload.indexOf("lun_medic3=");
    String lun3_String = payload.substring(lun3 + 11);
    lun_medic[2] = lun3_String.toInt();
  int lun4 = payload.indexOf("lun_medic4=");
    String lun4_String = payload.substring(lun4 + 11);
    lun_medic[3] = lun4_String.toInt();

  // GET dn_time
  int dn = payload.indexOf("dn_time=");
    String dn_timeString = payload.substring(dn + 8);
    int substr_dn = dn_timeString.indexOf("dn_medic");
    dn_timeString = dn_timeString.substring(0, substr_dn);
  dn_time = dn_timeString;
  int dn1 = payload.indexOf("dn_medic1=");
    String dn1_String = payload.substring(dn1 + 10);
    dn_medic[0] = dn1_String.toInt();
  int dn2 = payload.indexOf("dn_medic2=");
    String dn2_String = payload.substring(dn2 + 10);
    dn_medic[1] = dn2_String.toInt();
  int dn3 = payload.indexOf("dn_medic3=");
    String dn3_String = payload.substring(dn3 + 10);
    dn_medic[2] = dn3_String.toInt();
  int dn4 = payload.indexOf("dn_medic4=");
    String dn4_String = payload.substring(dn4 + 10);
    dn_medic[3] = dn4_String.toInt();

  // GET bb_time by UserID
  int bb = payload.indexOf("bb_time=");
    String bb_timeString = payload.substring(bb + 8);
    int substr_bb = bb_timeString.indexOf("bb_medic");
    bb_timeString = bb_timeString.substring(0, substr_bb);
  bb_time = bb_timeString;
  int bb1 = payload.indexOf("bb_medic1=");
    String bb1_String = payload.substring(bb1 + 10);
    bb_medic[0] = bb1_String.toInt();
  int bb2 = payload.indexOf("bb_medic2=");
    String bb2_String = payload.substring(bb2 + 10);
    bb_medic[1] = bb2_String.toInt();
  int bb3 = payload.indexOf("bb_medic3=");
    String bb3_String = payload.substring(bb3 + 10);
    bb_medic[2] = bb3_String.toInt();
  int bb4 = payload.indexOf("bb_medic4=");
    String bb4_String = payload.substring(bb4 + 10);
    bb_medic[3] = bb4_String.toInt();
}

// Condition_CHECK data before POST ***
void condition_CHECK() {
  if (time_get == bf_time && x == 0 && UserID != 0 && httpCode == 200) {
      meal = 1;
      medic_send[0] = bf_medic[0];
      medic_send[1] = bf_medic[1];
      medic_send[2] = bf_medic[2];
      medic_send[3] = bf_medic[3];
      condition_CHECK_send();
  } else if (time_get == lun_time && x == 0 && UserID != 0 && httpCode == 200) {
      meal = 2;
      medic_send[0] = lun_medic[0];
      medic_send[1] = lun_medic[1];
      medic_send[2] = lun_medic[2];
      medic_send[3] = lun_medic[3];
      condition_CHECK_send();
  } else if (time_get == dn_time && x == 0 && UserID != 0 && httpCode == 200) {
      meal = 3;
      medic_send[0] = dn_medic[0];
      medic_send[1] = dn_medic[1];
      medic_send[2] = dn_medic[2];
      medic_send[3] = dn_medic[3];
      condition_CHECK_send();
  } else if (time_get == bb_time && x == 0 && UserID != 0 && httpCode == 200) {
      meal = 4;
      medic_send[0] = bb_medic[0];
      medic_send[1] = bb_medic[1];
      medic_send[2] = bb_medic[2];
      medic_send[3] = bb_medic[3];
      condition_CHECK_send();
  }
}

// Condition in condition_CHECK
void condition_CHECK_send() {
  Serial.println("Time to medicine!");
  LINE.notify("ถึงเวลาที่กำหนดจ่ายยาแล้ว!");
  rotateservo();
  delay(147);
  stopservo();
  delay(1000);
  x = 1;
  condition_grap();
}

// Condition grap after time_get == time_meal
void condition_grap() {
  if (x == 1 && val == 0) {
    delay(1000);
    k++;
    if (k >= 900) {
      Serial.println("Take medicine failed!");
      status = "'failed'";
      LINE.notify("\nผู้ป่วย คุณ \n" + Fullname + "ไม่ได้รับยาในเวลาที่กำหนด!");
      LINE.notifyPicture("ไม่สำเร็จ!", "https://www.shareicon.net/data/256x256/2015/09/15/101562_incorrect_512x512.png");
      condition_POST();
      k = 0;
    }
  } else if (x == 1 && val == 1) {
    Serial.println("Take medicine success!");
    status = "'success'";
    LINE.notify("\nผู้ป่วย คุณ \n" + Fullname + "ได้รับยาในเวลาที่กำหนด!");
    LINE.notifyPicture("สำเร็จ!", "https://cdn-icons-png.flaticon.com/512/4436/4436481.png");
    condition_POST();
    k = 0;
  }
}

// Condition_POST after condition_CHECK
void condition_POST() {
  String postData = "UserID=" + String(UserID) + "&meal=" + String(meal) + 
  "&medic_send1=" + String(medic_send[0]) + "&medic_send2=" + String(medic_send[1]) + 
  "&medic_send3=" + String(medic_send[2]) + "&medic_send4=" + String(medic_send[3]) + 
  "&status=" + String(status);
  WiFiClient client;
  HTTPClient http;
  http.begin(client, POSTURL);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // ***Send data
  int httpCode = http.POST(postData);
  String payload = http.getString();
  Serial.print("HTTP_POST Response Code: "); Serial.println(httpCode);
  Serial.print("POSTURL : "); Serial.println(POSTURL); 
  Serial.print("Data: ");     Serial.println(postData);
  Serial.print("payload : "); Serial.println(payload);
  delay(1000 * 60 * 2);
  condition_GET();
  x = 0;
  delay(150);
  loop();
}
