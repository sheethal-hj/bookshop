<?php

include("connect.php");

$name = $email = $password = $con_pass="";
$emai_err= $password_err= $con_pass_err="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 //taking the input from the post req   
$name = $_POST["name"];
$email = $_POST["email"];

//checking if email field ids checked
   if(isset($_POST["email"])){
         $sql ="SELECT id FROM `user` WHERE email='$email'";//query to check if email exits
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)>0){ //
            $emai_err = "Email already exist";
        }
        else{ 
            // if does not exit 
            if(strlen(trim($_POST["password"]))<6){ //checking wheatrher password is 
                $password_err = "Password must have atleast 6 charecters.";
            }
            else{
                $password = $_POST["password"];
            }
            
            $con_pass = $_POST["con_pass"];
            if($password != $con_pass){ // checking password matches or not
                $con_pass_err = "Password did not match";
            }
       
    
            if(empty($emai_err) && empty($password_err) && empty($con_pass_err))
            {
                $sql = "INSERT INTO user(name,email,password) VALUES(?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password);
            
            // Set parameters
                    $param_username = $name;
                    $param_email = $email;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    echo '<script>alert("registered successfully!!");</script>';
                    echo '<script>window.location="user_login.php"</script>';
                    }
                    else{
                        echo "Something went wrong. Please try again later.";
                         }   

                } 
            }       
        }
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body style="background-color:cornsilk" >
<style>
body {
  background-image: url(images/web-1012467_1920.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>


<body>
<h1 style="text-align:center;color:#fff";>SIGN UP</h1>
    <div align="center">
    <form method="POST">
    <label style="color:#fff">NAME:</label>
    <input type="text" name="name" required>
    <br><br>
    <label style="color:#fff">EMAIL:</label>
    <input type="email" name="email" id="" required>
    <br><br>
    <span><?php echo $emai_err; ?></span>
    <br><br>
    <label style="color:#fff">PASSWORD:</label>
    <input type="password" name="password" id="" required>
    <br><br>
    <span><?php echo $password_err; ?></span>
    <br><br>
<label style="color:#fff" for="">CONFIRM PASSWORD:</label>
    <input type="password" name="con_pass" id="" required>
    <br><br>
    <span><?php echo $con_pass_err;?></span>
    <br><br>
    <input type="submit" value="Sumit">
    </form>
    <p style="text-align:center;"><a class="btn btn-default" href="index.php" role="button">Back &raquo;</a></p>

    </div>

    <script>



</body>
</html>

