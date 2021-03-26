<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Click&capture">
    <meta name="author" content="Click&capture">
    <meta name="keywords" content="Click&capture">

    <!-- Title Page-->
    <title>Photographer Project</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/photographerpost.css" rel="stylesheet" media="all">

</head>
<form method="POST" action="photographerpost.php" enctype="multipart/form-data">
    <body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Photographer Project</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">

                        </div>

                        <div class="form-row">
                            <div class="name">Photographer Id</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="photographerid"
                                           placeholder="Enter Your signup Id" required/ >
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Project name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="project name"
                                           placeholder="Your Project Name" required/ >
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Project Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="project_category"
                                              placeholder="write Your Project details here.." required/ ></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3>upload pictures</h3>
                            <input type="file" name="image" id="profile-img" required/><br>
                            <img src="" id="profile-img-tag"/>
                        </div>

                        <div>
                            <input type="file" name="image1" id="profile-img" required/><br>
                            <img src="" id="profile-img-tag" width="100px"/>
                        </div>

                        <div>
                            <input type="file" name="image2" id="profile-img" required/><br>
                            <img src="" id="profile-img-tag" width="100px"/>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                    <button class="btn btn--radius-2 btn--blue-2" name="submit" type="submit">Upload Photo</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="vendor/jquery/jquery.min.js"></script>


<script src="js/global.js"></script>

</body>

</html>


<?php
require('db.php');
if (isset($_POST['submit'])) {
    $name = $_POST['project_name'];
    $id = $_POST['photographerid'];
    $details = $_POST['project_category'];


    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "upload/$image");

    $image1 = $_FILES['image1']['name'];
    $image_tmp1 = $_FILES['image1']['tmp_name'];
    move_uploaded_file($image_tmp1, "upload/$image1");

    $image2 = $_FILES['image2']['name'];
    $image_tmp2 = $_FILES['image2']['tmp_name'];
    move_uploaded_file($image_tmp2, "upload/$image2");


    echo $image1;
    $query = "insert into project(project_name,image,image1,image2,project_category,photographerid)
		values ('$name','$image','$image1','$image2','$details','$id')";

    $result = mysqli_query($con, $query);
    if ($result == 1) {
        ?>
        <script type="text/javascript">
            window.location.href = 'photographergallery.php';
        </script>
        <?php

    } else {
        echo "Insertion Failed";
    }
}
?>