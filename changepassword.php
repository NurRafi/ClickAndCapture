<?php
if (!empty($_POST)) {
    session_start();
    $id = $_SESSION["id"];/* userid of the user */
    $con = mysqli_connect('localhost', 'root', '', 'photo') or die('Unable To connect');
    if (count($_POST) > 0) {
        $result = mysqli_query($con, "SELECT password from photographer WHERE id=$id");
        $row = mysqli_fetch_array($result);
        $newpass = $_POST["newPassword"];
        if ($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $_POST["confirmPassword"]) {
            mysqli_query($con, "UPDATE photographer set password=$newpass WHERE id=$id");
            $message = "Password Changed Sucessfully";
        } else {
            $message = "Password is not correct";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Change</title>

</head>
<body>
<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if (isset($message)) {
        echo $message;
    } ?></div>
<form method="post" action="" align="center">
    Current Password:<br>
    <input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
    <br>
    New Password:<br>
    <input type="password" name="newPassword"><span id="newPassword" class="required"></span>
    <br>
    Confirm Password:<br>
    <input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
    <br><br>
    <input type="submit">
</form>
<br>
<br>
</body>
</html>