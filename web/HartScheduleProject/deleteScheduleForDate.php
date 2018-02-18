<?php
require("connectToDatabase.php");
$db = getDatabaseConnection();

    //detele a schedule for a given date...
    $deletestmt = $db ->prepare("DELETE FROM submittedschedule WHERE submitteddate = :submitteddateString");

    $deletestmt->bindValue(":submitteddateString", $_POST['date'], PDO::PARAM_STR);

    if ($deletestmt->execute())
    {
      echo "SUECCES DELETING date<br>";
    }
    else
    {
      echo "DELETING FAILED!<br>";
    }

    header("Location: testQuery.php");
    die();

 ?>
