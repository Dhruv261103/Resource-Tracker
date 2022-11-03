<?php

$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
include 'partials/dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];

    //here we run our query for find user name and paswword
    // $sql="Select * from sgp where firstname='$username' AND password='$password'";
    $sql="Select * from sgp where firstname='$username'";

    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);
    if($num==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            
            if(password_verify($password,$row['password']))
            {
                $login=true;
            // if we login successfully then we start our session
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;

            header("location:home.php");
            }
            else
            {
            $showerror="Invalid Credential";
            }   
        }
        
    }
    else
    {
    $showerror="Invalid Credential";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login1.css">
</head>

<body>
    <h1 data-text="Charusat Resource Tracker">Charusat Resource Tracker</h1>
    <p class="img">
        <img src="l2.jpg" style="border-width:0px;width: 400px; height: 450px;">
    </p>
    <div class="box">
        <div class="form">
        <?php
        if($login)
        {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Your account  login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if($showerror)
        {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong Password</strong> '.$showerror.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        ?>
            <h2>Log in</h2>
            <form action="/sgp-2/login1.php" method="post">
                <div class="inputbox">
                    <input type="text" required="required" name="username" id="username">
                    <i class="fa-thin fa-user"></i>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" required="required" name="password" id="password">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="forget.php">Forget Password</a>
                    <a href="signup.php">Sign up</a>
                </div>
                <button type="submit" class="btn">login</button></a>
            </form>
        </div>
    </div>
</body>

</html>