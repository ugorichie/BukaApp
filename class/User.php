 
 <?php
    // session_start();
    require_once("Db.php");

    class User extends Db{

        public function registerUser($fullname, $email, $password, $intro){

            //first you check if the email is in the database
            $sql = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this-> connect() -> prepare ($sql);
            $stmt->execute([$email]);

            // Do a rowcount()on the data base, if rowcount is 1, means the email is already in use.
            $stmt->rowCount();
            $numUsers = $stmt->rowCount();
            
            if($numUsers > 0){
                echo " Email already in use ";
                exit();
            }


            // INSERTION  METHOD STARTS HERE!
            $sql = "INSERT INTO users( user_fullname, user_email, user_password, user_intro) VALUES (?,?,?,?)";

            $stmt = $this->connect()->prepare($sql);

            //$stmt->execute($fullname, $email, $password, $intro);

          $user = $stmt->execute([$fullname, $email, $password, $intro]);

          if($user){
                echo "user created already";
          }else{
                echo "unable to create";
          }


        }


        public function loginUser($email, $password){
            //check if the email is in the database when user wants to log in
            $sql = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this-> connect() -> prepare ($sql);
            $stmt->execute([$email]);
            // Do a rowcount()on the data base, if rowcount is less than 1, means the email is not there, so echo to the user on line 51
            $stmt->rowCount();
            $numUsers = $stmt->rowCount();
            
            if($numUsers < 1){
                echo " Either username or pass wordword is incorrect ";
                exit();
            }

            //fetch the associative array of the user
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $user["user_password"];
            //since we need only the password, get password of the user
           // this is how to get the password from the database, from the array -  $user["user_password"]

             password_verify($password, $user["user_password"]);

             if(password_verify($password, $user["user_password"])){
                session_start();
                //if the password is correct, we want to store all thier details in a $_SESSION. this would help me store in the server and easy for me to display on thier profile / dashboard when i want to show their details

            $_SESSION["user_id"] = $user["user_id"];
            // $_SESSION["user_fullname"] = $user["user_fullname"];
            // $_SESSION["user_email"] = $user["user_email"];
            // $_SESSION["user_Intro"] = $user["user_Intro"];
            // $_SESSION["user_dp"] = $user["user_dp"];
            $_SESSION["user_role"] = $user["user_role"];
            // $_SESSION["user_created"] = $user["user_created"];

            if($user["user_role"] === "user"){
                header("location: ../profile.php");
            }else if($user["user_role"] === "admin"){
                header("location: ../admin_profile.php");
                exit();
            }else{
                session_destroy();
                header("location: ../register.php");
                exit();
            }
                exit();
             }else{
                echo "password is incorrect";
             }
        }

        // updating users password
        public function updatePassword($user_id , $oldpassword , $newpassword){
            $sql = "SELECT * FROM users WHERE user_id= ?";
            $stmt = $this-> connect() -> prepare ($sql);
            $stmt->execute([$user_id]);
            $user =$stmt-> fetch(PDO:: FETCH_ASSOC);

            //CHECKING IF PASSWORD PROVIDED MATCHES THE PASSWORD STORED IN THE DATABASE
            if(password_verify($oldpassword, $user["user_password"])){
                $sql = "UPDATE users SET user_password = ? WHERE user_id =  ?";
                $stmt = $this->connect() -> prepare($sql);
                $updatedUser =  $stmt -> execute ([$newpassword, $user_id]);
                return $updatedUser;
            }

            echo "old password is not correct please try again";


        }


       
        //Method to fetch user datails using the ID
        public function getUserDetails($user_id){
            $sql = "SELECT * FROM users WHERE user_id = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user_id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;



        }


        //THIS IS METHOD TO EDIT PROFILE
        public function updateProfile($user_id, $user_fullname, $user_Intro){
        $sql = " UPDATE users SET user_fullname = ?, user_Intro = ? WHERE user_id=? ";
        $stmt = $this->connect()->prepare($sql);
        $response = $stmt->execute([$user_id, $user_fullname, $user_Intro]);
        return $response;
        }


        //careful this is where the class ends its bracket
    }

    //to check if the method would work, instantiate the class and input 
    // $userOne = new User();
    // echo("<pre>");
    // print_r ($userOne->getUserDetails(12));
    // echo("</pre>");









?>
