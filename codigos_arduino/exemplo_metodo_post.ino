/*
 * HTTP Client POST Request
 * Copyright (c) 2018, circuits4you.com
 * All rights reserved.
 * https://circuits4you.com 
 * Connects to WiFi HotSpot. 
 https://randomnerdtutorials.com/esp32-esp8266-mysql-database-php/

 online:  https://wokwi.com/projects/396067644168942593
 */

#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif



/* Set these to your desired credentials. */
const char *ssid = "redewifi";  //ENTER YOUR WIFI SETTINGS
const char *password = "senhpawifi";

  // ALTERAR ENDERECO DO SERVIDOR
//Web/Server address to read/write from 
const char *host = "http://ip_seu_servidor/php_app";   // website or IP address of server

//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  HTTPClient http;    //Declare object of class HTTPClient

  String ADCData, station, postData;
  int adcvalue=analogRead(A0);  //Read Analog value of LDR
  int humidade=89;                                                                                                                                                                                                           
  ADCData = String(adcvalue);   //String to interger conversion

  //Post Data
  postData = "temp1=" + ADCData + "&hum1=" + humidade ;
  // ALTERAR ENDERECO DO SERVIDOR
  http.begin("http://ip_seu_servidor/php_app/add.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload

  http.end();  //Close connection
  
  delay(30000);  //Post Data at every 5 seconds
}
//=======================================================================
