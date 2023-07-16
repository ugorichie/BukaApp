<?php
require_once("partials/header.php");
//require_once("../guard/usergaurd.php"); // USE TO GUARD PAGES THAT ALLOW ONLY USERS.
//session_start();
?>
<div class="container">
    
    <div class="row">
         <!-- <div class="col-md-3 mb-4">
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
            <span><b> <?php echo $_SESSION["user_fullname"]?></b></span>
            <span><i>Member Since Jan 20th , 2023</i></span>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div> -->
  <?php
  require_once("partials/sidebar.php");
  ?>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Welcome <?php echo $usert["user_fullname"] ?></h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <p>You can use the navigation at the top of the page to move around the site and the navigations below to carry out tasks on the platform</p>
       <p><a href=" editprofile.php">Edit My Profile</a></p>
        <p><a href="changepassword.php">Change Password</a></p>
         <!-- <p><a href="">Logout</a></p> -->

         <?php
        require_once("partials/logoutform.php");

        ?>

      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>