<?php

    //this file checks if a user is logged in and redirect

    

    if(isset($_SESSION["user_id"])){
        header("location: profile.php");
        exit();
     }













?>