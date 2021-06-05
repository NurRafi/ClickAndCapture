<?php
require('db.php');

session_start();
$city=$_SESSION['city'];
$area=$_SESSION['area'];




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "clickandcapture";
	
			try{				
				$conn = new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			}
			catch(PDOException $ex){
				?>
					<script>
						window.alert("Database not connected");
					</script>
				<?php
			}		
			$userquery =  "SELECT * FROM photographer WHERE city = '$city' OR area= '$area'";
			$returnvalue = $conn->query($userquery);
			$table = $returnvalue->fetchAll();
			$id = $table[0][0];
?>





















<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
 <link href="css/profile.css" rel="stylesheet" />
 

<?php
for($i=0; $i<count($table); $i++){
	$row=$table[$i];
	$name=$row['name'];
	$email=$row['email_id'];
	$phone=$row['phone_num'];
	$id=$row['id'];
	$price=$row['price'];
	
	$Address=$row['Address_details'];
	
	$_SESSION['photographer_id']=$id;
	$_SESSION['price']=$price;
	
	
	?>
<div class="container" style="margin-top: 30px;">
    <div class="profile-head">
        <!--col-md-4 col-sm-4 col-xs-12 close-->
        <div class="col-md- col-sm-4 col-xs-12">
          <a href="Gallery.php">
         <img alt="Qries" src="img/153526034.jpg"
		 
		 <span class="meta"></span>
      </a>
         <h6>Photographer Id-<?php  echo $id ?></h6>
            
        </div>
        <!--col-md-4 col-sm-4 col-xs-12 close-->

        <div class="col-md-5 col-sm-5 col-xs-12">
            <h5><?php  echo $name ?></h5>
            <p>*Photographer* </p>
            <ul>
                
                <li><span class="glyphicon glyphicon-map-marker"></span> <?php  echo $Address ?></li>
                
                <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call"><?php  echo $phone ?></a></li>
				<li><span class="glyphicon glyphicon-euro"></span> <a href="#" title="price"><?php  echo $price ?></a></li>
                <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"><?php  echo $email ?></a></li>
            </ul>
        </div>
    </div>
    <!--profile-head close-->
</div>
<!--container close-->
    <?php
    $sql = "SELECT * FROM project WHERE photographerid = $id";
    $returnvalue = $conn->query($sql);
    $table = $returnvalue->fetchAll();
    ?>
    <main class="main-content">
        <div class="container-fluid photos">
            <div class="row align-items-stretch">
                <?php

                foreach ($table as $row) {
                    ?>

                    <div class="col-6 col-md-6 col-lg-8" data-aos="fade-up">
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>" class="d-block photo-item">
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
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>" class="d-block photo-item">
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
                        <a href="deleteproject.php?project=<?php echo $row['project_name'] ?>" class="d-block photo-item">
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

<br/>
<br/>
<?php
}
?>