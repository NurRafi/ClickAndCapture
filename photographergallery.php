<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clickandcapture";
session_start();
$id=$_SESSION['photographer_id'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql =  "SELECT * FROM project WHERE photographerid = $id";
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
            <a href="booking.html"></a>
        </div>

        <div class="d-inline-block d-xl-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js1-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

        <div class="main-menu">
            <ul class="js1-clone-nav">
                <li class="active"><a href="locationsearch.php">Home</a></li>
                <li><a href="gallery.php">Photos</a></li>
                <li><a href="bio.html">Bio</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="payment.php">Payment</a></li>
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

                foreach($table as $row){
                    ?>

                    <div class="col-6 col-md-6 col-lg-8" data-aos="fade-up">
                        <a href="single.html" class="d-block photo-item">
                            <img src="upload/<?php echo $row['image']; ?> " alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">Photos Title Here</h3>
                                    <span class="meta">42 Photos</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="single.html" class="d-block photo-item">
                            <img src="upload/<?php echo $row['image1']?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">Photos Title Here</h3>
                                    <span class="meta">42 Photos</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <a href="single.html" class="d-block photo-item">
                            <img src="upload/<?php echo $row['image2']?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <h3 class="heading">Photos Title Here</h3>
                                <span class="meta">42 Photos</span>
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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