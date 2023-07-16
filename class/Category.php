<?php


    require_once("Db.php");

    class Category extends Db{


    //method to fecth all categories

    public function fetchAllCategories(){
        $sql = "SELECT * FROM category";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $categories = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $categories;

    }


 }

//  $categoryone  = new Category();
// print_r( $categoryone -> fetchAllCategories());
 