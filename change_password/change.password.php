<?php
@session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
  <div class="container">
  <div class="row justify-content-center mt-3">
  <div class="col-6">
<form method="POST">
<h1 class="text-center text-danger">Change Password</h1>
<div class="input-group mb-3  input-group-lg">
  <input type="password"  name="form_oldpassword" class="form-control" id="oldpassword" placeholder="Old Password">
  <span class="input-group-text bg-transparent"><i id="oldtogglePassword" class="bi bi-eye-slash"></i></span>
</div>
<div class="input-group mb-3  input-group-lg">
  <input type="password"  name="form_newpassword" class="form-control" id="password" placeholder="New Password">
  <span class="input-group-text bg-transparent"><i id="togglePassword" class="bi bi-eye-slash"></i></span>
</div>

                  <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
     </form>

     </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="hideShow.js"></script>
    <script src="oldHideShow.js"></script>
  </body>
</html>
<?php
//!form_email post edilmişse
if (isset($_POST['submit'])) {
    require 'db.php';
    // Form gönderildi
    // 1.DB'na bağlan
    // 2.SQL hazırla ve çalıştır
    // 3.Gelen sonuç 1 satırsa GİRİŞ BAŞARILI değilse, BAŞARISIZ
    //! Eğer boş alan varsa uyarı mesajı
    if (empty($_POST["form_oldpassword"]) || empty($_POST["form_newpassword"])) {
        echo '
                      <div class="container">

                  <div class="alert mt-3 text-center alert-info alert-dismissible fade show" role="alert">
                  Both Fields are required...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                  ';
    }
    //! Boş alan yoksa
    else {
        //! Post edilen verileri değişkenlere atama
        $oldPassword = $_POST['form_oldpassword'];
        $newPassword = $_POST['form_newpassword'];
        //! SQL hazırlama ve çalıştırma
        //! formdan gelen email ile db de varsa
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users  WHERE userid = :id";
        $SORGU = $DB->prepare($sql);

        $SORGU->bindParam(':id', $id);

        $SORGU->execute();

        $CEVAP = $SORGU->fetchAll(PDO::FETCH_ASSOC);
        /*  var_dump($CEVAP);
        echo "Gelen cevap " . count($CEVAP) . " adet satırdan oluşuyor";
        die(); */
        //! Gelen sonuç 1 satırsa db de kullanıcı var olduğunu anlarız
        if (count($CEVAP) == 1) {
            //! Kullanıcının şifresini doğrulama
            //? posttan gelen ile db den gelen karşılaştırma
            //? password_verify() fonksiyonu ile
            $hashedOldPassword = $CEVAP[0]['userpassword'];
            if (password_verify($oldPassword, $hashedOldPassword)) {
                //return true;
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $id = $_SESSION['id'];
                $sql = "UPDATE users SET userpassword	 = '$hashedNewPassword' WHERE userid = :id";
                $SORGU = $DB->prepare($sql);
                $SORGU->bindParam(':id', $id);

                // die(date("H:i:s"));
                $SORGU->execute();
                echo "User updated";
            } else {
                //return false;
                //!Şifreler Eşleşmiyorsa
                echo '
                      <div class="container">

                  <div class="alert mt-3 text-center alert-danger alert-dismissible fade show" role="alert">
                  Şifreler Eşleşmiyorsa
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                  ';

            }
        } else {
            //! Kullanıcı yoksa
            echo '
        <div class="container">
    <div class="alert mt-3 text-center alert-danger alert-dismissible fade show" role="alert">
    Kullanıcı yoksa
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    ';
        }
    }

}
?>