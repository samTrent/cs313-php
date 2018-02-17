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

      function getFitnessCenterEmps($db, $shiftid)
      {
        echo "FUNCTION getFitnessCenterEmps has shiftifid " . $shiftid;
        //echo '<p>FC EMPS</p>';
        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Fitness Center\' AND s.shiftid = $shitid AND su.date = \'02-17-2018\'') as $row)
        {
          //fitness center
          array_push($FCempArray, $row['firstname']);
          echo '<p>' . $row['firstname'] . '</p>'; // FC
        }

      //  echo "FUNCTION getFitnessCenterEmps BEING CALLED";
      }

      function getICenterEmps($db, $shiftid)
      {
        echo "FUNCTION getICenterEmps has shiftifid " . $shiftid;
        //echo '<p>IC EMPS</p>';
        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'ICenter\' AND s.shiftid = $shftid AND su.date = \'02-17-2018\'') as $row)
        {
          //fitness center
          array_push($ICempArray, $row['firstname']);
          echo '<p>' . $row['firstname'] . '</p>'; // FC
        }
      }

      function getEquipmentEmps($db, $shiftid)
      {
        echo "FUNCTION getEquipmentEmps has shiftifid " . $shiftid;
        //echo '<p>ER EMPS</p>';
        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Equipment Room\' AND s.shiftid = $shifid AND su.date = \'02-17-2018\'') as $row)
        {
          //fitness center
          array_push($ERempArray, $row['firstname']);
          echo '<p>' . $row['firstname'] . '</p>'; // FC
        }
      }

      // function clearAllArrays()
      // {
      //   $FCempArray = array();
      //   $ICempArray = array();
      //   $ERempArray = array();
      // }

    }
    catch (PDOException $ex) {
     print "<p>error: $ex </p>\n\n";
     die();
    }


    echo '<table>';
    //table headers
    echo '<tr>';
    echo '<th>Shift</th>';
    foreach($db->query('SELECT date FROM submittedschedule WHERE submittedscheduleid = 1') as $row)
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
            getFitnessCenterEmps($db,$shiftid);
            getICenterEmps($db,$shiftid);
            getEquipmentEmps($db,$shiftid);


            foreach($db->query('SELECT dutyid, duty FROM duty') as $dutyrow)
            {

              //make a new table head on the same row as our shiftname
              echo '<th>' . $dutyrow['duty'] . '</th>';
              $dutyid = $dutyrow['dutyid'];

            }
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
           // clearAllArrays();
            //end massive row
            echo '</tr>';
        }


    echo '</table>';



     ?>

  </body>
</html>

<?php
