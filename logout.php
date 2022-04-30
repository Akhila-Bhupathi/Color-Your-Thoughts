<?php
    session_start();
    session_unset();
    session_destroy();
     if(!empty($_COOKIE)){
        foreach($_COOKIE as $name=>$value){
            setcookie($name,$value,time()-1);
        }
    }  
    echo "<script>alert('You have been successfully logged out.');
    window.location.replace('http://localhost/projects/web%20lab%20website/index.php');
            </script>";
?>