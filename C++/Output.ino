#include <Adafruit_GFX.h>
#include <Adafruit_ST7735.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Keypad_I2C.h>
#include <Keypad.h>
#include <Wire.h>

/*2.4G*/
const char* ssid = "CTN floor 2 teacher"; // Wi-Fi SSID
const char* password = "ctnphrae"; // Wi-Fi password

// URL by file PHP (http://(IP4)/(folder)(file.php))

String GETURL = "http://192.168.10.41/Medic/tft.php";
//String GETURL = "http://medicinectn2555.000webhostapp.com/tft.php";

WiFiClient client;
HTTPClient http;
int httpCode;

#define TFT_CS   D8
#define TFT_RST  D4
#define TFT_DC   D3

Adafruit_ST7735 tft = Adafruit_ST7735(TFT_CS, TFT_DC, TFT_RST);
//7-color (eInk) displays:
//White , Black , Red , Green , Blue , Yellow and Orange.

String time_get;
int warn;

String Name;
String BF;
String LUN;
String DN;
String BB;

String Clect;
String txt_meal;

int st_bf;
int st_lun;
int st_dn;
int st_bb;
char key;

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
  connectWiFi();
  http.begin(client, GETURL);
  httpCode = http.GET();
  String payload = http.getString();
  Serial.print("HTTP Response Code: "); Serial.println(httpCode);
    //Serial.print("payload: ");           Serial.println(payload);
  Serial.println("------------SETUP OUTPUT.INO READY-----------");
  tft.fillScreen(ST77XX_BLACK);
}

void loop() {
  while (WiFi.status() != WL_CONNECTED) {
    connectWiFi();
  }
  while (BF == "" || LUN == "" || DN == "" || BB == "") {
    condition_GET_tft();
    delay(50);
  }
  condition_GET_tft();
  layout();
  tft_text();

  for (int h; h <= 200; h++) {
    key = keypad.getKey();
    switch (key) {
      case 'A' : Clect = "BBF";
        setting(); break;
      case 'B' : Clect = "LUN";
        setting(); break;
      case 'C' : Clect = "DNR";
        setting(); break;
      case 'D' : Clect = "BED";
        setting(); break;
    }
    delay(50);
  }

  tft.fillScreen(ST77XX_BLACK);
}

// Active with A button => Setting Database
void setting() {
  tft.fillScreen(ST77XX_BLACK);
  delay(150);
  layout();

  tft.setTextColor(ST77XX_YELLOW);
  tft.setTextSize(1);
  tft.setCursor(15, 30);
  tft.print("Setting " + Clect + " to..");
  tft.setCursor(47, 125);
  tft.print("Status");
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(20, 138);
  tft.print("Setting!");
  delay(5000);
}

//ConnectWiFi
void connectWiFi() {
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    tft.setCursor(5, 65);
    tft.setTextSize(2);
    tft.setTextColor(ST77XX_WHITE);
    tft.print("Connecting");
  }
  Serial.print("connected to : "); Serial.println(ssid);
  Serial.print("IP address: "); Serial.println(WiFi.localIP());
}

