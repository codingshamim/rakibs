<?php
@include "../php/admin/header.php";
if(isset($_POST['createSub'])){
  $subcate = mysqli_real_escape_string($conn,$_POST['subcate']);
  $mainCate = mysqli_real_escape_string($conn, $_POST['mainCate']);
  $inserCate = "INSERT INTO `subcate` (`subcatename`, `maincate`) VALUES ('$subcate', '$mainCate')";
  mysqli_query($conn,$inserCate);
}
?>
      <section class="content-main">
      <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">Sub Category</h5>
 
   <form action="add-new-sub-cate.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Sub Category Name</label>
    <input name="subcate" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Sub Category Name">

   
  </div>

  <select class="form-select" aria-label="Default select example" name="mainCate">
  <?php
                      $selCate = "select * from category";
                      $selCateQuery = mysqli_query($conn,$selCate);
                      while($category = mysqli_fetch_assoc($selCateQuery)){

                     
                      
                      ?>
                      <option value="<?php echo $category['id'] ?>"> <?php echo $category['cateName'] ?></option>
                      <?php 
                       }
                      ?>
 
</select>

  <button name="createSub" type="submit" class="btn-sm btn btn-primary">Create</button>
</form>
</div>
</div>



      </section>
        <?php
@include "../php/admin/footer.php"

?>