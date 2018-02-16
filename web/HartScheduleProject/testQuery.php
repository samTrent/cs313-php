<?php


 ?>
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


    echo '<table>';
    //table headers
    echo '<tr>';
    echo '<th>Shift</th>';
    foreach($db->query('SELECT date FROM submittedschedule WHERE submittedschedulid = 1') as $row)
    {
      //get dates
      echo '<th colspan="3">' . $row['date'] . '</th>';
    }
    //echo '<th>Duty</th>';
    echo '</tr>';

    $shiftid;
    $dutyid;

    //Shifts
    foreach($db->query('SELECT shiftid, shift FROM shift') as $shiftrow)
    {
      //start massive row...
      echo '<tr>';
          //get shifts default should be 4 for rowspan
          echo '<td rowspan="4">' . $shiftrow['shift'] . '</td>';
          $shiftid = $shiftrow['shiftid'];
            //get duties...

            foreach($db->query('SELECT dutyid, duty FROM duty') as $dutyrow)
            {

              //make a new table head on the same row as our shiftname
              echo '<th>' . $dutyrow['duty'] . '</th>';
              $dutyid = $dutyrow['dutyid'];

            }
            //fitness center
            foreach ($db->query('SELECT e.firstname, d.duty FROM employee e
            JOIN submittedschedule su ON e.employeeid = su.employee
            JOIN duty d ON d.dutyid = su.duty WHERE d.duty = 'ICenter';') as $row)
            {
              echo '<tr>';
              echo '<td>' . $row['e.firstname'] .'</td>'; // FC
              echo '<td>' . $row['e.firstname'] .'</td>'; // IC
              echo '<td>' . $row['e.firstname'] .'</td>'; // ER
              echo '</tr>';
            }


        //end massive row
        echo '</tr>';
    }

    // foreach ($db->query('SELECT e.firstname, sh.shiftname, d.dutyname FROM employee e
    //    JOIN schedule s on e.employeeid = s.scheduleid
    //    JOIN shift sh on sh.shiftid = s.scheduleid
    //    JOIN duty d on d.dutyid = s.scheduleid') as $row)
    // {
    //   //start the massive rows...
    //   echo '<tr>';
    //   //get shift
    //   echo '<td>' . $row['shiftname'] . '</td>';
    //     //get duty names inside shift...
    //     foreach($db->query('SELECT dutyname FROM duty') as $dutyrow)
    //     {
    //         echo '<th>' . $dutyrow['dutyname'] . '</th>';
    //     }
    //   //  echo '<th>' . $row['dutyname'] . '</th>';
    //   //end massive row
    //   echo '</tr>';
    //
    //   // echo '<tr>';
    //   // echo '<td>' . $row['firstname'] . '</td>';
    //   // echo '<td>' . $row['shiftname'] . '</td>';
    //   // echo '<td>' . $row['dutyname'] . '</td>';
    //   // echo '</tr>';
    //
    // }


    echo '</table>';
     ?>

  </body>
</html>

<?php
