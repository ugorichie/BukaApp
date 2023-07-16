<?php
require_once("../class/User.php");

if($_POST){

    if(isset($_POST["login"])){

        
        $email = $_POST["email"];
        $password = $_POST["password"];
       

        //VALIDATE EMPTY FIELDS
        if(empty($email) || empty($password)){

            echo "all fields are required";
            header("location: ../login.php");
            exit();
        }
    $userone = new User();
    $result = $userone -> loginUser($email , $password);
    echo $result;

    }

}

?>