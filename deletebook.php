<?php

include("connect.php");


$sql = "SELECT `categoryname` FROM `category`";
$result = mysqli_query($link,$sql);
$msg = "";
$err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    

    $sql = "DELETE FROM book WHERE name='$name'";

if (mysqli_query($link, $sql)) {
  echo "Book deleted successfully";
} else {
  echo "Error deleting record";
}


}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">

    <title>deleteBook</title>
    <style>
         .wrapper{
           margin-left :400px;
           width: 350px;
           padding: 20px; }
         
    </style>
</head>
<style>
body {
  background-image: url(images/web-1012467_1920.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body style="background-color:cornsilk" >
<body>
<h1 style="text-align:center;color:#fff";>REMOVE BOOK</h1>
<div class="container">
<div class="wrapper">
     <?php echo $err; ?> 
    
    <form  method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label style="color:#fff" for="">NAME:</label>
    <input class="form-control" type="text" name="name" id="" required>
    <div>
    <div class="form-group">
    <label style="color:#fff" for="">CATEGORY:</label>
    <select name="category" class="form-control">
        <?php
        while($row = mysqli_fetch_assoc($result)){
         $cat_name = $row["categoryname"];
            echo "<option value='$cat_name'> $cat_name </option>";
        }
        ?>
    </select>
    <div>
    <div class="form-group">
    <label  style="color:#fff" for="">AUTHOR:</label>
    <input class="form-control" type="text" name="author" id="" >
    
    <div>
    <div class="form-group">
    <br>
         <input  class="btn btn-primary" type="submit" value="delete"> 
         <input  class="btn btn-primary" type="reset" value="Reset">
         <br><br>
         <p><a class="btn btn-default" href="admin_main.php" role="button">Back &raquo;</a></p>
    <div>
</div>
</div>
<?php echo "<script type='text/javascript'>alert('$msg');</script>"; ?>
</form>





<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
</body>
</html>