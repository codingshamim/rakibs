<?php
@include "../php/admin/header.php";
@include "../php/conn.php";

$err = false;
$succ = false;
if(isset($_POST['submitLogo'])){
      $adminTitle = mysqli_real_escape_string($conn,$_POST['adminTitle']);
       // Get Image Dimension
       $uploadDir = 'assets/imgs/logos/';

       // Check if a file was uploaded successfully
       if (isset($_FILES['image'])) {
           $file = $_FILES['image'];
       
           // Extract file information
           $fileName = $file['name'];
           $fileTmpName = $file['tmp_name'];
           $fileSize = $file['size'];
           $fileError = $file['error'];
       
           // Get the file extension
           $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       
           // List of allowed image extensions
           $allowedExtensions = array('jpg', 'jpeg', 'png');
       
           // Maximum allowed file size in bytes (e.g., 1MB = 1 * 1024 * 1024 bytes)
           $maxFileSize = 1 * 1024 * 1024;
       
           // Check if the file has no errors
           if ($fileError === UPLOAD_ERR_OK) {
               // Check if the file extension is valid
               if (in_array($fileExtension, $allowedExtensions)) {
                   // Check if the file size is within the allowed limit
                   if ($fileSize <= $maxFileSize) {
                       // Generate a unique file name to avoid overwriting existing files
                       $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
       
                       // Move the uploaded file to the destination directory
                       $destination = $uploadDir . $uniqueFileName;
                       if (move_uploaded_file($fileTmpName, $destination)) {
                          
                           
                            $updateAdmin = "UPDATE `admindetails` SET `adminTitle` = '$adminTitle', `adminLogo` = '$uniqueFileName' WHERE `admindetails`.`id` = 1";
                          $adminDetailsQuery =   mysqli_query($conn,$updateAdmin);
                            if($adminDetailsQuery){
                              $succ = true;
                            $succMsg = "Admin Details Updated successfully.";
                            }
                       }
                     
                       
                       else {
                     
                           $err = true;
                       $errMsg = "Failed to  uploaded Image.";
                       }
                   } else {
                      
                $errMsg = "File size exceeds the maximum limit.";
                   }
               } else {
                $err = true;
                $errMsg = "Invalid file extension.";
                  
               }
           } else {
               echo "File upload error: " . $fileError;
           }
       }
}
// update favicon 
if(isset($_POST['favSubmit'])){
  $favName = $_FILES['favInp']['name']; 
  $favTmpName = $_FILES['favInp']['tmp_name']; 
  $folders = "assets/imgs/favicon/";
  $ext = pathinfo($favName, PATHINFO_EXTENSION);
if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg') {
 if(move_uploaded_file($favTmpName, $folders.$favName)){
  $upFave = "UPDATE `admindetails` SET `favicon` = '$favName' WHERE `admindetails`.`id` = 1";
  
  if(mysqli_query($conn,$upFave)){
    $succ = true;
    $succMsg = "Favicon Updated Successfully";
  }
 }
}
  
 
}
// update footer

if(isset($_POST['footerAdmin'])){
  $footInput = mysqli_real_escape_string($conn,$_POST['footInput']);
  $updateAdminFooter = "UPDATE `admindetails` SET `adminFoot` = '$footInput' WHERE `admindetails`.`id` = 1;";
  $adminFootQuery = mysqli_query($conn, $updateAdminFooter);
  if($adminFootQuery){
    $succ  = true;
    $succMsg = "Footer Message Updated Successfully";
  }
}

// fetch the footer  msg 
$footerSql = "select * from admindetails";
$footerQuery = mysqli_query($conn,$footerSql);
$footer  = mysqli_fetch_assoc($footerQuery);

// fetch the favicon



// $selFav = "select * from admindetails";
// $selFavQuery = mysqli_query($conn,$selFav);
// $favicons = mysqli_fetch_assoc($selFavQuery);



?>
      <section class="content-main">
     
      <div class="card">
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

<?php 
// fetch the admin details 
$adminSql = "select * from admindetails";
$adminQuery = mysqli_query($conn, $adminSql);
$adminDetails = mysqli_fetch_assoc($adminQuery);

?>
  <div class="card-body">
    <h5 class="card-title">Edit Site Details </h5>
    <form action="edit-admin.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Website Title</label>
    <input name="adminTitle" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $adminDetails['adminTitle'] ?>">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Website Logo</label>
    <input name="image" type="file" class="mt-2 form-control" >
  </div>
  <div class="form-group" style="width: 200px; height:200px">
    <img width="100%" height="100%"  style="object-fit: cover;" src="assets/imgs/logos/<?php echo $adminDetails['adminLogo'] ?>" alt="">
  </div>
  <button name="submitLogo" type="submit" class="btn btn-sm mt-2 btn-primary">Save Changes</button>
</form>
  </div>
</div>

<div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">Favicon</h5>
    <form action="edit-admin.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Choose Favicon</label>
    <input name="favInp" class="form-control form-control-sm" id="formFileSm" type="file">
    <img style="width: 150px; height:200px; object-fit:cover" class="card-img-top" src="assets/imgs/favicon/<?php echo $favicons['favicon'] ?>" alt="Card image cap">
  
  </div>
  <button name="favSubmit" class="btn btn-primary mt-3">Save Changes</button>
    </form>
 
   
  </div>
</div>

<div class="card">
 
 <div class="card-body">

   <form action="edit-admin.php" method="post">
 <div class="form-group">
   <label for="exampleInputEmail1"> Footer Message</label>
   <input name="footInput" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $footer['adminFoot'] ?>">
  
 </div>

 
 <button name="footerAdmin" type="submit" class="btn btn-sm mt-2 btn-primary">Save Changes</button>
</form>
 </div>
</div>

</section>
      <?php
@include "../php/admin/footer.php";

?>