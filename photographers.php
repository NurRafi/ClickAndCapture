<!DOCTYPE html>
<html lang="en">
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<form name="registration" action="photographers.php" method="post">
    <body>

    <section class="left-section">
        <div id="left-cover" class="cover cover-hide">
            <img src="img/boat.jpg" alt="">
            <h1>Welcome !</h1>
            <h3>Already have an account ?</h3>
            <button type="button" class="switch-btn" onclick="location.reload()">Login</button>
        </div>
        <div id="left-form" class="form fade-in-element">
            <h1>Login</h1>
            <form action="login.php" method="post">

                <input type="text" name="email" class="input-box" placeholder="Enter your email">
                <input type="password" name="password" class="input-box" placeholder="Enter your Password">
                <input type="submit" name="login1" class="btn" value="Login">
            </form>
        </div>
    </section>

    <section class="right-section">
        <div id="right-cover" class="cover fade-in-element">
            <img src="img/cover.png" alt="">
            <h1>Welcome !</h1>
            <h3>Don't have an account ?</h3>
            <button type="button" class="switch-btn" onclick="switchSignup()">Signup</button>
        </div>
        <div id="right-form" class="form form-hide">
            <h1>Signup</h1>
            <form action="photographers.php" method="post">
                <input type="id" name="user-id" class="input-box" placeholder="Photographer id">

                <input type="text" name="user-name" class="input-box" placeholder="User Name">
                <input type="email" name="email" class="input-box" placeholder="Email">
                <input type="password" name="password" class="input-box" placeholder="Password">
                <input type="Phone Num" name="phone" class="input-box" placeholder="Phone Num">
                <input type="area" name="area" class="input-box" placeholder="Area">
                <input type="city" name="city" class="input-box" placeholder="City">
                <input type="price" name="price" class="input-box" placeholder="price">
                <input type="Details Address" name="Address" class="input-box" placeholder="Details Address">

                <input type="submit" name="a" class="btn" value="Signup">
            </form>
        </div>
    </section>

    <script src="js/main.js"></script>

    </body>
</form>
</html>


<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['a'])) {

    $id = mysqli_real_escape_string($con, $_POST['user-id']);

    $name = mysqli_real_escape_string($con, $_POST['user-name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Mobile_Number = mysqli_real_escape_string($con, $_POST['phone']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $Area = mysqli_real_escape_string($con, $_POST['area']);
    $City = mysqli_real_escape_string($con, $_POST['city']);

    $address = mysqli_real_escape_string($con, $_POST['Address']);
    $price = mysqli_real_escape_string($con, $_POST['price']);


    $query = "INSERT into photographer (id,email_id,name,phone_num,password,area,city,Address_details,price)
       VALUES ($id,'$email', '$name','$Mobile_Number',$password,'$Area','$City','$address',$price)";
    $result = mysqli_query($con, $query);
    if ($result) {

        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='photographers.php'>Login</a></div>";
    }
}


?>
















<?php
session_start();
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['login1'])) {


    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = mysqli_real_escape_string($con, $_POST['password']);


    $query = "SELECT * FROM photographer WHERE email_id='$email'
      and password= '$password'";

    $result = mysqli_query($con, $query) or die(mysql_error());

    $rows = mysqli_num_rows($result);


    if ($rows == 1) {
        $_SESSION['email'] = $email;


        header("Location: photographergallery.php");
    } else {
        echo "<div class='form'>
	<h3>Useremail/password is incorrect.</h3>

<br/>Click here to <a href='photographers.php'>Login</a></div>";
    }

}


?>

