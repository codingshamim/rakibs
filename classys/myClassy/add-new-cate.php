<?php @include "../php/admin/header.php" ?>
<?php @include "../php/conn.php" ?>


<?php
$err = false;
$succ = false;

if(isset($_POST['addCate'])){
  $cateName = mysqli_real_escape_string($conn,$_POST['cateName']);
  $cateStatus = mysqli_real_escape_string($conn,$_POST['statusCate']);
  if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $uploadDir = 'assets/imgs/cate/';
    // Extract file information
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Get the file extension
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // List of allowed image extensions
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'svg');

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
                $destination = $uploadDir . $fileName;
                if (move_uploaded_file($fileTmpName, $destination)) {

                  //  if  already have category
                  
                  $selCate = "SELECT * FROM `category` where cateName = '$cateName'";
                  $selQuery = mysqli_query($conn,$selCate);
                  if(mysqli_num_rows($selQuery)>0){
                    $err  = true;
                    $errMsg = "This Category Already Created";
                  }else{
                    
                    $cateSql = "INSERT INTO `category` ( `cateName`, `cateImg`, `status`) VALUES ( '$cateName', '$fileName', '$cateStatus')";
                    $cateQuery = mysqli_query($conn,$cateSql);
                     if($cateQuery){
                       $succ = true;
                       $succMsg = "Category Created successfully.";
                     }
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

?>
      <section class="content-main">
      <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
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
        <h4 class="card-title">Add New Category</h4>
        <form  action="add-new-cate.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input name="cateName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write Your Category Name" required>
  
  </div>
  <div class="mb-3">
  <label >Category Image</label>
  <input  name="image" class="mt-2 form-control form-control-sm" id="formFileSm" type="file" required>
</div>
 
<div class="form-check mb-2">
<input class="form-check-input" type="radio" id="cate" value="on" name="statusCate"  checked>
  <label class="form-check-label" >
   Show This Category Menubar
  </label>
</div>
<div class="form-check mb-2">
<input class="form-check-input" type="radio" id="cate" value="off" name="statusCate">
  <label class="form-check-label" >
  Don't Show This Category Menubar
  </label>
</div>

  <button  name="addCate" type="submit" class="mt-2 btn btn-primary">Save Changes</button>
</form>
      </div>
    </div>
  </div>
  
</div>
      </section>
      <?php @include "../php/admin/footer.php" ?>