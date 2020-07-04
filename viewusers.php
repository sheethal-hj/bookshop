<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron/">

    <title>View_User_Details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">


    
    
  </head>

  <body style="background-color:cornsilk" >

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BookShop</a>
        </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->

    
      
    <div class="jumbotron">
      <div class="container">
        
        <h2 style="text-align: center;text-shadow: cornsilk;"><span style="color:#fff;">USER DETAILS  </span><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h
    
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      
        <div class="col-md-4">
        <?php

include("connect.php");



$sql = "SELECT * FROM user";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. "<br>". " Name: " . $row["name"]. " " ." <br> "."Email: ". $row["email"]. "<br><br>";
  }
} else {
  echo "0 results";
}




?>

       </div>
        

       <footer>
           
        <a class="btn btn-default" href="admin_main.php" role="button" style="margin-left:1050px;">Back &raquo;</a>
       </footer>

     


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
