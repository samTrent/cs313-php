<?php
require("connectToDatabase.php");
$db = getDatabaseConnection();


// try {
//
//
//
//   $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
//   $dbname = "dcupbm4rvpsqb2";
//   $user = "zaqfmlhepcfhlm";
//   $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
//   $port = "5432";
//
//   $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);


  $_POST['username'];
  $_POST['password'];

  $validUser = false;
  $validPass = false;

  //search database to see if the given username and password exsist.
  foreach ($db->query('SELECT username, password FROM users') as $row)
  {

    //check if user exsists
    if($_POST['username'] == $row['username'])
    {
      //check the password
      if($_POST['password'] == $row['password'])
      {
        header("Location: testQuery.php");

      }
      else
      {
        header("Location: loginPage.php");
      }
    }




  }
// }
// catch (PDOException $ex)
// {
//  print "<p>error: $ex </p>\n\n";
//  die();
// }




 ?>
