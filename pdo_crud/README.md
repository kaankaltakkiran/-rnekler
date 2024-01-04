# PHP ile MySQL Kullanımı

## PDO ile CRUD İşlemleri

### Database


```SQL
DROP TABLE IF EXISTS `users`;

-- Adminer 4.8.1 MySQL 5.5.5-10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `users` (`userid`, `username`, `email`) VALUES
(1,	'Kaan Kaltakkıran',	'kaan_fb_aslan@hotmail.com'),
(2,	'Ayşe Yılmaz',	'ayse@gmail.com'),
(3,	'Veli Baba',	'veli@gmail.com'),
(4,	'Ahmet Yılmaz',	'ahmet@gmail.com');

-- 2024-01-04 07:24:17

```

## index.php

```PHP
<h1>PHP CRUD Example</h1>
<p><a href='list.php'>List Record</a></p>
<p><a href='insert.php'> Add New User </a></p>

```

## db.php

```PHP
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "example";

try {
    $DB = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

```

## list.php

```PHP
<h1>Record Users</h1>

<?php

require_once 'db.php';

$SORGU = $DB->prepare("SELECT * FROM users");
$SORGU->execute();
$users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>'; print_r($users);

foreach ($users as $user) {
    echo " {$user['userid']} : {$user['username']}, {$user['email']} ";
    echo "<a href='update.php?id={$user['userid']}'>Update</a>";
    echo "<a href='delete.php?id={$user['userid']}' onclick='return confirm(\"Remove User?\")'>Delete</a>";
    echo "<br>";
}
echo "<p><a href='index.php'>Back To Home Page</a></p>";
?>

```

## insert.php

```PHP
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

```

## delete.php

```PHP
<?php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Page</title>
</head>
<body>

</body>
</html>

<?php
require_once 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE userid = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();
echo "User deleted";
echo "<p><a href='list.php'>Back To List</a></p>";
?>
```

## update.php

```PHP
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


```
