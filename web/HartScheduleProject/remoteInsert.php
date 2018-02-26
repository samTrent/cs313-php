<?php
require("connectToDatabase.php");
$db = getDatabaseConnection();

  //get employeeID
  $stmt = $db ->prepare("SELECT employeeid FROM employee WHERE firstname = :firstname");
  $stmt->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
  $stmt->execute();
  $employeeID = $stmt->fetch(PDO::FETCH_NUM);
  echo 'The employeeID for '. $_POST['firstname'] . ' is :: ' . $employeeID[0] . ' <br>';

  //get dutyid
  $stmt = $db ->prepare("SELECT dutyid FROM duty WHERE duty = :duty");
  $stmt->bindValue(':duty', $_POST['duty'], PDO::PARAM_STR);
  $stmt->execute();
  $dutyID = $stmt->fetch(PDO::FETCH_NUM);
  echo 'The dutyID for '. $_POST['duty'] . ' is :: ' . $dutyID[0] . ' <br>';

  echo 'The date is: ' . $_POST['date'] . ' <br>';
  echo 'The shift is: ' . $_POST['shift'] . ' <br>';

  //insert new data...
  $finalstmt = $db ->prepare('INSERT INTO submittedschedule (submitteddate, employee, shift, duty) VALUES (:submitteddate, :firstname, :shift, :duty)');

  $finalstmt->bindValue(":submitteddate", $_POST['date'], PDO::PARAM_STR);
  $finalstmt->bindValue(":firstname", $employeeID[0], PDO::PARAM_INT);
  $finalstmt->bindValue(":shift", $_POST['shift'], PDO::PARAM_INT);
  $finalstmt->bindValue(":duty", $dutyID[0], PDO::PARAM_INT);
  echo 'submitting schedule....<br>';

  //$finalstmt->execute();

  if ($finalstmt->execute())
  {
    echo "SUECCES!<br>";
  }
  else
  {
    echo "INSERT FAILED!<br>";
  }


 ?>
