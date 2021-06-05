<?php
require "database.php";

if (isset($_POST)) {
    $user_email = $_POST["user_email"];
    $project_name = $_POST["project_name"];

    $sql = "select photographerid from project where project_name = '$project_name'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $photographer_id = $row['photographerid'];

    $sql = "select price from photographer where photographer_id = '$photographer_id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];

    $sql = "insert into booking(user_email, photographer_id, price) values($user_email, $photographer_id, $price)";
    if ($connection->query($sql) === TRUE) {
        include "success.html";
    } else {
        echo "Order failed";
    }

    $connection->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Checkout</title>
</head>
<body>
<h1>Checkout</h1>
<div class="cont">
    <div class="main">
        <form method="POST" action="order.php" id="form">
            <fieldset>
                <h3>Credit Card</h3>
                </br>
                <label for="">Card Number</label>
                <div class="input-container">
                    <input required="true" type="password" maxlength="19">
                    <i class="fas fa-credit-card"></i>
                </div>
                <label for="">Expiration Date</label>
                <div class="input-container">
                    <input required="true" type="date">
                    <i class="fas fa-hourglass-end"></i>
                </div>
                <label for="">Card Verification Value (CVV)</label>
                <div class="input-container">
                    <input required="true" type="password" maxlength="4">
                    <i class="fas fa-unlock-alt"></i>
                </div>
            </fieldset>
            <button form="form" id="submit" type="submit">Purchase</button>
        </form>
    </div>

    <div style="margin-top: 3rem;">
        <div class="summary">
            <p>Total</p>
            <p><?php echo $price?></p>
        </div>
    </div>
</div>
</div>
</body>
</html>
