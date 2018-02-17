<?php

try {
  $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
  $dbname = "dcupbm4rvpsqb2";
  $user = "zaqfmlhepcfhlm";
  $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
  $port = "5432";

  $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);


    //detele a schedule for a given date...
    $deletestmt = $db ->prepare("DELETE FROM submittedschedule WHERE submitteddate = :submitteddateString");

    $deletestmt->bindValue(":submitteddateString", $_POST['date'], PDO::PARAM_STR);

    if ($deletestmt->execute())
    {
      echo "SUECCES DELETING date<br>";
    }
    else
    {
      echo "DELETING FAILED!<br>";
    }
  }
  catch (PDOException $ex) {
   print "<p>error: $ex </p>\n\n";
   die();
  }


 ?>
