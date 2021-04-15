/*
 * HTTP Client GET envio ou busca de dados
 * Copyright (c) 2018, circuits4you.com
 * All rights reserved.
 * https://circuits4you.com 
 * Connects to WiFi HotSpot. 
 https://randomnerdtutorials.com/esp32-esp8266-mysql-database-php/
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
const char *ssid = "REDEWIFI";  //ENTER YOUR WIFI SETTINGS
const char *password = "SENHAWIFI";

  // ALTERAR ENDERECO DO SERVIDOR
//Web/Server address to read/write from 
const char *host = "http://ec2....compute.amazonaws.com/php_app";   // website or IP address of server

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

  // if((WiFiMulti.run() == WL_CONNECTED)) {
     HTTPClient http;    //Declare object of class HTTPClient

  // ALTERAR ENDERECO DO SERVIDOR

       Serial.println("Get Request to Server.......");
       http.begin("http://ec2-....compute.amazonaws.com/php_app/temperatura.php"); //HTTP URL for hosted server(local server)
       int httpCode = http.GET();
       // httpCode will be negative on error
       if(httpCode > 0) {
        
        //   if(httpCode == HTTP_CODE_OK) {
             //HTTP_CODE_OK means code == 200
               String payload = http.getString();// gives us the message received by the GET Request
               Serial.println(payload);// Displays the message onto the Serial Monitor
               if(payload=="7") { Serial.println("valor");  }
          // }
       } else {
           Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
       }
       http.end();
 //  }
   delay(5000);// repeat the cycle every 5 seconds.
}
  
  


//=======================================================================
