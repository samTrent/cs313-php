<?php

$FCempArray = array();
$ICempArray = array();
$ERempArray = array();


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

      function getFitnessCenterEmps($db, $shiftid, &$FCempArray, $datestamp)
      {
        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Fitness Center\' AND s.shiftid = '. $shiftid .' AND su.date = \''. $datestamp .'\'') as $row)
        {
          //fitness center
          array_push($FCempArray, $row['firstname']);

        }

      }

      function getICenterEmps($db, $shiftid, &$ICempArray, $datestamp)
      {
        $querystmt = 'SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'ICenter\' AND s.shiftid = ' . $shiftid . ' AND su.date = :datestamp';

        $querystmt->bindValue(':datestamp', $datestamp, PDO::PARAM_STR);
        
        foreach ($db->query($querystmt) as $row)
        {
          array_push($ICempArray, $row['firstname']);
        }

      }

      function getEquipmentEmps($db, $shiftid, &$ERempArray, $datestamp)
      {

        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Equipment Room\' AND s.shiftid = '. $shiftid .' AND su.date = \'02-17-2018\'') as $row)
        {
          //fitness center
          array_push($ERempArray, $row['firstname']);

        }
      }

      function clearAllArrays(&$FCempArray, &$ICempArray, &$ERempArray)
      {
        $FCempArray = array();
        $ICempArray = array();
        $ERempArray = array();
      }

    }
    catch (PDOException $ex) {
     print "<p>error: $ex </p>\n\n";
     die();
    }
    $shiftid;
    $dutyid;
    $datestamp;

    foreach($db->query('SELECT distinct date FROM submittedschedule') as $row)
    {
      echo '<table>';
      echo '<tr>';
      echo '<th>Shift</th>';
      //get dates
      echo '<th colspan="3">' . $row['date'] . '</th>';
      $datestamp = $row['date'];

    //Shifts
    foreach($db->query('SELECT shiftid, shift FROM shift') as $shiftrow)
    {
      //start massive row...
      echo '<tr>';
          //get shifts default should be 4 for rowspan
          echo '<td rowspan="4">' . $shiftrow['shift'] . '</td>';
          $shiftid = $shiftrow['shiftid'];
            //get duties...
            getFitnessCenterEmps($db, $shiftid, $FCempArray, $datestamp);
            getICenterEmps($db,$shiftid, $ICempArray, $datestamp);
            getEquipmentEmps($db,$shiftid, $ERempArray, $datestamp);

            //Get the three duties
            foreach($db->query('SELECT dutyid, duty FROM duty') as $dutyrow)
            {

              //make a new table head on the same row as our shiftname
              echo '<th>' . $dutyrow['duty'] . '</th>';
              $dutyid = $dutyrow['dutyid'];

            }
            //get all employees for each shift id.
            if($shiftid == 1)
            {
              for ($i=0; $i < 3; $i++)
              {
                //fitness center
                echo '<tr>';
                echo '<td>' . $FCempArray[$i] .'</td>'; // FC
                echo '<td>' . $ICempArray[$i] .'</td>'; // IC
                echo '<td>' . $ERempArray[$i] .'</td>'; // ER
                echo '</tr>';
              }
            }
            if($shiftid == 2)
            {
              for ($i=0; $i < 3; $i++)
              {
                //fitness center
                echo '<tr>';
                echo '<td>' . $FCempArray[$i] .'</td>'; // FC
                echo '<td>' . $ICempArray[$i] .'</td>'; // IC
                echo '<td>' . $ERempArray[$i] .'</td>'; // ER
                echo '</tr>';
              }
            }
            if($shiftid == 3)
            {
              for ($i=0; $i < 3; $i++)
              {
                //fitness center
                echo '<tr>';
                echo '<td>' . $FCempArray[$i] .'</td>'; // FC
                echo '<td>' . $ICempArray[$i] .'</td>'; // IC
                echo '<td>' . $ERempArray[$i] .'</td>'; // ER
                echo '</tr>';
              }
            }
            if($shiftid == 4)
            {
              for ($i=0; $i < 3; $i++)
              {
                //fitness center
                echo '<tr>';
                echo '<td>' . $FCempArray[$i] .'</td>'; // FC
                echo '<td>' . $ICempArray[$i] .'</td>'; // IC
                echo '<td>' . $ERempArray[$i] .'</td>'; // ER
                echo '</tr>';
              }
            }
           clearAllArrays($FCempArray, $ICempArray, $ERempArray);

        }

        echo '</tr>';

      echo '</table>';
      echo '<br>';
      }





     ?>

  </body>
</html>

<?php
