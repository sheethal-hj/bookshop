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

    <title>Admin</title>

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
            <li class="active"><a href="">Admin</a></li>
            
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
           
                <!--search bar-->
              </ul>
            
          
            <ul class="nav navbar-nav navbar-right">
              
              <li><a class="glyphicon glyphicon-log-out" href="admin_logout.php"></a></li>
            </ul>
          

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
       
      
        <h1 style="color:#fff; ">WELCOME ADMIN!!!</h1><br>

      <p><a class="btn btn-warning btn-lg" style="color:#fff" href="addbook.php" role="button">Add Book</a></p>
      <p><a class="btn btn-warning btn-lg" style="color:#fff" href="deletebook.php" role="button">Delete Book</a></p>
      <p><a class="btn btn-warning btn-lg" style="color:#fff" href="viewusers.php" role="button">View User Details</a></p>
      
        
    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
       
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>




