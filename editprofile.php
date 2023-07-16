<?php
require_once("partials/header.php");

require_once("class/User.php");
  
    $user_id = $_SESSION["user_id"];

    $userOne = new User();
    $usert = $userOne->getUserDetails($user_id);
    //echo $usert["user_fullname"];
//require_once("guard/usergaurd.php");  USE TO GUARD PAGES THAT ALLOW ONLY USERS.
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
            <span><b>Oluwaseun Ibukun</b></span>
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
        <h5 class="mb-0">Welcome <?php echo $usert["user_fullname"]?></h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <h2 class="text-center">Edit Password</h2>
       <form action=" process/processupdateprofile.php" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">FullName</label>
                <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp" value="<?php echo $usert["user_fullname"]?>">
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">User Intro</label>
                <textarea class="form-control" name="intro" id="exampleFormControlTextarea1" rows="3"><?php echo $usert["user_Intro"]?>
                </textarea>
            </div>
            <button type="submit" name="updateprof" class="btn btn-danger">Update Profile</button>
       </form>
       
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>