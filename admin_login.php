<?php
include ("connect.php");
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    header("location:admin_main.php");
    exit;
}
$error="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "select username,password from admin where username='$username' and password='$password' ";
    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result)>0){
        
        session_start();
        $_SESSION["loggedin"]=true;
        header("location:admin_main.php");
    }
    else{
        $error="Usernaame or password is incorrect.";
    }
    
  }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="css/style.css" rel="stylesheet">

</head>
<body style=" background-color:cornsilk;" >
<body>

<h1 style="text-align:center;color:#fff"> LOGIN</h1>
<div align="center">
 <div class="form">


<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
<div >
<label >USERNAME:</label>
<input type="text" name="username" required>
<br><br>

</div>
<br><br>
<label >PASSWORD:</label>
<input type="password" name="password" required ><br> <br>

<input type="submit" value="Submit">
<br>
<p><?php echo $error ?></p>

</form>
</div>
</div>

<p style="text-align:center;"><a class="btn btn-default" href="index.php" role="button">Back &raquo;</a></p>


</body>
</html>


