<?php


  $_POST['username'];
  $_POST['password'];

  $validUser = false;
  $validPass = false;

  $stmt = $db ->prepare("SELECT username, password FROM users");
  $stmt->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($row in $rows)
  {
    echo '<p> USER: ' . $row['username'] . '</p>';
    echo '<p> PASS: ' . $row['password'] . '</p>';

  }






 ?>
