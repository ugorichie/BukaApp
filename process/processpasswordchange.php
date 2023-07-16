<?php
    session_start();
    require_once("../class/User.php");
    if($_POST){

            if(isset($_POST["changepassword"])){

                $oldpassword = $_POST["oldpassword"];

                $newpassword = $_POST["newpassword"];

                $user_id = $_SESSION["user_id"];

                //HASH THE NEW PASSWORD BEFORE SENDING IT TO THE METHOD
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

                if(empty($oldpassword) || empty($newpassword)){
                    echo "all fields are reqiured";
                    exit();
                }
            }


            $userone = new User();
            $result = $userone-> updatePassword ($user_id, $oldpassword, $newpassword );


            if($result == 1){
                    echo" password successfully updated";
                    exit();
            }else{
                echo $result;
            }






    }




?>