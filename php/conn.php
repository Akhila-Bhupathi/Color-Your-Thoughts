<?php

$con=mysqli_connect("localhost","root","","painting_website");
if(!$con){
    header('location:error.php');

}

?>