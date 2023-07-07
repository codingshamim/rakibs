<?php
@include  "../php/admin/header.php";
@include  "../php/conn.php";

if(isset($_POST['colorSave'])){
  $primary = mysqli_real_escape_string($conn,$_POST['primary']);
  $secondary = mysqli_real_escape_string($conn,$_POST['secondary']);
  // update the colors

  $colorSql  = "UPDATE `colors` SET `prm` = '$primary ', `scd` = '$secondary' WHERE `colors`.`id` = 1";
  $colorQuery = mysqli_query($conn,$colorSql);


}


  // select the color from the database
  $selColor = "SELECT * FROM `colors`";
  $selColorQuery = mysqli_query($conn,$selColor);
  $colors = mysqli_fetch_assoc($selColorQuery);
?>
      <section class="content-main">
      <div class="card">
  <div class="card-header">
 <h3>Edit Color Your Website</h3>  
  </div>
  <div class="card-body">
  <form action="edit-colors.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Primary Color</label>
    <input name="primary" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" value="<?php echo $colors['prm'] ?>" required>
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Secondary Color</label>
    <input name="secondary" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $colors['scd'] ?>" required>
  </div>
  
  <button name="colorSave" type="submit" class="mt-2 btn btn-primary">Save Changes</button>
</form>
  </div>
</div>

      </section>
      
      <?php
@include  "../php/admin/footer.php"
?>