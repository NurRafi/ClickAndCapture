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


    ?>

