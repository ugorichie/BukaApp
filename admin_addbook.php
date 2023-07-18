<?php
require_once("partials/header.php");
require_once("class/Category.php");
$catOne = new Category();
$categories = $catOne -> fetchAllCategories();
// print_r($categories);
?>
<div class="container">
    
    <div class="row">
         <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <img src="assets/images/dp.jpg" class="img-fluid rounded-circle">
            </div>
             <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-block btn-sm">
          Change Picture
        </button>
       </div>
            <hr>
            <div>
            <span><b>Oluwaseun Ibukun</b></span>
            <span><i>Member Since Jan 20th , 2023</i></span>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">New Book details</h5>
      </div>
      <div class="card-body">
        <form action="process/processaddbook.php" method="post" enctype="multipart/form-data">
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="title" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Book Title</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="author" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Book Author</label>
              </div>
            </div>
          </div>


          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="publisher" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Book Publisher</label>
              </div>
            </div>

            <div class="col-6">
              <div class="form-outline">
                <input type="text" name="desc" id="bk_desc" class="form-control" />
                <label class="form-label" for="bk_desc">Book Description</label>
              </div>
            </div>

            <div class="col">
              <div class="form-outline">
                <input type="text" name="year" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Book Year Published</label>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Book Category</label>
            <select class="form-select" aria-label="Default select example" name="category">
              <option>Open this select memu</option>
              
              <?php
                foreach( $categories as $cate){

                ?>

                  <option value="<?php echo $cate["cat_id"] ?>"> <?php echo $cate["cat_title"]?></option>

              <?php
                }
              ?>
              
          
          </select>
                <br>
            
          </div>

          <div class="mb-3">
            <label  class="form-label">Book Cover Image</label>
            <input class="form-control" type="file"  name="cover">
              </div>
          


          <!-- Message input -->
          <div class="form-outline mb-4">
            <button name="addbook" class="btn btn-primary btn-lg">Add Book</button>
          </div>
 
        </form>
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>