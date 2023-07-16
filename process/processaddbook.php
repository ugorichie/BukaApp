<?php
    require_once("../class/Book.php");
    if($_POST){

        if(isset($_POST["addbook"])){
            
            $title = $_POST["title"];
            $author = $_POST["author"];
            $publisher = $_POST["publisher"];
            $desc = $_POST["desc"];
            $year = $_POST["year"];
            $category = $_POST["category"];

            print_r($_FILES["cover"]);

           // VALIDATION
            if(empty($title) || empty($author) || empty($publisher) || empty($year) || empty($category)){
                echo "all fields are required.";
            }

            // IMAGE VALIDATION
            $allowed= ["jpeg", "png", "jpg"];
            $file_name = $_FILES["cover"]["name"];
            $file_error = $_FILES["cover"]["error"];
            $temp = $_FILES["cover"]["tmp_name"];

            //this returns the knd of extention(file typr) in which the image is
            $uploaded_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            //condition to check if the extention (file extention ) of the image
            if(!in_array ($uploaded_ext, $allowed)){
                echo "FILE TYPE  NOT ALLOWED";
                exit();
            }
            if($file_error == 0){
                $fileName = "../bookcover/"."buka".time(). "." .$uploaded_ext;

                if(move_uploaded_file($temp, $fileName)){
                    $book1 = new Book();
                    $result = $book1 -> insertBook($title, $category , $author, $publisher, $fileName, $desc, $year);
                    return $result;
                
            }
        
        }
    }

    }