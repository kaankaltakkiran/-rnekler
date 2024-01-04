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

