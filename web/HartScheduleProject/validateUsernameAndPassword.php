<?php session_start();

$_SESSION['loginError'];

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
        $_SESSION['loginError'] = false; //there was no error
        header("Location: testQuery.php");
        exit();//clean redirect

      }
      else
      {
        $_SESSION['loginError'] = true;//there was a login error
        header("Location: loginPage.php");
        exit(); //clean redirect
      }
    }




  }


 ?>
