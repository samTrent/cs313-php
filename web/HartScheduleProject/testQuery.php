<?php
$FCempArray = array();
$ICempArray = array();
$ERempArray = array();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="hartSchedulePage.css">
    <meta charset="utf-8">
    <script src="engine.js" ></script>
    <title>Hart Schedules</title>
  </head>
  <body>
    <img id="backgroundImg" src="hartGym3.jpg" alt="gym">
    <!-- logout button -->
    <form style="float: right" onsubmit="return confirm('Are you sure you want to logout?');" class="" action="loginPage.php" method="post">
      <input class="logoutButton" type="submit" name="" value="Logout">
    </form>

    <!-- start php processing -->
    <?php
    require("connectToDatabase.php");
    $db = getDatabaseConnection();

      //creates a button the user can press to delete a schedule...
      function createDeleteButtonForSchedule($datestamp)
      {
        echo "<form onsubmit='return confirm('Are you sure you want to delete this table?');' action='deleteScheduleForDate.php' method='post'>";
        echo '<input  hidden="true" type="text" name="date" value="'. $datestamp .'">';
        echo '<input class="deleteTableButton" type="submit" name="" value="Delete This Table">';
        echo '</form>';
      }


      function getFitnessCenterEmps($db, $shiftid, &$FCempArray, $datestamp)
      {
        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Fitness Center\' AND s.shiftid = '. $shiftid .' AND su.submitteddate = \''. $datestamp .'\'') as $row)
        {
          //fitness center
          array_push($FCempArray, $row['firstname']);

        }

      }

      function getICenterEmps($db, $shiftid, &$ICempArray, $datestamp)
      {
        // echo '<p>preping query...</p>';
        // $querystmt = $db->prepare("SELECT e.firstname, d.duty, s.shift FROM employee e JOIN submittedschedule su ON e.employeeid = su.employee JOIN duty d ON d.dutyid = su.duty JOIN shift s ON s.shiftid = su.shift WHERE d.duty = \'ICenter\' AND s.shiftid = :shiftid AND su.date = :datestamp");
        //
        // $querystmt->bindValue(":datestamp", $datestamp, PDO::PARAM_STR);
        // $querystmt->bindValue(":shiftid", $shiftid, PDO::PARAM_INT);
        //
        // $querystmt->execute();
        // $rows = $querystmt->fetchAll(PDO::FETCH_ASSOC);
        // echo '<p>just before foreach</p>';
        //
        // foreach ($rows as $row)
        // {
        //     echo '<p>IN foreach</p>';
        //   echo '<p>The row is ' . $row['firstname'] . '</p>';
        //   array_push($ICempArray, $row['firstname']);
        // }

        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'ICenter\' AND s.shiftid = '. $shiftid .' AND su.submitteddate = \''. $datestamp .'\'') as $row)
        {
          //fitness center
          array_push($ICempArray, $row['firstname']);

        }

      }

      function getEquipmentEmps($db, $shiftid, &$ERempArray, $datestamp)
      {

        foreach ($db->query('SELECT e.firstname, d.duty, s.shift FROM employee e
        JOIN submittedschedule su ON e.employeeid = su.employee
        JOIN duty d ON d.dutyid = su.duty
        JOIN shift s ON s.shiftid = su.shift
        WHERE d.duty = \'Equipment Room\' AND s.shiftid = '. $shiftid .' AND su.submitteddate = \''. $datestamp .'\'') as $row)
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

    $shiftid;  //lets us get shiftid
    $dutyid;   //lets us get dutyid
    $datestamp;//lets us get datestamp

    //first lets check to see if there is anything in our table...
    $count = 0;
    foreach ($db->query('SELECT * FROM submittedschedule') as $row)
    {
      $count += 1;
    }
    if($count == 0)
    {
      echo "<h1 class='noTablesInDatabaseAlert'>There are currently no recorded schedules</h1>";
    }


    //CREATE TABLES to_date('05 Dec 2000', 'DD Mon YYYY')
    foreach($db->query("SELECT distinct submitteddate FROM submittedschedule") as $row)
    {
      echo '<table>';
      createDeleteButtonForSchedule($row['submitteddate']);
      echo '<tr>';
      echo "<th class='topTableHead'>Shifts</th>";

      //get dates
      $date = new DateTime($row['submitteddate']);
      //formate date
      echo "<th class='topTableHead' colspan='3'>" . $date->format('F j, Y') . '</th>';
      $datestamp = $row['submitteddate'];

    //Shifts
    foreach($db->query('SELECT shiftid, shift FROM shift') as $shiftrow)
    {
      //start massive row...
      echo '<tr>';
          //get shifts default should be 4 for rowspan
          echo '<td class="shiftrow" rowspan="4">' . $shiftrow['shift'] . '</td>';
          $shiftid = $shiftrow['shiftid'];
            //get duties...
            getICenterEmps($db,$shiftid, $ICempArray, $datestamp);
            getEquipmentEmps($db,$shiftid, $ERempArray, $datestamp);
            getFitnessCenterEmps($db, $shiftid, $FCempArray, $datestamp);

            //Get the three duties
            foreach($db->query('SELECT dutyid, duty FROM duty') as $dutyrow)
            {
              // echo '<p>This is duty tag: '. $dutyrow['duty']. '<p>';

              //make a new table head on the same row as our shiftname
              // echo '<th>' . $dutyrow['duty'] . '</th>';
              if($dutyrow['duty'] == 'ICenter')
              {
                echo "<th class='ICenter'>" . $dutyrow['duty'] . "</th>";
              }
              elseif ($dutyrow['duty'] == 'Equipment Room')
              {
                echo '<th class="equipmentRoom">' . $dutyrow['duty'] . '</th>';
              }
              elseif ($dutyrow['duty'] == 'Fitness Center')
              {
                echo '<th class="fitnessCenter">' . $dutyrow['duty'] . '</th>';
              }
              $dutyid = $dutyrow['dutyid'];

            }
            //get all employees for each shift id.
            if($shiftid == 1)
            {
              for ($i=0; $i < 3; $i++)
              {
                //out put employees (left to right)
                echo '<tr>';
                echo "<td class='employeeCell'>" . $ICempArray[$i] .'</td>'; // IC
                echo "<td class='employeeCell'>" . $ERempArray[$i] .'</td>'; // ER
                echo "<td class='employeeCell'>" . $FCempArray[$i] .'</td>'; // FC
                echo '</tr>';
              }
            }
            if($shiftid == 2)
            {
              for ($i=0; $i < 3; $i++)
              {
                  //out put employees (left to right)
                echo '<tr>';
                echo "<td class='employeeCell'>" . $ICempArray[$i] .'</td>'; // IC
                echo "<td class='employeeCell'>" . $ERempArray[$i] .'</td>'; // ER
                echo "<td class='employeeCell'>" . $FCempArray[$i] .'</td>'; // FC
                echo '</tr>';
              }
            }
            if($shiftid == 3)
            {
              for ($i=0; $i < 3; $i++)
              {
                  //out put employees (left to right)
                echo '<tr>';
                echo "<td class='employeeCell'>" . $ICempArray[$i] .'</td>'; // IC
                echo "<td class='employeeCell'>" . $ERempArray[$i] .'</td>'; // ER
                echo "<td class='employeeCell'>" . $FCempArray[$i] .'</td>'; // FC
                echo '</tr>';
              }
            }
            if($shiftid == 4)
            {
              for ($i=0; $i < 3; $i++)
              {
                //out put employees (left to right)
                echo '<tr>';
                echo "<td class='employeeCell'>" . $ICempArray[$i] .'</td>'; // IC
                echo "<td class='employeeCell'>" . $ERempArray[$i] .'</td>'; // ER
                echo "<td class='employeeCell'>" . $FCempArray[$i] .'</td>'; // FC
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
