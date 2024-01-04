<?php

require_once 'db.php';

if (isset($_POST['form_submit'])) {

    $name = $_POST['form_name'];
    $email = $_POST['form_email'];
    $id = $_GET['id'];

    $sql = "UPDATE users SET username = :form_name, email = :form_email WHERE userid = :id";
    $SORGU = $DB->prepare($sql);

    $SORGU->bindParam(':form_name', $name);
    $SORGU->bindParam(':form_email', $email);
    $SORGU->bindParam(':id', $id);

    // die(date("H:i:s"));
    $SORGU->execute();
    echo "User updated";
}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE userid = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();

$users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
$user = $users[0];

// echo "<pre>"; print_r($users);
?>

<h1>Record Update</h1>

<form method='POST'>
    <p>User Name:  <input type='text' name='form_name'  value='<?php echo $user['username']; ?>'></p>
    <p>User Email: <input type='email' name='form_email' value='<?php echo $user['email']; ?>'></p>
    <p><input type='submit' name='form_submit' value='Update'></p>
</form>

<p><a href='list.php'>Back To List</a></p>

