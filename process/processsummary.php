<?php
    session_start();
    require_once("../class/summary.php");
if($_POST){

    if(isset($_POST["summarybtn"])){
        $user_id = $_SESSION["user_id"];
        $book_id = $_POST["book_id"];
        $sum_content = $_POST["sum_content"];

        if(empty($sum_content)){
            $_SESSION["sum_form_error"] = "summary fields is required";
            header("location:../bookdetail.php?id=$book_id");
            exit();
        }

        $sum1 = new Summary();
       $result =  $sum1->insertSummary($sum_content, $user_id, $book_id);

    if($result){
        header("location:../bookdetail.php?id=$book_id");
        exit();
    }



    }





}