<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form İnsert Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <div class="row justify-content-center mt-4">
    <div class="col-6">
    <form method="post">
    <div class="col-8">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" name="form_name">
  </div>
  </div>
  <div class="col-8">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="form_password" class="form-control" id="exampleInputPassword1">
  </div>
  </div>
  <button type="submit" name="form_sumbit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if (isset($_POST['form_sumbit'])) {

    require_once 'db.php';
    //!htmlspecialchars() kullanıcıdan alınan veriyi güvenli hale getirir
    //! eğer kullanıcı zararlı bir kod gönderirse bunu html etiketlerine dönüştürür
    $name = htmlspecialchars($_POST['form_name']);
    $password = htmlspecialchars($_POST['form_password']);

    $sql = "INSERT INTO users (username, userpassword) VALUES (:form_name, :form_password)";
    $SORGU = $DB->prepare($sql);

    $SORGU->bindParam(':form_name', $name);
    $SORGU->bindParam(':form_password', $password);

    $SORGU->execute();
    echo "User created";
}
?>
