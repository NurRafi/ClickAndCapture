<?php
require "database.php";
$sql = "select name, email from user";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$result = $connection->query($sql);

$xmlFile = fopen("userList.xml", "w") or die("Unable to open file!");

$text = '<xml>';
fwrite($xmlFile, $text);

$text = "<pages>";
fwrite($xmlFile, $text);