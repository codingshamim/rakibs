<?php
error_reporting(0);
   session_start();
   $userId = $_SESSION['uniqueId'];
if($userId){
  header("location:index.php");
}
@include "php/register.php";

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


<?php 
              if($succ){

           
              
              ?>
            <div class="alert alert-success" role="alert">
            <?php echo $succMsg ?> <a href="login.php">Click Here</a>
          </div>
          <?php 
            }
          ?>
              <h3>Create an account</h3>
              <p class="font-md color-gray-500">Access to all features. No credit card required.</p>
              <form action="register.php" method="post">
              <div class="form-register mt-30 mb-30">
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Full Name *</label>
                  <input name="fName" class="form-control" type="text" placeholder="Write Your Full Name" required>
                </div>
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Email *</label>
                  <input name="email" class="form-control" type="text" placeholder="Write Your Email Address" required>
                </div>
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Phone Number *</label>
                  <input name="phoneNb" class="form-control" type="text" placeholder="Write Your Phone Number" required>
                </div>
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Password *</label>
                  <input name="pass" class="form-control" type="password" placeholder="Write Your Password" required>
                </div>
                <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Re-Password *</label>
                  <input name="repass" class="form-control" type="password" placeholder="Re-Password" required>
                </div>
               
                <div class="form-group">
                  <input name="signup" class="font-md-bold btn btn-buy" type="submit" value="Sign Up">
                </div>
                <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Already have an account?</span><a class="font-xs color-brand-3 font-medium" href="login.php"> Sign In</a></div>
              </div>
              </form>
            </div>
          
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
    </main><?php
@include "php/site/footer.php";

?>