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

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $text = "<link>";
        fwrite($xmlFile, $text);
        $text = "<title>";
        fwrite($xmlFile, $text);
        $text = $row['name'];
        fwrite($xmlFile, $text);
        $text = "</title>";
        fwrite($xmlFile, $text);
        $text = "<url>";
        fwrite($xmlFile, $text);
        $text = $row['email'];
        fwrite($xmlFile, $text);
        $text = "</url>";
        fwrite($xmlFile, $text);
        $text = "</link>";
        fwrite($xmlFile, $text);
    }
} else {
    echo "0 results";
}
$text = "</pages>";
fwrite($xmlFile, $text);
$text = "</xml>";
fwrite($xmlFile, $text);
fclose($xmlFile);
?>