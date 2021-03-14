#include <Servo.h> //masukkan Library servo
#include <LiquidCrystal.h>

//urutannya RS,E,4,5,6,7
LiquidCrystal lcd(3,2,11,12,8,7);//Pin dalam arduino untuk lcd

//membuat masing-masing pin ke dalam variabel
int gasSensor = 0;
int TMP36 = A2;
int redled = 9;
int greenled = 10;
#define buzzer 5
int contrast = 13;

Servo Myservo; // Proses menginisialkan servo

void setup()
{
  pinMode(A0, INPUT);
  pinMode(buzzer, OUTPUT);
  pinMode(redled, OUTPUT);
  pinMode(greenled, OUTPUT);
  
  analogWrite(contrast,50);
  //prosedur manggil fungsi lcd
  lcd.begin(16,2); //16 = baris, 2=kolom
  Myservo.attach(4); // servo berada pada pin 4 di arduino
  Serial.begin(9600);

}

void loop()
{
  // perhitungan dan mengubah voltasi pada sensor suhu menjadi besaran celcius
  int reading = analogRead(TMP36);
  float voltasi = reading * 5.0;
  voltasi =voltasi/1024.0;
  
  float suhu = (voltasi - 0.5) * 100;
  Serial.print(suhu); 
  Serial.println(" C");

  gasSensor = analogRead(A0); // menginisialkan pin A0 untuk sensor gas
  // jika sensor gas membaca nilai suhu >33 maka servo akan berputar 90 derajat
  // asumsi nilai gas belum terlalu besar, sehingga alarm belum bunyi
  if (suhu > 33){
    Myservo.write(90);
    lcd.setCursor(0,0);
    lcd.print("STATUS: PANAS");
  delay(50);
    
  }
  
  // jika sensor gas sudah lebih dari 250 atau suhu lebih sudah ada kebakaran api besar, alarm berbunyi dan servo akan berputar untuk mengeluarkan air
  else if (gasSensor >= 250 ) {
    Myservo.write(90);
    tone (buzzer, 15);
    digitalWrite(redled, HIGH);
    digitalWrite(greenled, LOW);
    lcd.setCursor(0,0);
  	lcd.print("FIRE UP");
  delay(50);
  }
  else {
    Myservo.write(0);
    noTone (buzzer);
    digitalWrite(redled, LOW);
    digitalWrite(greenled, HIGH);
    lcd.setCursor(0,0);
  	lcd.print("SUHU:");
  	lcd.print(suhu);
  	lcd.print(" C");
  delay(50);

    
  }
  delay(10); 
}
