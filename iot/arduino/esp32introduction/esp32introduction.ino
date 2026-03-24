#include <WiFiManager.h>
#include <stdio.h>
/*
 */

#include "Adafruit_MQTT.h"
#include "Adafruit_MQTT_Client.h"

/************ ADAFRUIT IO CONFIG ************/
#define AIO_SERVER      "io.adafruit.com"
#define AIO_SERVERPORT  1883

const char* AIO_USERNAME = "donundeen";
const char* AIO_KEY      = "b20aea6d2bdc41beba537705083e094b";
const char* FEED_NAME    = "want_snack";

/************ PIN CONFIG ************/
const int INPUT_PIN = 13;// GPIO13; //20; // GPIO13  , 20
const int LED_PIN   = LED_BUILTIN;

/************ MQTT SETUP ************/
WiFiClient client;

Adafruit_MQTT_Client mqtt(&client,
                          AIO_SERVER,
                          AIO_SERVERPORT,
                          AIO_USERNAME,
                          AIO_KEY);

// Stable buffer for the feed topic — never use String(...).c_str() here: the String is
// destroyed immediately and Adafruit would hold a dangling pointer (crash / panic).
char mqttFeedTopic[96];

Adafruit_MQTT_Subscribe onoffFeed = Adafruit_MQTT_Subscribe(&mqtt, mqttFeedTopic);
Adafruit_MQTT_Publish onoffPublish = Adafruit_MQTT_Publish(&mqtt, mqttFeedTopic);

/************ MQTT CONNECT ************/
void MQTT_connect() {
  if (mqtt.connected()) return;

  int8_t ret;
  Serial.print("Connecting to Adafruit IO MQTT... ");

  while ((ret = mqtt.connect()) != 0) {
    Serial.print("MQTT connect failed, code ");
    Serial.println(ret);
    Serial.println("Retrying MQTT connection...");
    mqtt.disconnect();
    delay(2000);
  }

  Serial.println("Connected!");

  flashlight(LED_PIN, 4, 500);
}


void setup() {
        // put your setup code here, to run once:
    Serial.begin(9600);
    
    //WiFiManager, Local intialization. Once its business is done, there is no need to keep it around
    WiFiManager wm;

    // reset settings - wipe stored credentials for testing
    // these are stored by the esp library
    // wm.resetSettings();

    // Automatically connect using saved credentials,
    // if connection fails, it starts an access point with the specified name ( "AutoConnectAP"),
    // if empty will auto generate SSID, if password is blank it will be anonymous AP (wm.autoConnect())
    // then goes into a blocking loop awaiting configuration and will return success result

    bool res;
    // res = wm.autoConnect(); // auto generated AP name from chipid
    res = wm.autoConnect("DonsESP32"); // anonymous ap
    //res = wm.autoConnect("DonsESP32","password"); // password protected ap

    if(!res) {
        Serial.println("Failed to connect");
        // ESP.restart();
    } 
    else {
        //if you get here you have connected to the WiFi    
        Serial.println("connected...yeey :)");
    }

    pinMode(INPUT_PIN, INPUT_PULLUP);
    pinMode(LED_PIN, OUTPUT);

    snprintf(mqttFeedTopic, sizeof(mqttFeedTopic), "%s/feeds/%s", AIO_USERNAME, FEED_NAME);
    mqtt.subscribe(&onoffFeed);

  
  
}

void loop() {
  MQTT_connect();

  mqtt.processPackets(10);
  mqtt.ping();

  static int lastState = HIGH;
  int currentState = digitalRead(INPUT_PIN);

  // Send value if input changed
  if (currentState != lastState) {
    lastState = currentState;

    if (currentState == LOW) {
      Serial.println("Publish 1");
      onoffPublish.publish("1");
    } else {
      Serial.println("Publish 0");
      onoffPublish.publish("0");
    }
  }

  // Receive value from feed
  Adafruit_MQTT_Subscribe *subscription;
  while ((subscription = mqtt.readSubscription(10))) {
    if (subscription == &onoffFeed) {
      int value = atoi((char *)onoffFeed.lastread);

      Serial.print("Received: ");
      Serial.println(value);

      digitalWrite(LED_PIN, value ? HIGH : LOW);
    }
  }
    
}


void flashlight(int pin, int num, int delayms){
  for(int i = 0; i<num; i++){
    digitalWrite(pin, HIGH);
    delay(delayms);
    digitalWrite(pin, LOW);
    delay(delayms);
  }
}