#include <Adafruit_GFX.h>
#include <Adafruit_ST7735.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Keypad_I2C.h>
#include <Keypad.h>
#include <Wire.h>
#include <WiFiManager.h>  // เพิ่ม WiFiManager

// URL by file PHP (http://(IP4)/(folder)(file.php))
String GETURL = "GETURL";
String UPDURL = "UPDURL";
String COUNTS = "COUNTS";

WiFiClient client;
HTTPClient http;
int httpCode;

#define TFT_CS   D8
#define TFT_RST  D4
#define TFT_DC   D3

Adafruit_ST7735 tft = Adafruit_ST7735(TFT_CS, TFT_DC, TFT_RST);

String time_get;
int warn;

int UserID;
String Name;
String BF;
String LUN;
String DN;
String BB;

String Clect;
String txt_meal;
String key_get;

int Count_medicine;

char key;
int count_q;

#define I2CADDR 0x21

const byte ROWS = 4;
const byte COLS = 4;

char keys[ROWS][COLS] = {
  {'D','C','B','A'},
  {'#','9','6','3'},
  {'0','8','5','2'},
  {'*','7','4','1'}
};

byte rowPins[ROWS] = {0, 1, 2, 3};
byte colPins[COLS] = {4, 5, 6, 7};

Keypad_I2C keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS, I2CADDR, PCF8574 );

void setup() {
  Serial.begin(115200);
  Wire.begin();
  keypad.begin( makeKeymap(keys) );
  tft.initR(INITR_BLACKTAB);
  tft.fillScreen(ST77XX_BLACK);
  connectWiFi();  // เชื่อมต่อ Wi-Fi ผ่าน WiFiManager
  http.begin(client, GETURL);
  httpCode = http.GET();
  String payload = http.getString();
  Serial.print("HTTP Response Code: "); Serial.println(httpCode);
  Serial.print("payload: ");          Serial.println(payload);
  Serial.println("------------SETUP OUTPUT.INO READY-----------");
}

void loop() {
  while (WiFi.status() != WL_CONNECTED) {
    connectWiFi();
    Serial.print("-");
    delay(500);
  }

  while (UserID <= 0) {
    condition_GET_tft();
    Serial.print("=");
    delay(500);
  }

  tft.fillScreen(ST77XX_BLACK);
  condition_GET_tft();
  layout();
  tft_text();
  for (int h = 0; h <= 200; h++) {
    key = keypad.getKey();
    if (key == '*') {
      start_edit();
    }
    if (key == '#') {
    tft.fillScreen(ST77XX_BLACK);
    delay(150);
    layout();
    tft.setTextColor(ST77XX_YELLOW);
    tft.setTextSize(1);
    tft.setCursor(15, 9);
    tft.print("SETTING , RESET");
    tft.setTextColor(ST77XX_WHITE);
    tft.setTextSize(2);
    tft.setCursor(10, 65);
    tft.print("'*' , '#'");
    
    unsigned long startMillis = millis(); // เริ่มจับเวลา
    unsigned long timeout = 10000; // กำหนด timeout เป็น 10 วินาที
    while (millis() - startMillis < timeout) { 
        key = keypad.getKey();
        if (key == '#') {
          condition_CLR(); // ล้างข้อมูลและรีเซ็ต
          return; // ออกจากเงื่อนไขทันทีหลังทำงาน
        } else if (key == '*') {
          edit_count_medicine(); // แก้ไขจำนวนยา
          return; // ออกจากเงื่อนไขทันทีหลังทำงาน
        }
        delay(50); // ลดการโหลดของ CPU
    }
      // หากหมดเวลาแล้วไม่มีการกดปุ่ม ให้กลับไป loop หลัก
      tft.fillScreen(ST77XX_BLACK);
      delay(150);
      layout();
    }   
    delay(50);
  }
}

void edit_count_medicine() {
  tft.fillScreen(ST77XX_BLACK);
  delay(150);
  layout();

  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(5, 10);
  tft.print("Edit Medicine Count");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(10, 50);
  tft.print("Enter New Count:");
  tft.setTextColor(ST77XX_WHITE);
  tft.setTextSize(3);
  tft.setCursor(85, 75);

  String newCount = ""; // ตัวแปรเก็บค่าที่กรอก
  while (true) {
    key = keypad.getKey();
    if (key) {
      if (isdigit(key)) { // ตรวจสอบว่าปุ่มที่กดเป็นตัวเลข
        newCount += key;
        tft.print(key); // แสดงตัวเลขที่กรอกบนจอ
      } else if (key == '*') { // กด '*' เพื่อยืนยันการตั้งค่า
        Count_medicine = newCount.toInt(); // แปลงค่าเป็นจำนวนเต็ม
        tft.fillScreen(ST77XX_BLACK);
        tft.setTextSize(2);
        tft.setCursor(20, 65);
        tft.setTextColor(ST77XX_GREEN);
        tft.print("Updated!");
        String postData = "UserID=" + String(UserID) + "&Count_medicine=" + String(Count_medicine);
        http.begin(client, COUNTS); // URL หลัก
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        int httpCode = http.POST(postData);
        String payload = http.getString();
        Serial.print("HTTP_POST Response Code: "); Serial.println(httpCode);
        Serial.print("COUNTS : "); Serial.println(COUNTS); 
        Serial.print("Data: ");     Serial.println(postData);
        delay(1500);
        break;
      } else if (key == '#') { // กด '#' เพื่อยกเลิก
        tft.fillScreen(ST77XX_BLACK);
        tft.setTextSize(2);
        tft.setCursor(10, 65);
        tft.setTextColor(ST77XX_YELLOW);
        tft.print("Cancelled");
        delay(1500);
        break;
      }
    }
    delay(50);
  }
  tft.fillScreen(ST77XX_BLACK);
  loop(); // กลับไปที่ loop หลัก
}

