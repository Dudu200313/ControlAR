#include <MideaHeatpumpIR.h>
#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include "SoftwareSerial.h"


// WiFi
const char *ssid = "aaaaa"; // Enter your WiFi name
const char *password = "123456789";  // Enter WiFi password

// MQTT Broker
const char *mqtt_broker = "test.mosquitto.org";
//const char *topic = "test";
const char *mqtt_username = "";
const char *mqtt_password = "";
const int mqtt_port = 1883;
const char topic[]  = "test";

const byte heatpumpOff         = 0;
const byte heatpumpNormal      = 1;
const byte heatpumpMaintenance = 2;

WiFiClient espClient;
PubSubClient client(espClient);

byte heatpumpState = heatpumpOff;
IRSenderESP8266 irSender(12);
HeatpumpIR *heatpumpIR = new MideaHeatpumpIR();

String esp_id = "ESP-" + String(ESP.getChipId(), HEX);
String power_topic = "test/" + esp_id + "/power/set";
String mode_topic = "test/" + esp_id + "/modo/set";
String fan_topic = "test/" + esp_id + "/fan_speed/set";
String temperature_topic = "test/" + esp_id + "/temperatura/set";
String swing_topic = "test/" + esp_id + "/swing/set";


int power = POWER_OFF;
int acmode = MODE_AUTO;
int fan = FAN_AUTO;
int temp;
int swing = VDIR_SWING;

void setup() {

  // Set software serial baud to 115200;
  Serial.begin(9600);

  client.setServer(mqtt_broker, mqtt_port);
  client.setCallback(callback);

  // connecting to a WiFi network
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.println("conectando ao wifi..");
  }
  Serial.println("conectado com a rede wifi");

  while (!client.connected()) {
      String client_id = "esp8266-client-";
      client_id += String(WiFi.macAddress());

     
      Serial.printf("o cliente bla blabla %s conecta no mqtt server publico\n", client_id.c_str());
     
        if (client.connect(client_id.c_str())) {
            Serial.println("mqtt broker conectado");
            
            client.publish("test", "esp_id");

            client.subscribe(power_topic.c_str());
            client.subscribe(mode_topic.c_str());
            client.subscribe(fan_topic.c_str());
            client.subscribe(temperature_topic.c_str());
            client.subscribe(swing_topic.c_str());
      } else {
          Serial.print("deu merda ");
          Serial.print(client.state());
          delay(500);
      }
  }
  // publish and subscribe
  //client.publish(topic, "oie eae beleza");
  //client.subscribe(topic);

  delay(5000); 
}

void callback(char *topic, byte *payload, unsigned int length) {
  String Payload = "";
  for (int i = 0; i < length; i++) Payload += (char)payload[i] ;
  Serial.println(Payload);
  if (String(topic) == power_topic) {
    if (Payload == "ON") power = POWER_ON;
    else if (Payload == "OFF") power = POWER_OFF;
  }
  if (String(topic) == mode_topic) {
    if (Payload == "heat") acmode = MODE_HEAT;
    else if (Payload == "cool") acmode = MODE_COOL;
    else if (Payload == "dry") acmode = MODE_DRY;
    else if (Payload == "fan_only") acmode = MODE_FAN;
    else if (Payload == "auto") acmode = MODE_AUTO;
  }
  if (String(topic) == fan_topic) {
    if (Payload == "auto") fan = FAN_AUTO;
    else if (Payload == "low") fan = FAN_1;
    else if (Payload == "medium") fan = FAN_2;
    else if (Payload == "high") fan = FAN_3;
  }
  if (String(topic) == temperature_topic) {
    temp = Payload.toInt();
  }
  if (String(topic) == swing_topic) {
    if (Payload == "on") swing = VDIR_AUTO;
    else if (Payload == "off") swing = VDIR_SWING;
  }
  

  heatpumpIR->send(irSender, power, acmode, fan, temp, swing, 0);

}

void loop() {
  //enviando mensagem para o topico MQTT 
  client.loop();
  delay(500);
}