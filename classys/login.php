
<?php
error_reporting(0);
   session_start();
   $userId = $_SESSION['uniqueId'];
if($userId){
  header("location:index.php");
}
include "php/conn.php";
    if(isset($_POST['signIN'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

        $selUser = "SELECT * FROM `users` WHERE email = '$email'  AND pass = '$pass'";
        $userQuery = mysqli_query($conn,$selUser);
        // check users 
        $check = mysqli_num_rows($userQuery);
        if($check>0){
            $users = mysqli_fetch_assoc($userQuery);
         
            $_SESSION['uniqueId'] = $users['uniqueId'];
          
            header("location:index.php");
        }else{
            $err = true;
            $errMsg = "Invalid Login Details";
        }
    }


?>

<?php
@include "php/site/header.php";


?>


    <main class="main">
      <section class="section-box shop-template mt-60">
        <div class="container">
          <div class="row mb-100">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
            <?php 
              if($err){

           
              
              ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $errMsg ?>
          </div>
          <?php 
            }
          ?>

              <h3>Member Login</h3>
              <p class="font-md color-gray-500">Welcome back!</p>
              <form action="login.php" method="post">
              <div class="form-register mt-30 mb-30">
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Email  *</label>
                  <input name="email" class="form-control" type="text" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Password *</label>
                  <input name="pass" class="form-control" type="password" placeholder="******************">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                   
                  </div>
                  <div class="col-lg-6 text-end">
                    <div class="form-group"><a class="font-xs color-gray-500" href="#">Forgot your password?</a></div>
                  </div>
                </div>
                <div class="form-group">
                  <input name="signIN" class="font-md-bold btn btn-buy" type="submit" value="Sign In">
                </div>
                <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Have not an account?</span><a class="font-xs color-brand-3 font-medium" href="register.php">Sign Up</a></div>
              </div>
              </form>
            </div>
            <div class="col-lg-5"></div>
          </div>
        </div>
      </section>
      <section class="section-box box-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-12">
              <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
              <p class="font-lg color-white">Get E-mail updates about our latest shop and <span class="font-lg-bold">special offers.</span></p>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
              <div class="box-form-newsletter mt-15">
                <form class="form-newsletter">
                  <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
                  <button class="btn btn-brand-2">Sign Up</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    
    
    
    
    
    
    
    
    
    <?php
@include "php/site/footer.php";

?>