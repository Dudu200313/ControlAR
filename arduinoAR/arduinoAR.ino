
#include <IRremoteESP8266.h>
#include <IRsend.h>
#include <ir_Carrier.h>
#include <ESP8266WiFi.h>
#include <PubSubClient.h>
//#include <Carrier.h>

//#include <IRremote.h>
// the IR emitter object
#include "SoftwareSerial.h"
//#define pin 12

// the Carrier code generator object
//Carrier carrier(MODE_auto,FAN_3,AIRFLOW_dir_1,25,STATE_on);
//IRsend IRemissor (pin, false, true);
const uint16_t pin = 12;
IRCarrierAc64 ac(pin);
// WiFi
const char *ssid = "DTEL_NARUTO 2.4"; // Enter your WiFi name
const char *password = "luibento";  // Enter WiFi password

// MQTT Broker
const char *mqtt_broker = "test.mosquitto.org";
const char *topic = "testemqtt";
const char *mqtt_username = "";
const char *mqtt_password = "";
const int mqtt_port = 1883;

WiFiClient espClient;
PubSubClient client(espClient);

void setup() {
  //instanciar o objeto
  ac.begin();
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

  //isto serve pra configurar oque vamos enviar no ac.send, procurar funcoes
  //no arquivo ir_Carrier.cpp
  ac.setFan(kCarrierAc64FanLow);
  ac.setMode(kCarrierAc64Cool);
  ac.setTemp(22);
  //ac.setSwing(true);
    
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
  client.loop();

  Serial.println("ligando o ar");
  ac.on();
  ac.send();
  delay(15000);

  Serial.println("desligando o ar");
  ac.off();
  ac.send();
}