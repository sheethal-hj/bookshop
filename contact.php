<?php
include("connect.php");
$sql = "SELECT `categoryname` FROM `category`";
$result = mysqli_query($link,$sql);
$num = mysqli_num_rows($result);
$sql2 = "SELECT `categoryname` FROM `category`";
$result2 = mysqli_query($link,$sql2);
$num2 = mysqli_num_rows($result2);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

    <title>Contact</title>
    <style>
body {
  background-image: url(images/web-1012467_1920.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand em-text" href="#">BookShop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <!--dropdown bar-->
            <li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
	            <ul class="dropdown-menu">
	            <?php
	          if($num>0){
	            while($category= mysqli_fetch_array($result))
	            {
	            ?> 
	            <li class="list-group-item"><a href="#">
	              <?php echo $category['categoryname']; ?>
	            </a> 
	            </li>
	            <?php
	            }
	          }
	          ?>
	            </ul>
	          </li>
            <li><a href="#">Contact</a></li>
                <!--search bar-->
              </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">
              <spam class="glyphicon glyphicon-search"></spam>
              </button>
            </form>
          
            <ul class="nav navbar-nav navbar-right">
              <li><a class="glyphicon glyphicon-shopping-cart" href="#"></a></li>
              <li><a class="glyphicon glyphicon-user" href="index.php"></a></li>
            </ul>
          

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
        
      <h2 style="color:#fff; text-shadow: 2px 2px 5px cornsilk;">CONTACT US:</h2><br>
    
        <h3 style="color:#fff">Refer us for regular updates and clarifications:</h3>
        <h2 style="color:#fff"> Contact Number: 9876543210</h2>
        <h2 style="color:#fff">Email Id: bookshopreference@gmail.com</h2>
        <h3 style="color:#fff"> Follow us on:</h3>
        <h2 style="color:#fff"> Instagram Id: @bookshopreference</h2>
        <h2 style="color:#fff"> Facebook Id: @bookshopreference</h2> 

    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
       
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <p style="text-align:center;"><a class="btn btn-default" href="index.php" role="button">Back &raquo;</a></p>

  </body>
</html>
