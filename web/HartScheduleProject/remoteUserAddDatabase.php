<?php session_start();
require('connectToDatabase.php');
$_SESSION['userAlreadyExsists'];
$db = getDatabaseConnection();

//sanitize input
$username = strtolower(htmlspecialchars($_POST['username']));
$password = htmlspecialchars($_POST['password']);

//hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//first lets check if the user already exsists...
foreach ($db->query('SELECT username FROM users') as $row)
{
  if($row['username'] == $username)
  {
    $_SESSION['userAlreadyExsists'] = true;
    //this username aleady exsits...
    header("Location: addUserToDatabase.php");
    exit(); //clean redirect

  }
}

//username was not found...so lets add it!

$_SESSION['userAlreadyExsists'] = false;
$stmt = $db ->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');

$stmt->bindValue(":username", $username, PDO::PARAM_STR);
$stmt->bindValue(":password", $hashedPassword, PDO::PARAM_STR);

if ($stmt->execute())
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
