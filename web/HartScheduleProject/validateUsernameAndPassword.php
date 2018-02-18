<?php
require("connectToDatabase.php");
$db = getDatabaseConnection();

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


 ?>
