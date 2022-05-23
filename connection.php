<?php
$server="localhost";
$user="root";
$pass="";
$db="signup";
$con = mysqli_connect($server,$user,$pass,$db);
if($con){
    ?>
    <script>
        alert("connection sucessful");
        </script>
    <?php
}else{
    ?>
    <script>
        alert("not connected");
        </script>
    <?php
}






?>