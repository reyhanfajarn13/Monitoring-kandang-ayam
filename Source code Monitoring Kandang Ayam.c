#include <DHT.h>        //memasukkan library sensor DHT11
#include <Servo.h>      //memasukkan library motor servo
#define DHTPIN 13       // deklarasi sensor DHT11 ada di pinout 13 di nodeMCU
#define DHTTYPE DHT11   //deklarasi tipe/jenis DHT yang digunakan
int pinBuzzer = 5;
int ledMerah = 4;
int ledHijau = 0;
int pinSensor = 12;
int sudut = 90;
DHT dht(DHTPIN, DHTTYPE);      //membuat inisiasi varibel untuk sensor DHT11
Servo myServo; // membuat inisalisasi variabel untuk arduino
void setup(){
  Serial.begin(115200);     //penentuan kecepatan pengiriman data dan penerimaannya pada port serial, digunakan kecepatan 115200 bps
  dht.begin();              // perintah memulai sensor dht
  pinMode(pinSensor,INPUT); //membuat pinSensor/Flame Sensor sbg inputan
  pinMode(pinBuzzer,OUTPUT);//buzzer sebagai output
  pinMode(ledMerah,OUTPUT);//led merah dan hijau sebagai output
  pinMode(ledHijau,OUTPUT);
  myServo.attach(14); //deklarasi servo pada pinout 14 NodeMCU
}
void loop(){
  float t = dht.readTemperature(); //proses mengubah hasil bacaan sensor dht ke dalam bentuk varibel
  Serial.print("\n");
  Serial.print(" Temperature:");
  Serial.print(t);
  Serial.print("°C ");
  Serial.print("|| STATUS  ");
   

  int nilai = analogRead(pinSensor); // deklarasi variabel untuk nilai peubah dari analog ke digital pada pinSensor
  delay(200);

  if(t>=30){
    myServo.write(sudut); //perintah membuat servo berputar sebesar nilai variabel sudut
    digitalWrite(4,HIGH); //perintah led merah menyala
    digitalWrite(0,LOW); // perintah led hijau padam
    tone(5,5000,5000); // buzzer pada pin 5 menyala 
  }
  else if(nilai<1020){
    myServo.write(sudut); //perintah membuat servo berputar sebesar nilai variabel sudut
     digitalWrite(4,HIGH); //perintah led merah menyala
    digitalWrite(0,LOW); // perintah led hijau padam
    digitalWrite(5,HIGH); 
    tone(5,5000,5000);
    Serial.println("Api Terdeteksi"); //menambilkan tulisan Api terdeteksi di serial monitor
  }
  else{
    myServo.write(0);
    digitalWrite(4,LOW);
    digitalWrite(0,HIGH);
    tone(5,0,0);
    Serial.println("Api  Tidak Terdeteksi");
  }
  delay(500);
  
}

