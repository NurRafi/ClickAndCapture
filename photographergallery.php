<?php
require('db.php');
session_start();
$email = $_SESSION['email'];
$query = "SELECT id FROM photographer WHERE email_id = '$email'";
$result = mysqli_query($con, $query) or die(mysql_error());
$rows = mysqli_fetch_array($result);
$pid = $rows['id'];
$_SESSION["id"] = $pid;

//echo $pid;
//$id=$_SESSION['photographer_id'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM project WHERE photographerid = $pid";
$returnvalue = $conn->query($sql);
$table = $returnvalue->fetchAll();
//print_r($table);
//$row=$table[0];
//$row1=$table[1];
//$row2=$table[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">
    <link rel="stylesheet" href="css1/jquery-ui.css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css1/aos.css">
    <link rel="stylesheet" href="css1/fancybox.min.css">

    <link rel="stylesheet" href="css1/style.css">

</head>
<body>


<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js1-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="header-bar d-flex d-lg-block align-items-center" data-aos="fade-left">
        <div class="site-logo">
            <a href="booking.php"></a>
        </div>

        <div class="d-inline-block d-xl-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#"
                                                                                                            class="site-menu-toggle js1-menu-toggle text-white"><span
                        class="icon-menu h3"></span></a></div>

        <div class="main-menu">
            <ul class="js1-clone-nav">
                <li class="active"><a href="">Home</a></li>
                <li><a href="photographerpost.php">Add project</a></li>
                <li><a href="changepassword.php">Change Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
            <ul class="social js1-clone-nav">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
        </div>
    </header>
    <main class="main-content">
        <div class="container-fluid photos">
            <div class="row align-items-stretch">
                <?php

                foreach ($table as $row) {
                    ?>

                    <div class="col-6 col-md-6 col-lg-8" data-aos="fade-up">
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>"
                           class="d-block photo-item">
                            <img src="upload/<?php echo $row['image']; ?> " alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">Photo Title</h3>
                                    <span class="meta">Click to delete whole project</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>"
                           class="d-block photo-item">
                            <img src="upload/<?php echo $row['image1'] ?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">Photos Title Here</h3>
                                    <span class="meta">Click to delete whole project</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>"
                           class="d-block photo-item">
                            <img src="upload/<?php echo $row['image2'] ?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <h3 class="heading">Photos Title Here</h3>
                                <span class="meta">Click to delete whole project</span>
                            </div>
                        </a>
                    </div>

                    <?php
                }
                ?>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 text-center py-5">
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </main>

</div> <!-- .site-wrap -->

<script src="js1/jquery-3.3.1.min.js"></script>
<script src="js1/jquery-migrate-3.0.1.min.js"></script>
<script src="js1/jquery-ui.js"></script>
<script src="js1/popper.min.js"></script>
<script src="js1/bootstrap.min.js"></script>
<script src="js1/owl.carousel.min.js"></script>
<script src="js1/jquery.stellar.min.js"></script>
<script src="js1/jquery.countdown.min.js"></script>
<script src="js1/jquery.magnific-popup.min.js"></script>
<script src="js1/bootstrap-datepicker.min.js"></script>
<script src="js1/aos.js"></script>

<script src="js1/jquery.fancybox.min.js"></script>

<script src="js1/main.js"></script>

</body>
</html>