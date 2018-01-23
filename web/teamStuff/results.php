<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<p>This is the results page!</p>
    Welcome
    <?php echo $_POST["name"] . "<br>";

    echo "mailto:" . $_POST["email"] . "<br>";
    echo "Major:" . $_POST["radio"] . "<br>";


    // $pieces = explode(":", $_POST["country"]);

    foreach ($_POST["country"] as $value) {

      echo $value . "<br>";
    }



    echo $_POST["comments"] . "<br>";



    ?><br>


  </body>
</html>
