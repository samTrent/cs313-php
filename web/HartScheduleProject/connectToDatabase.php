<?php
//establish connection to postgres database...
function getDatabaseConnection()
{
  try
  {
    $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
    $dbname = "dcupbm4rvpsqb2";
    $user = "zaqfmlhepcfhlm";
    $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
    $port = "5432";

    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
  }
  catch (PDOException $ex)
  {
    print "<p>error: $ex </p>\n\n";
    die();
  }
   return $db;
}
 ?>
