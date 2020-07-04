<?php
include ("connect.php");
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    header("location:index.php");
    exit;
}
$error="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "select email,password from user where email='$email' ";
    $result = mysqli_query($link,$sql);
    $res = mysqli_fetch_array($result);
    $hash = $res['password'];
    if(mysqli_num_rows($result)>0){
        
        if(password_verify($password,$hash)){
        session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION["email"] = $email;
        header("location:index.php");
        }
    }
    else{
        $error="Username or password is incorrect.";
    }
    
  }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>



<div align="center">

 <div class="form">
 <h1 style="text-align:center"> LOGIN</h1>
<form aligin="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
<div class="form-group">
<label >Email:</label>
<input class="form-control" type="email" name="email" required>

</div>

<div class="form-group">
<label >Password:</label>
<input class="form-control" type="password" name="password" required ><br> <br>
</div>
<input class="form-control btn-primary"  type="submit" value="Submit">


<p><?php echo $error ?></p>

</form>

</div>
</div>
<p style="text-align:center;"><a class="btn btn-default" href="index.php" role="button">Back &raquo;</a></p>

</body>
</html>