<?php
session_start();
$_SESSION['firstPageVisit'] = true;
//push an item onto an array
array_push($_SESSION['myCart'], $_POST['item']);
// $_SESSION['myCart'][] = $_post['item'];

header("Location: ./browse.php"); //send them back to where they were

if($_POST['clearData'] == "true")
{
  unset($_SESSION['myCart']);
  $_SESSION['myCart'] = array();
  header("Location: ./cart.php"); //send them back to where they were
}



?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>
