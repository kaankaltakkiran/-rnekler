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