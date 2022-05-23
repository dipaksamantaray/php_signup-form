<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Signup</title>
    <?php include "link.php" ?>
    <link rel ="stylesheet" href = "style.css"/>
</head>
<body>


    <div class="content">
    <h1>Create Account</h1>
        <p>Get started with your free account </p>
        
    <div class="main-content">
        
        
        <input class="btn1" type="button"  name="Login" value="Login via Gmail"/>
       <span class ="social"><i class="fa-solid fa-g"></i></span>

</br>
       <input class="btn2" type="button"  name="facebbok" value="Login via Facebook"/>
       <span class ="social"><i class="fa-brands fa-facebook-f"></i></span>
       </div> 
<div class="content-hr">
       <h2><span>OR</span></h2>

</div>
<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
<div class="center">
<i class="fa-solid fa-user"></i><input type ="text" name="user" placeholder = "enter your name" required/></br>
<i class="fa-solid fa-envelope"></i></i><input type ="email" name="email" placeholder = "enter your email" required/></br>
<i class="fa-solid fa-phone"></i><input type ="num" name="phone" placeholder = "enter your mobile number" required/></br>
<i class="fa-solid fa-lock"></i><input type ="password" name="password" placeholder = "enter password" required/></br>
<i class="fa-solid fa-lock"></i><input type ="password" name="confirmpassword" placeholder = "enter confirm password" required/></br>
<input class ="submit" type ="submit" name="submit" value="create an account"/></br>

</div>
</form>
<p>Have an account?<span><a href = "login.php"> Login</a></span></p>
</div>
</body>
</html>


<?php
include "connection.php";
if(isset($_POST["submit"])){
    $name= mysqli_real_escape_string($con, $_POST["user"]);
    $email=mysqli_real_escape_string($con, $_POST["email"]);
    $num= mysqli_real_escape_string ($con, $_POST["phone"]);
    $password= mysqli_real_escape_string($con, $_POST["password"]);
    $confirmpassword= mysqli_real_escape_string ($con, $_POST["confirmpassword"]);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword , PASSWORD_BCRYPT);
    $emailquery = "select * from social where email = '$email'";
    $query = mysqli_query($con,$emailquery);
    
    $emailCount = mysqli_num_rows($query);

    if($emailCount > 0){
echo "email already exsits";
    }else{
        if($password == $confirmpassword){
        $insert = "insert into social(name, email, mobile, password, confirmpassword) values('$name','$email','$num','$pass','$cpass')";

            $iquery = mysqli_query($con,$insert);

            if($iquery){
                ?>
                <script>
                    alert("inserted sucessful");
                    </script>
                <?php
            }else{
                ?>
                <script>
                    alert("not inserted");
                    </script>
                <?php
            }
            

        }else{
            echo "password mismatch";
        }
    }
}


?>
