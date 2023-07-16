<?php
    session_start();
    require_once("../class/User.php");

if($_POST){

    if(isset($_POST["updateprof"])){

        $user_id = $_SESSION["user_id"];

        $fullname = $_POST["fullname"];

        $intro = $_POST["intro"];

        $User1 = new User();
       $response= $User1-> updateProfile($user_id, $fullname, $intro);

       if($response){
        echo "act good";
       }


    }else{
        echo" unsuccessfull act";
    }




}