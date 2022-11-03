
<?php

$showalert=false;
$showaerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
include 'partials/dbconnect.php';
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$exists=false;

//check whether this username exists
$existsql="SELECT * FROM `sgp` WHERE firstname='$username'";
$result=mysqli_query($conn,$existsql);
$numExistrow=mysqli_num_rows($result);

$existsql1="SELECT * FROM `sgp` WHERE email='$email'";
$result1=mysqli_query($conn,$existsql1);
$numExistrow1=mysqli_num_rows($result1);

if($numExistrow1>0)
{
    $showaerror=$email."you already use please enter unother";
}
else if($numExistrow>0)
{
    $showaerror=$username." username assign unother person enter diffrent user name";
}
else
{
    $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `sgp` ( `firstname`, `email`, `password`) VALUES ( '$username', '$email', '$hash')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $showalert=true;

        }
}
   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>signup</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <h1 data-text="Charusat Resource Tracker">Charusat Resource Tracker</h1>
    <p class="img">
        <img src="l2.jpg" style="border-width:0px;width: 400px; height: 450px;">
    </p>
    <div class="box">
        <div class="form">
        <?php
            if($showalert)
            {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Your account noe created and you can login
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if($showaerror)
            {
            echo ' <div class="alert alert-alert alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '.$showaerror.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

        ?>
            <h2>Sign up</h2>
            <form action="/sgp-2/signup.php" method="post">
                    <div class="inputbox">
                        <input type="text"  maxlength="11" required="required" name="username" id="username">
                        <span>Firstname & Lastname</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input type="text" required="required"  name="email" id="email">
                        <span>E-mail</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input type="password" required="required" maxlength="15" name="password" id="password">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <button  type="submit" class="btn">Signup</button></a>
                    
                    <a href="login1.php" style="text-decoration:none" type="submit" class="btn">Login</a> 
                </form>
        </div>
    </div>
</body>

</html>