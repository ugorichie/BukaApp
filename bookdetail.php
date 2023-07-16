<?php
//session_start();
require_once("partials/header.php");
require_once("class/Book.php");
require_once("class/Book.php");

// $bk = new Book();
// echo"<pre>";
// print_r ($books = $bk->fetchBook());
// echo"</pre>";

if(isset($_GET["id"])){
    $book_id = $_GET["id"];
    $bk = new Book;
    $books = $bk->getBookCategory($book_id);
    // echo "<pre>";
    // print_r ($books);
    // echo "</pre>";
}else{
    header("location: index.php");
}
?>
<div class="row mx-5">
<h2 class="mx-4 my-1"> BOOK DETAIL</h2>
</div>

<div class="row d-flex justify-contents-center my-4">
    
<div class="col-md-6 text-center ">

<h1 class="text-secondary"> Title: <?php  echo $books ["bk_title"] ; ?> <button type="button" class="btn btn-primary">
  number of book <span class="badge text-bg-danger">1</span>
</button></h1>

<h2>Category: <?php  echo $books ["cat_title"]; ?>  </h2>
<h3>Author: <?php  echo $books ["bk_author"];  ?>  </h3>
<h3>Publisher: <?php  echo $books ["bk_publisher"] ; ?> </h3>

</div>

 <div class="col-md-6 ">
    <h2 class="text-center text-muted"> Add summary for the book </h2>

    <?php
        if(isset($_SESSION["user_id"])){

      ?>

    <form action="process/processsummary.php" method="post">

            <?php
                if(isset($_SESSION["sum_form_error"])){
                    echo "<p class='text-danger'>". $_SESSION['sum_form_error'] ."</p>";
                    unset ($_SESSION["sum_form_error"]);
                }


            ?>

     <input type="hidden" name="book_id" value=" <?php echo $books["bk_id"];  ?>">

        <div class="form-floating">
        <textarea name="sum_content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
        </div>


     <input type="submit" value="ADD SUMMARY" name="summarybtn" class="btn btn-primary">

    </form>

    <?php
        }
    ?>

 </div>



</div>




<?php
require_once("partials/footer.php");
?>