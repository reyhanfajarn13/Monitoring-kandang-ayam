<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"></link>

    <title>Smart Kandang Ayam</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      setInterval(function(){
          $.ajax({
              url: 'https://sleepy-thicket-38082.herokuapp.com/https://platform.antares.id:8443/~/antares-cse/antares-id/SmartKandangAyam/DHT11Sensor/la',
              method: 'GET',
              headers: {
                  'X-M2M-Origin':'4278bb49be211a93:963f7709e6779c1b',
                  'Content-Type':'application/json;ty=4',
                  'Accept':'application/json'
                },
                dataType: 'json',
                success:function(response){
                    data = JSON.parse(response["m2m:cin"].con);
                    console.log(data);
                    $("#status").text(data["Status:"]); //sesuaikan variabel dengan antares
                    $("#suhu").text(data["Temperature:"]); //sesuaikan variabel dengan antares
                    $("#success").text("Connected"); //sesuaikan variabel dengan antares
                },
                error:function(data){
                    $("#status").text("Loading..."); //sesuaikan variabel dengan antares
                    $("#suhu").text("Loading..."); //sesuaikan variabel dengan antares
                    $("#success").text("Not Connected"); //sesuaikan variabel dengan antares
                }
            });
        },1000)
    });
    </script>
  </head>

  <body>
      <nav class="navbar fixes-top navbar-expand-lg navbar-light" style="background-color: darkorange;">
          <div class="container">
            <div class="row"> 
                <a class="navbar-brand col-8" href="#">
                    <img src="/img/logo.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt=""><span style="color: maroon;">SmartKandang</span>    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="row">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav col-4">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active ml-3" href="#">Data</a>
                </div>
            </div>     
      </nav>
      <div class="menu_utama">
        <div class="container">
            <div class=" content">
                <h1>Selamat Datang</h1>
                <h2>"Web ini akan membantu anda untuk melihat data alat<span style="color: darkorange;"> SmartKandang"</span></h2>
            </div>
              <div class="img">
                  <img src="/img/image1.png" alt="pic">
              </div>  
        </div>
      </div>
      
      <div class="data">
          <div class="container">
              <div class="content2">
                <h2>Data</h2>
                <hr/>
              </div>
            </div>
        </div>    
      </div>
      <div class="data_antares">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mt-4" style="width: 20rem;">
                <div class="card-body">
                  <h2 class="card-title" style="color: white;">Data Suhu</h2>
                  <h3 class="card-text" style="color: white;">Suhu : <span id ="suhu"></span></h3>
                </div>
              </div>
            </div>
          <div class="row">    
            <div class="col-lg-4">
              <div class="card mt-4" style="width: 22rem;">
                <div class="card-body">
                  <h2 class="card-title" style="color: white;">Status Api</h2>
                  <h3 class="card-text" style="color: white;">Status : <span id="status"></span></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">    
            <div class="col-lg-4">
              <div class="card mt-4 ml-5" style="width: 20rem;">
                <div class="card-body">
                  <h2 class="card-title" style="color: white;">Koneksi Antares</h2>
                  <h3 class="card-text" style="color: white;">Koneksi :<span id="success"></span></h3>
                </div>            
              </div>
            </div>
          </div>  
        </div>

          
            <div class="col mb-3 mt-3">
              <p>website ini berfungsi untuk menampilkan nilai dari alat SmartKandang. Iot SmartKandang didukung oleh platform Antares. Alat ini dikembangkan oleh kelompok 6 Caas CPS LAB. Alat ini berfungsi untuk memonitoring kandang Ayam
                dan menjaga keamanan kandang dari kebakaran api. Alat ini akan berbunyi ketika terjadi suhu diatas batas normal atau jika terjadi kebakaran. Alat ini berfungsi untuk membantu para peternak ayam agar lebih mudah mengontrol kandang ayamnya.
            </div>
      </div>  
        
  
      

  </body>

  <footer>
    <div class="foot_container">
      <div class="footerlink">
         
      </div>
      <div class="social">
          <div class="social_media">
              <div class="social_logo">
                  <a href="index.html" id="social_logo"><i class="fa"></i>©Website SmartKandang 2021</a>
              </div>
              <p class="website">#Kelompok6</p>
              <p class="website">#Caas CPS Lab</p>
              <div class="socialikon">
                  <a href="https://www.instagram.com/" class="sosial_ikon_link"> 
                      <i class="fab fa-instagram"></i>  
                  </a>
                  <a href="https://www.linkedin.com/login/in" class="sosial_ikon_link">
                      <i class="fab fa-linkedin"></i>  
                  </a>
                  <a href="https://www.whatsapp.com/?lang=en" class="sosial_ikon_link">
                      <i class="fab fa-whatsapp"></i>  
                  </a>
                  <a href="http://gmail.com/" class="sosial_ikon_link">
                      <i class="fas fa-envelope"></i>  
                  </a>
              </div>
          </div>
      </div>
  </div>

  </footer>


</html>