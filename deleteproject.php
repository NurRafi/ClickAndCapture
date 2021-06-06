<?php
require('db.php');
$project = $_GET['project'];

$sql = "select image, image1, image2 from project where project_name = '$project'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$image = $row['image'];
$image1 = $row['image1'];
$image2 = $row['image2'];

$old_file = getcwd()."\upload\\".$image;
$new_file = getcwd()."\deleted\image.jpg";
rename($old_file, $new_file);

$old_file = getcwd()."\upload\\".$image1;
$new_file = getcwd()."\deleted\image.jpg";
rename($old_file, $new_file);