void start_edit() {
  tft.fillScreen(ST77XX_BLACK);
  delay(150);
  layout();

  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(15, 9);
  tft.print("Choose quantity");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(3);
  tft.setCursor(20, 50);
  tft.print("1 | 2");
  tft.setCursor(20, 80);
  tft.print("3 | 4");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(20, 138);
  tft.print("Setting!");
  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(47, 125);
  tft.print("Status");

  //Loop get quantity
  for (int h = 0; h <= 400; h++) {
    key = keypad.getKey();
    switch (key) {
    case '1':
        count_q = 1;
        choose_alarm();
        break;
    case '2':
        count_q = 2;
        choose_alarm();
        break;
    case '3':
        count_q = 3;
        choose_alarm();
        break;
    case '4':
        count_q = 4;
        choose_alarm();
        break;
    case '#':
        loop();
        break;
    }
    delay(50);
  }
  count_q = 0;
}

void choose_alarm() {
  tft.fillScreen(ST77XX_BLACK);
  delay(150);
  layout();

  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(15, 9);
  tft.print("Choose a period");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(3);
  tft.setCursor(20, 50);
  tft.print("A | B");
  tft.setCursor(20, 80);
  tft.print("C | D");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(20, 138);
  tft.print("Setting!");
  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(47, 125);
  tft.print("Status");

  //Loop get alarm
  for (int h = 0; h <= 400; h++) {
    key = keypad.getKey();
    switch (key) {
    case 'A':
        Clect = "BKF";
        setting();
        break;
    case 'B':
        Clect = "LUN";
        setting();
        break;
    case 'C':
        Clect = "DNR";
        setting();
        break;
    case 'D':
        Clect = "BED";
        setting();
        break;
    case '#':
        count_q = 0;
        loop();
        break;
    }
    delay(50);
  }
  count_q = 0;
}

// Active with A button => Setting Database
void setting() {
  tft.fillScreen(ST77XX_BLACK);
  delay(150);
  layout();

  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(15, 9);
  tft.print("Setting " + Clect + " to..");
  tft.setCursor(31, 45);
  tft.print("HH");
  tft.setCursor(85, 45);
  tft.print("MM");
  tft.setCursor(47, 125);
  tft.print("Status");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(20, 138);
  tft.print("Setting!");
  tft.setTextSize(3);
  tft.setCursor(20, 60); // location print key

  for (int h = 0; h <= 400; h++) { // 20 sec for setting
    key = keypad.getKey();
    if (key) {
      tft.print(key);
      key_get += key;
      if (key_get.length() == 2) { // Check HH:MM
        tft.print(":");
      }
      if (key == '*' && key_get.length() >= 5) { // Check send UPD time
        condition_POST_upd();
      }
      if (key == '#' || key_get.length() >= 5) { // Cancel setting
        tft.fillScreen(ST77XX_BLACK);
        count_q = 0;
        key_get = ""; // Clear key_get
        loop();
      }
    }
    delay(50);
  }
  count_q = 0;
  key_get = "";
}

void connectWiFi() {
  WiFiManager wifiManager;
  wifiManager.autoConnect("ESP8266_AP_Output");  // สร้างชื่อ Access Point
  Serial.println("Connected to WiFi!");
  tft.fillScreen(ST77XX_BLACK);
  Serial.print("IP address: "); Serial.println(WiFi.localIP());
}

