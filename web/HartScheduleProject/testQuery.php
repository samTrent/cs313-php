<?php session_start();
//kick user out if they are not logged in
require('checkIfUserHasLoggedIn.php');



//---GOBAL VARS ----
//arrays for storing employees to display on the table
$FCempArray = array();
$ICempArray = array();
$ERempArray = array();

$shiftid;  //lets us get shiftid
$dutyid;   //lets us get dutyid
$datestamp;//lets us get datestamp

  //creates a button the user can press to delete a schedule...
  function createDeleteButtonForSchedule($datestamp)
  {
    echo "<form onsubmit='return confirmDeleteTable()' action='deleteScheduleForDate.php' method='post'>";
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
    <form style="float: right" onsubmit="return confirmLogout()" class="" action="loginPage.php" method="post">
      <input class="logoutButton" type="submit" name="" value="Logout">
    </form>

    <!-- start php processing -->
    <?php
    require('getScheduleTables.php');
    getSchedules();
    // echo file_put_contents('php://stderr', print_r(getSchedules(), TRUE));

     ?>


  </body>
</html>

<?php
