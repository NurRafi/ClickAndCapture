<?php
require('db.php');
$project = $_GET['project'];
$sql = "DELETE FROM project WHERE project_name='$project'";
mysqli_query($con, $sql);
header("Location: photographergallery.php");