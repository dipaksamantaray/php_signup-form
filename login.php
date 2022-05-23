<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "link.php"?>
  
    <link rel ="stylesheet" href = "style.css"/>
    <title>Login</title>
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
<i class="fa-solid fa-user"></i><input type ="email" name="email" placeholder = "Full name" required/></br>
<i class="fa-solid fa-lock"></i><input type ="password" name="password" placeholder = "Create password" required/></br>
<input class ="submit" type ="submit" name="submit" value="create an account"/></br>

</div>
</form>
<p>Not have an account ? <span><a href = "registration.php"> signup here</a></span></p>
</div>
</body>
</html>

<?php

include "connection.php";

if(isset($_POST["submit"])){
    $email= $_POST["email"]; 
    $password= $_POST["password"];

    $email_search = "select * from social where email = '$email'";
    $query = mysqli_query($con,$email_search);
  
    $email_count = mysqli_num_rows($query);


    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass ["password"];

$_SESSION["name"] = $email_pass ["name"];

        $pass_decode = password_verify($password,$db_pass);
        
        if($pass_decode){ 
            echo"log in sucessful";
           ?>
           <script>
               location.replace("home.php");
               </script>
           <?php
        }else{
            echo "password incorrect";
        }
        }else{
        
            echo "invalid email";
       
    }

}

?>