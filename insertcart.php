<?php
include ("connect.php");
session_start();
$name = $_POST["name"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$email =  $_SESSION["email"];
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    $sql = "INSERT INTO `cart`(`bookname`, `quantity`, `price`, `email`)
    VALUES ('$name','$quantity','$price','$email')";
    
     $result = mysqli_query($link,$sql);
     if($result==true){
         header("location:index.php");
     } 
}
else{
    echo '<script>alert("please log in");</script>';
    echo '<script>window.location="index.php"</script>';
    
}






?>