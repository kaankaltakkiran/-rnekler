<?php
$activePage="home";
require 'loginControl.php';
//Session başlatma
@session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require_once('navbar.php');
    ?>
 <!--Welcome Message Start-->
 <div class="container">
        <div class="row  justify-content-center">
          <div class="col-6">
          <h1 class="text-center text-danger mt-1">Welcome</h1>
          <h3 class="text-center text-muted">Name: <?php echo $_SESSION['adsoyad']; ?></h3>
          <p class="text-center text-danger"><?php
           date_default_timezone_set('Europe/Istanbul'); // Türkiye saat dilimine göre tarih ve saat ayarla
          $date_and_time = date("Y-m-d H:i:s"); // Yıl-Ay-Gün Saat:Dakika:Saniye formatında tarih ve saat
         echo "Date And Time: " . $date_and_time;
?></p>
  <!--  Rolü 2 olan görür -->
<?php if($_SESSION['rol']==2){ ?>
  <h4 class="text-center">Bu Mesajı sadece admin görür</h4>
  <?php } ?>
          </div>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


