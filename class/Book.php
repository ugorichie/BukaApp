<?php
require_once("Db.php");
class Book extends Db{


    public function insertBook( $bk_title, $bk_category_id, $bk_author, $bk_publisher, $bk_description, $bk_cover_image, $bk_published_year ){

$sql = "INSERT INTO books (bk_title, bk_category_id, bk_author, bk_publisher, bk_description, bk_cover_image, bk_published_year) VALUES (?,?,?,?,?,?,?)";
$stmt = $this -> connect() -> prepare($sql);
$bookcreated = $stmt -> execute([$bk_title, $bk_category_id, $bk_author, $bk_publisher, $bk_description,$bk_cover_image, $bk_published_year]);

if($bookcreated ){
    header("location: ../admin_booklist.php");
    return "Book Successfully Added";
    exit();
}else{
    return "Error: book not added to database";
    exit();
}


}


public function fetchBook(){
    $sql = "SELECT * FROM books ORDER BY Bk_id";
    $stmt = $this->connect() -> prepare($sql);
    $stmt-> execute();
    $books = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $books;

}



//GET DETAIL OF A BOOK
public function getBookCategory($book_id){
    $sql = "SELECT * FROM books INNER JOIN category on books.bk_category_id = category.cat_id WHERE books.bk_id = ?";
    $stmt = $this -> connect() -> prepare($sql);
    $stmt->execute([$book_id]);
    $result= $stmt->execute([$book_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



    public function deleteBook($book_id){
        $sql = "DELETE FROM books WHERE bk_id = ?";
        $stmt = $this -> connect()->prepare($sql);
        $bookdeleted = $stmt->execute([$book_id]);
        if($bookdeleted){
            header("location: ../admin_booklst.php");
            exit();

        }
    }








}

// $book1 = new Book();
// $result = $book1 ->fecthBook();
// print_r($result);

$book = new Book();
