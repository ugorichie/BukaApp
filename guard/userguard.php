<?php
    //THIS FILE WOULD CHECK IF A USER IS NOT LOGGED IN AND IT RIDEIRECTS HIM TO THE LOGIN PAGE;

     if(!isset($_SESSION["user_id"])){
        header("location: login.php");
        exit();
     }