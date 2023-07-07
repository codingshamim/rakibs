<?php include "../php/admin/header.php"; ?>
<?php

@include "conn.php";
$err = false;
$succ = false;
if(isset($_POST['signup'])){
   
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNb = mysqli_real_escape_string($conn, $_POST['phoneNb']);
 
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

    // validate the sign up form

    if(empty($fName)){
        $err = true;
        $errMsg = "Please Fill The Full Name";
    }else if(empty($email)){
        $err = true;
        $errMsg = "Please Fill The Email Address";
    }else if(empty($phoneNb)){
        $err = true;
        $errMsg = "Please Fill The Phone Number";
    }else if(empty($pass)){
        $err = true;
        $errMsg = "Please Fill The Password";
    }else if(strlen($fName)<3){
        $err = true;
        $errMsg = "Full Name Must Be 3 Character";
    }
    else if(strlen($email)<8){
        $err = true;
        $errMsg = "Email Address Must Be 8 Character";
    }
    else if(strlen($phoneNb)<10){
        $err = true;
        $errMsg = "Phone Number Must Be 10 Character";
    }
    
   else if(!is_numeric($phoneNb)){
        $err = true; 
        $errMsg =  "only number allows";
    }else {
        // insert the user 
        $userSqls = "select * from users where email = '$email'";
        $userQuerys = mysqli_query($conn,$userSqls);
       
        if(mysqli_num_rows($userQuerys)>0){
            $err = true;
            $errMsg = "This User Already Registered";
        }else{
            $userSql = "INSERT INTO `users` ( `fName`, `email`, `phone`, `pass`,`repass`) VALUES ('$fName', '$email', '$phoneNb', '$pass', '$pass')";
            $userQuery = mysqli_query($conn, $userSql);
            if($userQuery){
                $succ = true;
                $succMsg = "Account Created Successfully Please Login";
            }
        }
       
    }
}

?>

      <section class="content-main">
      <?php 
    if($err)
{

  
    ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errMsg ?>
</div>
<?php 
}  

?>
  <?php 
    if($succ)
{

  
    ?>
      <div class="alert alert-success" role="alert">
  <?php echo $succMsg ?>
</div>
<?php 
}  

?>
      <div class="card">
  <div class="card-header">
    <h5>Create New User</h5>
  </div>
  <div class="card-body">
  <form action="add-new-user.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" name="fName">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email"  name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" name="phoneNb">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Temporary Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Temporary Password" name="pass">
  </div>
  <button type="submit" class="btn btn-primary mt-3" name="signup">Add New User</button>
</form>
  </div>
</div>
      </section>
      <?php include "../php/admin/footer.php" ?>