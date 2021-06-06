<?php
require "database.php";
$sql = "select name, email from user";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$result = $connection->query($sql);