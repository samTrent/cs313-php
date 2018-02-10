<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    try {
      $host = "ec2-107-21-236-219.compute-1.amazonaws.com";
      $dbname = "dcupbm4rvpsqb2";
      $user = "zaqfmlhepcfhlm";
      $password = "c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4";
      $port = "5432";

      $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    }
    catch (PDOException $ex) {
     print "<p>error: $ex </p>\n\n";
     die();
    }

    echo '<table>';
    //table headers
    echo '<tr>';
    echo '<th>Shifts</th>';
    echo '<th>Duties</th>';
    echo '<th>Employee</th>';
    echo '</tr>';

    //Shifts
    echo '<tr>';
    foreach ($db->query('SELECT shiftname FROM shift;') as $row)
    {
      echo '<td>' . $row['shiftname'] . '</td>';
    }
    echo '</tr>';

    //duties
    echo '<tr>';
    foreach ($db->query('SELECT dutyname FROM duty;') as $row)
    {
      echo '<td>' . $row['dutyname'] . '</td>';
    }
    echo '</tr>';

    //Employee
    echo '<tr>';
    foreach ($db->query('SELECT name FROM employee;') as $row)
    {
      echo '<td>' . $row['name'] . '</td>';
    }
    echo '</tr>';

  echo '</table>';
     ?>

  </body>
</html>

<?php
