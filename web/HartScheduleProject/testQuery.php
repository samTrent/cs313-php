<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
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

    foreach ($db->query('SELECT shiftname FROM shift;') as $row)
    {
      echo '<tr>';
      echo '<td>' . $row['shiftname'] . '</td>';
      echo '</tr>';
    }


    //duties

    foreach ($db->query('SELECT dutyname FROM duty;') as $row)
    {
      echo '<tr>';
      echo '<td>' . $row['dutyname'] . '</td>';
      echo '</tr>';
    }


    //Employee

    foreach ($db->query('SELECT name FROM employee;') as $row)
    {
       echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }


  echo '</table>';
     ?>

  </body>
</html>

<?php
