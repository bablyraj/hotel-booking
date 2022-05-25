<?php 
session_start();
error_reporting(1);
if($_SESSION['create_account_logged_in']!="")
{
header('location:Booking Form.php');
}
error_reporting(1);
require('connection.php');
extract($_REQUEST);
if(isset($login))
{
  if($eid=="" || $pass=="")
  {
  $error= "<h4 style='color:red'>fill all details</h4>";  
  }   
  else
  {
  $sql=mysqli_query($con,"select * from create_account where email='$eid' && password='$pass' ");
    if(mysqli_num_rows($sql))
    {
    $_SESSION['create_account_logged_in']=$eid;  
    header('location:index.php'); 
    }
    else
    {
    $error= "<h4 style='color:red'>Invalid login details</h4>"; 
    } 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gobooc</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/login.css"rel="stylesheet"/>
</head>
  <body>
    <div class="login">
      <div class="image">
        <img src="logo/logo.png" alt="gobooc.."/>
      </div>
      <h1>Login</h1>
      <div class="signup">
        <p>Don't have an account?</p>
        <p><a href="Registation form.php">SIGN UP</a></p>
      </div>
      <?php echo @$error; ?>
      <form method="post"><br>
        <input type="email" name="eid" placeholder="Email id" required="required" autocomplete="off" />
        <input type="password" name="pass" placeholder="Password" required="required" autocomplete="off" />
        <input type="submit" value="Let me in." name="login" class="btn" />
      </form>
    </div>
  </body>
</html>
