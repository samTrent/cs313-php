<?php
try {
  $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
  $dbname = "dcupbm4rvpsqb2";
  $user = "zaqfmlhepcfhlm";
  $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
  $port = "5432";

  $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);


  $_POST['username'];
  $_POST['password'];

  $validUser = false;
  $validPass = false;

  $stmt = $db ->prepare("SELECT username, password FROM users");

  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($row as $rows)
  {
    echo '<p> USER: ' . $row['username'] . '</p>';
    echo '<p> PASS: ' . $row['password'] . '</p>';

  }
}
catch (PDOException $ex)
{
 print "<p>error: $ex </p>\n\n";
 die();
}




 ?>
