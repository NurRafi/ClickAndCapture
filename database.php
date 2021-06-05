<?php
$server = "localhost";
$username = "root";
$password = "root";
$database = "clickandcapture";

$connection = new mysqli($server, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}