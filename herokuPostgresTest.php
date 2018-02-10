<?php


$dbHost = 'ec2-107-21-236-219.compute-1.amazonaws.com';
$dbPort = '5432';
$dbUser = 'zaqfmlhepcfhlm';
$dbPassword = 'c9c64abec3d5de71334d351d883347b9e63e6a8b3a2d7fab5bbd3551f20112f4';
$dbName = 'dcupbm4rvpsqb2';

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex </p>\n\n";
 die();
}



?>
