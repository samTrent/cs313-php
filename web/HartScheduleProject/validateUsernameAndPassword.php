<?php session_start();
$_SESSION['userIsLoggedIn'];
$_SESSION['loginError'];

require("connectToDatabase.php");
$db = getDatabaseConnection();

  //sanitize the incoming post vars.
  $incomingUsername = htmlspecialchars($_POST['username']);
  $incomingPassword = htmlspecialchars($_POST['password']);


  //search database to see if the given username and password exsist.
  foreach ($db->query('SELECT username, password FROM users') as $row)
  {
    //check if user exsists
    if(strtolower($incomingUsername) == $row['username'])
    {
      //check the password using hash
      if(password_verify($incomingPassword, $row['password']))
      {
        $_SESSION['loginError'] = false; //there was no error
        $_SESSION['userIsLoggedIn'] = true;
        header("Location: testQuery.php");
        exit();//clean redirect

      }
      else
      {
        //bad password
        $_SESSION['loginError'] = true;//there was a login error
        $_SESSION['userIsLoggedIn'] = false;
        header("Location: loginPage.php");
        exit(); //clean redirect
      }
    }
    else
    {
    }

  }
    //bad username
    $_SESSION['loginError'] = true;//there was a login error
    $_SESSION['userIsLoggedIn'] = false;
    header("Location: loginPage.php");
    exit(); //clean redirect


 ?>
