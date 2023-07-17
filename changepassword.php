<?php
session_start();
require_once("partials/header.php");
//require_once("guard/usergaurd.php"); // USE TO GUARD PAGES THAT ALLOW ONLY USERS.
?>
<div class="container">
    
    <div class="row">
         <!-- <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body">
       <div class="row cast">
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
            <span><b> <?php echo $_SESSION["user_fullname"] ?></b></span>
            <span><i>Member Since Jan 20th , 2023</i></span>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div> -->
    <!-- THE SIDE BAR STARTS HERE (IT WAS REQUIRED FROM PARTIALS) -->
  <?php
    require_once("partials/sidebar.php");
  ?>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Welcome <?php echo $_SESSION["user_fullname"] ?> !</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <h2 class="text-center">Change Password</h2>
       <form action="process/processpasswordchange.php" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Old Password</label>
                <input type="password" name="oldpassword" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password"  name="newpassword" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="changepassword" class="btn btn-danger">Change Password</button>
       </form>
       
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>