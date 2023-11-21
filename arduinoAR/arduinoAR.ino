
//#include <IRremoteESP8266.h>
//#include <IRsend.h>
#include <MideaHeatpumpIR.h>
//#include <ir_Carrier.h>
#include <ESP8266WiFi.h>
#include <PubSubClient.h>
//#include <Carrier.h>

//#include <IRremote.h>
// the IR emitter object
#include "SoftwareSerial.h"


// WiFi
const char *ssid = "DTEL_NARUTO 2.4"; // Enter your WiFi name
const char *password = "luibento";  // Enter WiFi password

// MQTT Broker
const char *mqtt_broker = "test.mosquitto.org";
const char *topic = "testemqtt";
const char *mqtt_username = "";
const char *mqtt_password = "";
const int mqtt_port = 1883;

const byte heatpumpOff         = 0;
const byte heatpumpNormal      = 1;
const byte heatpumpMaintenance = 2;

WiFiClient espClient;
PubSubClient client(espClient);
IRSenderESP8266 irSender(12);

byte heatpumpState = heatpumpOff;

HeatpumpIR *heatpumpIR = new MideaHeatpumpIR();

void setup() {

  // Set software serial baud to 115200;
  Serial.begin(9600);
  // connecting to a WiFi network
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.println("conectando ao wifi..");
  }
  Serial.println("conectado com a rede wifi");
  //connecting to a mqtt broker
  client.setServer(mqtt_broker, mqtt_port);
  client.setCallback(callback);
  while (!client.connected()) {
      String client_id = "esp8266-client-";
      client_id += String(WiFi.macAddress());
      Serial.printf("o cliente bla blabla %s conecta no mqtt server publico\n", client_id.c_str());
      if (client.connect(client_id.c_str(), mqtt_username, mqtt_password)) {
          Serial.println("mqtt broker conectado");
      } else {
          Serial.print("deu merda ");
          Serial.print(client.state());
          delay(2000);
      }
  }
  // publish and subscribe
  client.publish(topic, "oie eae beleza");
  client.subscribe(topic);

  delay(5000); 
}

void callback(char *topic, byte *payload, unsigned int length) {
  Serial.print("mensagem chegou ao topico: ");
  Serial.println(topic);
  Serial.print("zapzap:");
  for (int i = 0; i < length; i++) {
      Serial.print((char) payload[i]);
  }
  Serial.println();
  Serial.println("-----------------------");
}

void loop() {
  //enviando mensagem para o topico MQTT 
  client.loop();

  //

   Serial.println(F("Normal heating operation"));

      Serial.println(F("* Sending power OFF"));
      heatpumpIR->send(irSender, POWER_OFF, MODE_HEAT, FAN_2, 22, VDIR_UP, HDIR_AUTO);
      delay(5000); // 15 seconds, to allow full shutdown

      Serial.println(F("* Sending normal heat command"));
      heatpumpIR->send(irSender, POWER_ON, MODE_COOL, FAN_2, 18, VDIR_UP, HDIR_AUTO);
      heatpumpState = heatpumpNormal;

      //aaa

      Serial.println(F("Maintenance heating operation"));

      Serial.println(F("* Sending power OFF"));
      heatpumpIR->send(irSender, POWER_OFF, MODE_HEAT, FAN_2, 25, VDIR_UP, HDIR_AUTO);
      delay(5000); // 15 seconds, to allow full shutdown

      Serial.println(F("* Sending normal heat command"));
      heatpumpIR->send(irSender, POWER_ON, MODE_HEAT, FAN_2, 22, VDIR_UP, HDIR_AUTO);
      delay(5000); // 15 seconds, to allow full start before switching to maintenance

      Serial.println(F("* Switching to maintenance heating"));
      heatpumpIR->send(irSender, POWER_ON, MODE_MAINT, FAN_3, 10, VDIR_UP, HDIR_AUTO);

      heatpumpState = heatpumpMaintenance;

    heatpumpState = heatpumpOff;
    Serial.println(F("Sending power OFF"));
    heatpumpIR->send(irSender, POWER_OFF, MODE_HEAT, FAN_2, 22, VDIR_UP, HDIR_AUTO);


}