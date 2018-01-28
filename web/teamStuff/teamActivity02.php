<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $myarray = array('computer IT', "Computer science", "web desgne and dev", "Comp Engineering");


     ?>

<!-- link to results.php -->
<form class="" action="results.php" method="post">
  Name: <input type="text" name="name" value="">
  <br><br>
  Email: <input type="text" name="email" value="">
  <br><br>
  <!-- Major:<br>
   <input id="radio" type="radio" name="radio" value="Computer Science">Computer Science<br>
   <input id="radio" type="radio" name="radio" value="Web design and dev">Web design and dev<br>
   <input id="radio" type="radio" name="radio" value="computer IT">computer IT<br>
   <input id="radio" type="radio" name="radio" value="Computer Engineering">Computer Engineering<br>
  <br><br> -->

  <?php

  foreach ($myarray as $value)
  {
    echo "<input id="radio" type="radio" name="radio" value="$value">$value<br>";
  }

   ?>

  <input type="checkbox" name="country[]" value="North America">North America<br>
  <input type="checkbox" name="country[]" value="South America">South America<br>
  <input type="checkbox" name="country[]" value="Europe">Europe<br>
  <input type="checkbox" name="country[]" value="Asia">Asia<br>
  <input type="checkbox" name="country[]" value="Australia">Australia<br>
  <input type="checkbox" name="country[]" value="Africa">Africa<br>
  <input type="checkbox" name="country[]" value="Antartica">Antartica<br>
  <br>

  Comments: <textarea name="comments" rows="8" cols="80"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">


</form>
  </body>
</html>
