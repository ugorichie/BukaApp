<?php
require_once("partials/header.php");
require_once("class/Book.php");

$bk = new Book();
// echo"<pre>";
 ($books = $bk->fetchBook());
//  echo"</pre>";

//fetch proverbs from api
$url = "http://localhost/provab/api/v1/proverb/read.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$result = json_decode($result);


curl_close($curl);

?>

<?php
$url = "https://www.BBC.com";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_exec($curl);
curl_close($curl);


?>
<section class="hero">
  <div class="hero-text-container">
    <h1 class="hero-heading">Welcome to <span>Buka</span></h1>
    <p class="hero-subheading">Share and read about books that changes life and stories</p>
    <a href="register.php" class="btn hero-button  btn-primary">Register</a>
    <a href="login.php" class="btn hero-button  btn-primary">Login</a>
  </div>
  <img class="hero-image" src="assets/images/hero.jpg" alt="Hero Image">
</section>

<section class="latest_books">
<div class="container">
  <div class="row">
      <h1 class="text-center text-primary py-3"> LATEST BOOKS</h1>

      <?php
      foreach($books as $book){
        ?>
        <div class="col-md-4 my-2"> 
        <div class="card" style="width: 18rem;">
          <img src=" <?php echo $book["bk_description"] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $book["bk_title"]?></h5>
            <p class="card-text"><?php echo $book["bk_cover_image"] ?></p>
            <a href="bookdetail.php?id=<?php echo $book['bk_id'];?>" class="btn btn-primary">View Book</a>
          </div>
        </div>
      </div>

      <?php
      }
      ?>
  </div>
</div>

</section>


<!-- <section>

//<?php
//if($result->success){
 // foreach($result->data as $proverb){
 //   ?>


    <h3> <?php // echo $proverb->pro_body ?></h3>

  <?php
 // }
//} -->
?>



<?php
require_once("partials/footer.php");
?>