//Condition GET tft and meal
void condition_GET_tft() {
  WiFiClient client;
  HTTPClient http;
  http.begin(client, GETURL);
  int httpCode = http.GET();
  String payload = http.getString();

  // UserID
  int index = payload.indexOf("UserID=");
  String userIDString = payload.substring(index + 7);
  UserID = userIDString.toInt();

  // Time
  int t = payload.indexOf("time=");
  String tt = payload.substring(t + 5);
    int chk_name = tt.indexOf("Name=");
    tt = tt.substring(0, chk_name);
  time_get = tt;

  // Fname + Lname
  int name = payload.indexOf("Name=");
  String extractedname = payload.substring(name + 5);
    int bfIndex = extractedname.indexOf("END");
    extractedname = extractedname.substring(0, bfIndex);
  Name = extractedname;

  // TIME_BF
  int bf = payload.indexOf("BF=");
  String stbf = payload.substring(bf + 3);
    int lunIndex = stbf.indexOf("stt_alert=");
    stbf = stbf.substring(0, lunIndex);
  BF = stbf;

  // TIME_LUN
  int lun = payload.indexOf("LUN=");
  String stlun = payload.substring(lun + 4);
    int dnIndex = stlun.indexOf("stt_alert=");
    stlun = stlun.substring(0, dnIndex);
  LUN = stlun;

  // TIME_DIN
  int dn = payload.indexOf("DN=");
  String stdn = payload.substring(dn + 3);
    int bbIndex = stdn.indexOf("stt_alert=");
    stdn = stdn.substring(0, bbIndex);
  DN = stdn;

  // TIME_BB
  int bb = payload.indexOf("BB=");
  String stbb = payload.substring(bb + 3);
    int ddIndex = stbb.indexOf("stt_alert=");
    stbb = stbb.substring(0, bbIndex);
  BB = stbb;
    
  int cots = payload.indexOf("Count_medicine=");
  String stcots = payload.substring(cots + 15);
    int cotsIndex = stcots.indexOf("END");
    stcots = stcots.substring(0, cotsIndex);
  Count_medicine = stcots.toInt();
}

//Condition POST update time bf, lunch, dn, bed
void condition_POST_upd() { 
  tft.fillScreen(ST77XX_BLACK);
  String updateData = "UserID=" + String(UserID) + "&Clect=" + String(Clect) + "&key_get=" + String(key_get);
  WiFiClient client;
  HTTPClient http;
  http.begin(client, UPDURL);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // ***Send data
  int httpCode = http.POST(updateData);
  String payload = http.getString();
  Serial.print("HTTP_UPD Response Code: "); Serial.println(httpCode);
  Serial.print("UPDURL : "); Serial.println(UPDURL); 
  Serial.print("Data: ");     Serial.println(updateData);
  Serial.print("payload : "); Serial.println(payload);              //Check data send
  if (httpCode == 200) {
    tft.setCursor(17, 65);
    tft.setTextSize(2);
    tft.setTextColor(ST77XX_GREEN);
    tft.print("SUCCESS!");
  } else {
    tft.setCursor(7, 65);
    tft.setTextSize(2);
    tft.setTextColor(ST77XX_YELLOW);
    tft.print("TRY AGAIN!");
  }
  condition_GET_tft();
  delay(1500);
  key_get = ""; // Clear key_get
  tft.fillScreen(ST77XX_BLACK);
  count_q--;
  if (count_q <= 0) {
    loop();
  } else if (count_q >= 1) {
    choose_alarm();
  }
}

//Condition '#' to Clear Database all setting
void condition_CLR() {
  tft.fillScreen(ST77XX_BLACK);
  String updateData = "UserID=" + String(UserID);
  WiFiClient client;
  HTTPClient http;
  http.begin(client, UPDURL);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // ***Send data
  int httpCode = http.POST(updateData);
  String payload = http.getString();
  Serial.print("HTTP_UPD Response Code: "); Serial.println(httpCode);
  Serial.print("UPDURL : "); Serial.println(UPDURL); 
  Serial.print("Data: ");     Serial.println(updateData);
  Serial.print("payload : "); Serial.println(payload);              //Check data send
  if (httpCode == 200) {
    tft.setCursor(5, 65);
    tft.setTextSize(2);
    tft.setTextColor(ST77XX_GREEN);
    tft.print("CLEAR DATA");
    delay(2500);
    ESP.restart();
  } else {
    tft.setCursor(7, 65);
    tft.setTextSize(2);
    tft.setTextColor(ST77XX_YELLOW);
    tft.print("TRY AGAIN!");
  }
}

//Design layout
void layout() {
  tft.drawFastHLine(0, 0, tft.width(), ST7735_WHITE);
  tft.drawFastVLine(0, 0, tft.height(), ST7735_WHITE);
  tft.drawFastVLine(127, 0, tft.height(), ST7735_WHITE);
  tft.drawFastHLine(1, 25, tft.width(), ST7735_WHITE); 
  tft.drawFastHLine(1, 120, tft.width(), ST7735_WHITE);
  tft.drawFastHLine(1, 159, tft.width(), ST7735_WHITE);
}

//TFT text from database
void tft_text() {
  String seen;
  tft.setTextSize(1);
  tft.setCursor(6, 5);
  tft.setTextColor(ST77XX_YELLOW);
  tft.print(Name);
  tft.setCursor(47, 125);
  tft.print("Status");

  // length >= 6 == NO SETTING
  // length <= 5 == HAVE SETTING
  tft.setCursor(17, 30);
  tft.print("Medicine remain");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(5);
  tft.setCursor(40, 55);
  tft.print(Count_medicine);
  tft.setCursor(20, 85);
  tft.print(txt_meal);
}
