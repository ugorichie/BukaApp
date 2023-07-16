<?php


if(!isset($_SESSION["user_id"])){
    header("loocation: login.php");
    exit();
}else if($_SESSION["user_role" ] != "admin"){
    header("location:profile.php");
    exit();
}else{
    header("location:index.php");
    exit();
}

//once your (ugo) admin starts working, you need to include this in every of the page of the admin
// such as ADMIN_ADDBOOK  ADMIN_BOOKLIST ADMIN_PROFILE ADMIN_USERLIST 