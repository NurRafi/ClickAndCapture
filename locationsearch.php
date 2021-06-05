<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/locationsearch.css" rel="stylesheet" />
  </head>
 <form action="locationsearch.php" method="post">
  <body>
    <div class="s01">
      <form>
	  
	  <div id="cover" class="cover">
			<body style="background-image: url('img/camera.jpg')"> 
			 <h2 style="color:#ED4C67;">Find Photographer </h2>
			
			</body>
			
           <div class="container">
        <fieldset>
		
          
        </fieldset>
		
        <div class="inner-form">
          
          <div class="input-field second-wrap">
            <input id="Area" name="area" type="text" placeholder="Area" />
			<input id="city" name="city" type="text" placeholder="City" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn btn--radius-20 btn--blue-2" name="btn1" type="submit">Search</button>
          </div>
		
        </div>
      
    </div>

          <div>
              <a href="gallery.php" target="_blank">
                  <button class="btn btn4">View all the projects</button>
              </a>
          </div>
  </body>
 </form>
</html>













<?php

 require('db.php');

		 if (isset($_POST['btn1'])){
	  $city = mysqli_real_escape_string($con,$_POST['city']);
	  $area = mysqli_real_escape_string($con,$_POST['area']);
	  session_start();
	  $_SESSION['city'] = $city;
	  $_SESSION['area'] = $area;
	  
	  
                              
if("$city"!=null)
								  {
									?>
									<script type="text/javascript">
								   window.location.href = 'profile.php';
									</script>
										<?php
								  }
								  
							  }
							  
	                           ?>