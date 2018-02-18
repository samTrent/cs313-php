<?php
require("connectToDatabase.php");
$db = getDatabaseConnection();

echo "<p>THIS IS DATE " . $_POST['date'] . " </p>";
echo "<p>THIS IS SHIFT " . $_POST['shift'] . " </p>";

//Clear out old data...
$deletestmt = $db ->prepare("DELETE FROM submittedschedule WHERE submitteddate = :submitteddateString AND shift = :shiftid");

$deletestmt->bindValue(":submitteddateString", $_POST['date'], PDO::PARAM_STR);
$deletestmt->bindValue(":shiftid", $_POST['shift'], PDO::PARAM_INT);

if ($deletestmt->execute())
{
  echo "SUECCES DELETING DATA! AYA<br>";
}
else
{
  echo "DELETING FAILED!<br>";
}

 ?>
