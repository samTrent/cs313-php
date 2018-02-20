<?php session_start();

//kick user out if they are not logged in...
if(isset($_SESSION['userIsLoggedIn']))
{
  if($_SESSION['userIsLoggedIn'] == false)
  {
    //kick them out
    header("Location: loginPage.php");
    exit(); //clean redirect
  }
}
else {
  //kick them out
  header("Location: loginPage.php");
  exit(); //clean redirect
}


 ?>
