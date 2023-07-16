<?php

    require_once("../class/User.php");
    if($_POST){

        if(isset($_POST["register"])){

            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
            $intro = $_POST["intro"];

            //VALIDATE EMPTY FIELDS
            if(empty($fullname) || empty($email) || empty($password) || empty($intro)){

                echo "all fields are required";
                exit();
            }

            //VALIDATE PASSWORD LENGTH
            if(strlen($password) < 8){
                echo "password must be more than 8 characters";
            }

            //VALIATE PASSWORD AND CONFIRM PASSWORD 
            if($password !== $confirmpassword){
                echo " Password and confirm password must be the same ";
                exit();
            }

            //encrypt the password ,to make it more secure.
            $password = password_hash($password, PASSWORD_DEFAULT);

            //here we are instantiaing the  class and calling the method;
            $userOne = new User();
            $userOne -> registerUser($fullname, $email , $password , $intro);
           

           

        }


    }