//Condition GET tft and meal
void condition_GET_tft() {
  WiFiClient client;
  HTTPClient http;
  http.begin(client, GETURL);
  int httpCode = http.GET();
  String payload = http.getString();

  // Time
  int t = payload.indexOf("time=");
  String tt = payload.substring(t + 5);
    int chk_name = tt.indexOf("Name=");
    tt = tt.substring(0, chk_name);
  time_get = tt;

  // Fname + Lname
  int name = payload.indexOf("Name=");
  String extractedname = payload.substring(name + 5);
    int bfIndex = extractedname.indexOf("st_bf");
    extractedname = extractedname.substring(0, bfIndex);
  Name = extractedname;

  // TIME_BF
  int stbf = payload.indexOf("st_bf=");
    String stbfget = payload.substring(stbf + 6);
    st_bf = stbfget.toInt();
  int bf = payload.indexOf("BF=");
  String extractedbf = payload.substring(bf + 3);
    int lunIndex = extractedbf.indexOf("st_lun");
    extractedbf = extractedbf.substring(0, lunIndex);
  BF = extractedbf;

  // TIME_LUN
  int stlun = payload.indexOf("st_lun=");
    String stlunget = payload.substring(stlun + 7);
    st_lun = stlunget.toInt();
  int lun = payload.indexOf("LUN=");
  String extractedlun = payload.substring(lun + 4);
    int dnIndex = extractedlun.indexOf("st_dn");
    extractedlun = extractedlun.substring(0, dnIndex);
  LUN = extractedlun;

  // TIME_DIN
  int stdn = payload.indexOf("st_dn=");
    String stdnget = payload.substring(stdn + 6);
    st_dn = stdnget.toInt();
  int dn = payload.indexOf("DN=");
  String extracteddn = payload.substring(dn + 3);
    int bbIndex = extracteddn.indexOf("st_bb");
    extracteddn = extracteddn.substring(0, bbIndex);
  DN = extracteddn;

  // TIME_BB
  int stbb = payload.indexOf("st_bb=");
    String stbbget = payload.substring(stbb + 6);
    st_bb = stbbget.toInt();
  int bb = payload.indexOf("BB=");
  String extractedbb = payload.substring(bb + 3);
  BB = extractedbb;
}

// Design layout
void layout() {
  tft.drawFastHLine(0, 0, tft.width(), ST7735_WHITE);
  tft.drawFastVLine(0, 0, tft.height(), ST7735_WHITE);
  tft.drawFastVLine(127, 0, tft.height(), ST7735_WHITE);
  tft.drawFastHLine(1, 25, tft.width(), ST7735_WHITE); 
  tft.drawFastHLine(1, 120, tft.width(), ST7735_WHITE);
  tft.drawFastHLine(1, 159, tft.width(), ST7735_WHITE);
}

// Text alert medicine
void txt_stt_medic() {
  tft.setTextColor(ST77XX_GREEN);
  tft.setTextSize(2);
  tft.setCursor(13, 138);
  tft.print("Medicine!");
  delay(1000 * 10);
}

//TFT text from database
void tft_text() {
  tft.setTextSize(1);
  tft.setCursor(6, 5);
  tft.setTextColor(ST77XX_YELLOW);
  tft.print(Name);
  tft.setCursor(15, 30);
  tft.print("Next medicine is");
  tft.setCursor(47, 125);
  tft.print("Status");

  if (time_get <= BF && st_bf == 1 || 
  time_get >= BF && st_bf == 1 && st_bb == 0) {
    Clect = "BBF";
    txt_meal = BF;
    if (time_get == BF) {
      txt_stt_medic();
    }
  } else if (time_get <= LUN && st_lun == 1 || 
  time_get >= LUN && st_lun == 1 && st_bf == 0) {
    Clect = "LUN";
    txt_meal = LUN;
    if (time_get == LUN) {
      txt_stt_medic();
    }
  } else if (time_get <= DN && st_dn == 1 || 
  time_get >= DN && st_dn == 1 && st_lun == 0) {
    Clect = "DNR";
    txt_meal = DN;
    if (time_get == DN) {
      txt_stt_medic();
    }
  } else if (time_get <= BB && st_bb == 1 || 
  time_get >= BB && st_bb == 1 && st_dn == 0) {
    Clect = "BED";
    txt_meal = BB;
    if (time_get == BB) {
      txt_stt_medic();
    }
  } else { // BF < BB < time_get
    Clect = "BBF";
    txt_meal = BF;
    if (time_get == BF) {
      txt_stt_medic();
    }
  }

  tft.setTextSize(3);
  tft.setTextColor(ST77XX_GREEN);
  tft.setCursor(40, 50);
  tft.print(Clect);
  tft.setCursor(20, 85);
  tft.print(txt_meal);
}
