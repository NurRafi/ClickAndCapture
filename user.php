<!DOCTYPE html>
<html lang="en">
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<form name="registration" action="user.php" method="post">
    <body>

    <section class="left-section">
        <div id="left-cover" class="cover cover-hide">
            <img src="img/girl.jpg" alt="">
            <h1>Welcome !</h1>
            <h3>Already have an account ?</h3>
            <button type="button" class="switch-btn" onclick="location.reload()">Login</button>
        </div>
        <div id="left-form" class="form fade-in-element">
            <h1>Login</h1>
            <form action="user.php" method="post">
                <input type="text" name="email" class="input-box" placeholder="enter your email">
                <input type="password" name="password" class="input-box" placeholder="Password">
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
            <form action="user.php" method="post">

                <input type="text" name="user-name" class="input-box" placeholder="User Name">
                <input type="email" name="email" class="input-box" placeholder="Email">
                <input type="password" name="password" class="input-box" placeholder="Password">
                <input type="Phone Num" name="phone" class="input-box" placeholder="Phone Num">

                <input type="submit" name="submit" class="btn" value="Signup">
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

if (isset($_POST['submit'])) {


    //echo "hello";

    $user_name = mysqli_real_escape_string($con, $_POST['user-name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Mobile_Number = mysqli_real_escape_string($con, $_POST['phone']);

    $password = mysqli_real_escape_string($con, $_POST['password']);

    //echo "$user_name";
    //echo "$email";


    $query = "INSERT into user(name,email,password,phone)
VALUES ('$user_name','$email', '$password','$Mobile_Number')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
}


?>

<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['login1'])) {


    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    echo $email, $password;

    $query = "SELECT * FROM user WHERE email='$email'
      and password= '$password'";

    $result = mysqli_query($con, $query) or die(mysql_error());

    $rows = mysqli_num_rows($result);


    if ($rows == 1) {
        $_SESSION['email'] = $email;

        header("Location: locationsearch.php");
    } else {
        echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='Firstpage.html'>Login</a></div>";
    }

}


?>
