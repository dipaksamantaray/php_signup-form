<?php
session_start();
if(!isset($_SESSION["name"])){
    echo "you are logged out";
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>home</title>
    <?php include "link.php"?>
  
    <link rel="stylesheet" href="home.css"/>
</head>
<body>
    <div class="main">
    <div class="header">
        <h2>Dipak Samantaray</h2>

    
        <ul>
            <li>Home</li>
            <li>Gallery</li>
            <li>Service</li>
            <li>Portfolio</li>
            <li>About</li>
</ul>
<div class="btn">
<a href ="logout.php">Logout</a>
</div>
</div>
<div class="center-div">
    <h2>Hello this is <?php echo $_SESSION["name"]; ?> </h2>

<div class="right-side">
    <ul>
<li><i class="fa-brands fa-facebook-f"></i></li>
<li><i class="fa-brands fa-twitter"></i></li>
<li><i class="fa-brands fa-instagram"></i></li>
<li><i class="fa-solid fa-tv"></i>
</ul>
</div>
</div>
</div>
</body>
</html>