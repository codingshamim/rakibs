<?php include "../php/admin/header.php" ?>
<section class="content-main">
<?php 
$err = false;
$succ = false;
$userId = $_GET['edit'];
$userSqlEdit = "select * from users where uniqueId = '$userId'";
$usersQuery = mysqli_query($conn,$userSqlEdit);
$usersEdit = mysqli_fetch_assoc($usersQuery);

if(isset($_POST['updateUser'])){
    $fName = mysqli_real_escape_string($conn,$_POST['fName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phoneNb = mysqli_real_escape_string($conn,$_POST['phoneNb']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $updateUser = "UPDATE `users` SET `fName` = '$fName', `email` = '$email', `phone` = '$phoneNb', `action` = '$status' WHERE `users`.`uniqueId` = '$userId'";
    if(mysqli_query($conn,$updateUser)){
        $succ = true;
        $succMsg = "User Updated Successfully";
    }
}
?>
      <div class="card">
  <div class="card-header">
    <h5>Create New User</h5>
  </div>
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
  <div class="card-body">
  <form action="edit-user.php?edit=<?php echo $userId ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$usersEdit['fName']?>" name="fName">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$usersEdit['email']?>"  name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$usersEdit['phone']?>" name="phoneNb">
  </div>
  <div class="form-group">
    <label for="">Status</label>
  <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" name="status">
  <?php
  if($usersEdit['action']==1){

  
  ?>
  <option value="1">Active</option>
  <option value="0">Pending</option>
  <?php 
  }else{

 
  ?>
  <option value="0">Pending</option>
  <option value="1">Active</option>
  <?php 
   }
  ?>
</select>
  </div>
  <button type="submit" class="btn btn-primary mt-3" name="updateUser">Update User</button>
</form>
  </div>
</div>
      </section>
      <?php include "../php/admin/footer.php" ?>