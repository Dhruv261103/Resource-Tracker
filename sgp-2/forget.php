<?php
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
include 'partials/dbconnect.php';
$email=$_POST["email"];
$newpassword=$_POST["newpassword"];
$cpassword=$_POST["cpassword"];

$sql1="SELECT * FROM `sgp` WHERE `email`='$email'";
$result1=mysqli_query($conn,$sql1);
$num=mysqli_num_rows($result1);
if($num>0)
{
    if($newpassword==$cpassword)
    {
        $hash=password_hash($newpassword,PASSWORD_DEFAULT);
    $sql="UPDATE `sgp` SET `password`='$hash' WHERE `email`='$email'";
    $result=mysqli_query($conn,$sql);
    $showerror="password change successfully";
    }
    else
    {
        $showerror="please enter correct password";
    }
    

}
else
{
    $showerror="please enter valid email";
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>forget password</title>
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
           
           if($showerror)
           {
           echo ' <div class="alert alert-alert alert-dismissible fade show" role="alert">
                   <strong>'.$showerror.'</strong> 
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
           }

   ?>
            <h2>Forget Password</h2>
            <form action="/sgp-2/forget.php" method="post">
                    <div class="inputbox">
                        <input type="text" required="required" name="email" id="email">
                        <span>E mail</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input type="password" required="required" name="newpassword" id="newpassword">
                        <span>New Password</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input type="password" required="required" name="cpassword" id="cpassword">
                        <span>Confirm Password</span>
                        <i></i>
                    </div>
                    <button  type="submit" class="btn">Update</button></a>
                    <a href="login1.php" style="text-decoration:none" type="submit" class="btn">Login</a>
            </form>
        </div>
    </div>
</body>

</html>