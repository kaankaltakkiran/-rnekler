<h1>Record Form</h1>

<form method='POST'>
    <p>User Name:  <input type='text' name='form_name' ></p>
    <p>User Email: <input type='email' name='form_email'></p>
    <p><input type='submit' name='form_sumbit' value='Add'></p>
</form>

<p><a href='index.php'>Back To Home</a></p>

<?php

if (isset($_POST['form_sumbit'])) {

    require_once 'db.php';

    $name = $_POST['form_name'];
    $email = $_POST['form_email'];

    $sql = "INSERT INTO users (username, email) VALUES (:form_name, :form_email)";
    $SORGU = $DB->prepare($sql);

    $SORGU->bindParam(':form_name', $name);
    $SORGU->bindParam(':form_email', $email);

    $SORGU->execute();
    echo "User created";
}
?>
