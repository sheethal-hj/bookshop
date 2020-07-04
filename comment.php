<?php
session_start();
?>

<!DOCTYPE HTML>  
<html>
<head>
<title>Comment</title>
<style>
  
.error {color: #FF0000;}
</style>
<link href="css/style.css" rel="stylesheet">
</head>
<body>  

<?php

include("connect.php");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


// define variables and set to empty values
$param_name = $nameErr = $emailErr = "";
$name = $email = $feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  $feedback = $_POST["feedback"];
  



if(empty($nameErr) && empty($emailErr))
            {
                $sql = "INSERT INTO feedback(name,email,feedback) VALUES(?,?,?)";
                if($stmt = mysqli_prepare($link, $sql))
             {
            // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_feedback);
            
            // Set parameters
                    $param_name = $name;
                    $param_email = $email;
                    $param_feedback = $feedback;
                    
            
            // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    echo "Feedback recorded";
                        header("location: index.php");
                    }
                    else{
                        echo "Something went wrong. Please try again later.";
                         }   

                } 
            }  
            
}     


?>


<div class="reg_form" style="text-align:center;">
<h1 style="color:#fff; text-shadow: 2px 2px 5px cornsilk;">COMMENT:</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="">  
<h3 style="color:#fff;">NAME:</h3> <br> <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <h3 style="color:#fff;">EMAIL:</h3><br> <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  <h3 style="color:#fff;">COMMENT:</h3><br>
  <input type="text" name="feedback"><br>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>
</div>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>

    <p style="text-align:center;"><a class="btn btn-default" href="index.php" role="button">Back &raquo;</a></p>

</body>
</html>
