<?php
try {
  $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
  $dbname = "dcupbm4rvpsqb2";
  $user = "zaqfmlhepcfhlm";
  $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
  $port = "5432";

  $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

  $stmt = $db ->prepare("INSERT INTO employee (firstname, lastname) VALUES (:firstname, :lastname)");

  $stmt->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
  $stmt->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);

  echo "<p>POST FIRSTNAME = " . $_POST['firstname'] . '</p>';
  echo "<p>POST LASTNAME = " . $_POST['lastname'] . '</p>';

  $stmt->execute();
}
catch (PDOException $ex)
 {
 print "<p>error: $ex </p>\n\n";
 die();
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>test</h1>
   </body>
 </html>
