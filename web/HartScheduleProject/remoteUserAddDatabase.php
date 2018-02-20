<?php
require('connectToDatabase.php');

$db = getDatabaseConnection();

//sanitize input
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

//hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db ->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');

$stmt = bindValue(':username', $username, PDO::PARAM_STR);
$stmt = bindValue(':password', $hashedPassword, PDO::PARAM_STR);

if ($deletestmt->execute())
{
  echo "SUECCES ADDING USER<br>";
}
else
{
  echo "ADDING USER FAILED!<br>";
}

header("Location: testQuery.php");
exit(); //clean redirect




 ?>
