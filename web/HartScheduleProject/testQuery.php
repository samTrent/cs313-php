<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
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

    // echo '<table>';
    // //table headers
    // echo '<tr>';
    // echo '<th>Employee</th>';
    // echo '<th>Shift</th>';
    // echo '<th>Duty</th>';
    // //echo '<th>Duty</th>';
    // echo '</tr>';
    //
    // //Shifts
    // foreach ($db->query('SELECT e.firstname, sh.shiftname, d.dutyname FROM employee e
    //    JOIN schedule s on e.employeeid = s.scheduleid
    //    JOIN shift sh on sh.shiftid = s.scheduleid
    //    JOIN duty d on d.dutyid = s.scheduleid') as $row)
    // {
    //   echo '<tr>';
    //   echo '<td>' . $row['firstname'] . '</td>';
    //   echo '<td>' . $row['shiftname'] . '</td>';
    //   echo '<td>' . $row['dutyname'] . '</td>';
    //   echo '</tr>';
    //
    // }

    echo '<table>';
    //table headers
    echo '<tr>';
    echo '<th>Shift</th>';
    foreach($db->query('SELECT theDate FROM schedule') as $row)
    {
      echo '<th>' . $row['theDate'] . '</th>';
    }// get all the days
    echo '<th>Duty</th>';
    //echo '<th>Duty</th>';
    echo '</tr>';

    echo '<tr>';
    //Shifts
    foreach($db->query('SELECT shiftname FROM shift') as $row)
    {

          //get dutys
            //get employees

        echo '<td>' . $row['shiftname'] . '</td>';
    }
    // foreach ($db->query('SELECT e.firstname, sh.shiftname, d.dutyname FROM employee e
    //    JOIN schedule s on e.employeeid = s.scheduleid
    //    JOIN shift sh on sh.shiftid = s.scheduleid
    //    JOIN duty d on d.dutyid = s.scheduleid') as $row)
    // {
    //   echo '<tr>';
    //   echo '<td>' . $row['firstname'] . '</td>';
    //   echo '<td>' . $row['shiftname'] . '</td>';
    //   echo '<td>' . $row['dutyname'] . '</td>';
    //   echo '</tr>';
    //
    // }

    echo '</tr>';
    echo '</table>';
     ?>

  </body>
</html>

<?php
