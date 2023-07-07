<?php @include "../php/admin/header.php" ?>
<?php
$editid = $_GET['edit'];
$selProduct = "select * from product where id = '$editid'";
$selprodutQuery = mysqli_query($conn,$selProduct);
$products = mysqli_fetch_assoc($selprodutQuery);

// now update the product
$err = false;
$succ = false;
if(isset($_POST['updateProduct'])){
    $pTitle = mysqli_real_escape_string($conn,$_POST['pTitle']);
    $pDes = mysqli_real_escape_string($conn,$_POST['pDes']);
    $rPrice = mysqli_real_escape_string($conn,$_POST['rPrice']);
    $prPrice = mysqli_real_escape_string($conn,$_POST['prPrice']);
    $currency = mysqli_real_escape_string($conn,$_POST['currency']);
    $taxRate = mysqli_real_escape_string($conn,$_POST['taxRate']);
    $shipFee = mysqli_real_escape_string($conn,$_POST['shipFee']);
    $cate = mysqli_real_escape_string($conn,$_POST['cate']);
    $subCate = mysqli_real_escape_string($conn,$_POST['subCate']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $isNull = mysqli_real_escape_string($conn,$_POST['isNull']);

    $fileName = $_FILES['thumb']['name'];
    $fileTmpName = $_FILES['thumb']['tmp_name'];
    $folder = "assets/imgs/product/";
   
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
if ($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg') {
  
   $up = move_uploaded_file($fileTmpName, $folder.$fileName);
}else{
 
}


if($fileName == ""){
  
 // now update the product 
 $updateProduct = "UPDATE `product` SET `title` = '$pTitle', `des` = '$pDes', `thumb` = '$isNull', `rp` = '$rPrice', `pr` = '$prPrice', `currency` = '$currency', `tax` = '$taxRate', `feeShip` = '$shipFee', `cate` = '$cate', `subcate` = '$subCate', `user` = '1', `status` = '
 $status' WHERE `product`.`id` = '$editid'"; 
    $querys = mysqli_query($conn,$updateProduct);
  
      
}else{
  if($up){
      // now update the product 
   $updateProduct = "UPDATE `product` SET `title` = '$pTitle', `des` = '$pDes', `thumb` = '$fileName', `rp` = '$rPrice', `pr` = '$prPrice', `currency` = '$currency', `tax` = '$taxRate', `feeShip` = '$shipFee', `cate` = '$cate', `subcate` = '$subCate', `user` = '1', `status` = '
   $status' WHERE `product`.`id` = '$editid'";  
   $querys = mysqli_query($conn,$updateProduct);
  }else{
    
  }
 
}



  
  if($querys){
    $succ = true;
    $succMsg = "Product Updated Successfully";
    
  }
    
}

?>
      <section class="content-main">
        <div class="row">
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
          <div class="col-9">
            <div class="content-header">
              <h2 class="content-title">Edit Product</h2>
              
            </div>
          </div>
         
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Basic</h4>
              </div>
              <div class="card-body">
                <form action="edit-product.php?edit=<?php echo $products['id'] ?>" method="post"  enctype="multipart/form-data">
                  <div class="mb-4">
                    <label class="form-label" for="product_name">Product title</label>
                    <input name="pTitle" class="form-control" id="product_name" type="text" value="<?php echo $products['title'] ?>" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Full description</label>
                    <textarea name="pDes" class="form-control"  rows="4" required><?php echo $products['des'] ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="mb-4">
                        <label class="form-label">Regular price</label>
                        <div class="row gx-2"></div>
                        <input name="rPrice" class="form-control" value="<?php echo $products['rp'] ?>" type="text" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="mb-4">
                        <label class="form-label">Promotional price</label>
                        <input name="prPrice" class="form-control" value="<?php echo $products['pr'] ?>" type="text" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label class="form-label">Currency</label>
                      <select name="currency" class="form-select">
                        <option> USD</option>
                        <option> EUR</option>
                        <option> BDT</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Tax rate</label>
                    <input name="taxRate" class="form-control" id="product_name" type="text" value="<?php echo $products['tax'] ?>" required>
                  </div>
              
              
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <h4>Shipping</h4>
              </div>
              <div class="card-body">
             
                  <div class="row">
                    
                   
                   
                    <div class="mb-4">
                      <label class="form-label" for="product_name">Shipping fees</label>
                      <input name="shipFee" class="form-control" id="product_name" type="text" value="<?php echo $products['feeShip'] ?>" required>
                    </div>
                  </div>
                  <div>
             
                <button name="updateProduct"  type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
              </div>
              
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Media</h4>
              </div>
              <div class="card-body">
                <div class="input-upload"><img src="assets/imgs/theme/upload.svg" alt="">
                  <input name="thumb" class="form-control" type="file">
                  <input name="isNull" class="form-control" type="hidden" value="<?php echo $products['thumb'] ?>">
                </div>
                
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <h4>Organization</h4>
              </div>
              <div class="card-body">
                <div class="row gx-2">
                  <div class="col-sm-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="cate" class="form-select">
                      <?php
                      $selCate = "select * from category";
                      $selCateQuery = mysqli_query($conn,$selCate);
                      while($category = mysqli_fetch_assoc($selCateQuery)){

                     
                      
                      ?>
                      <option value="<?=$category['id'] ?>"> <?php echo $category['cateName'] ?></option>
                      <?php 
                       }
                      ?>
                   
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label">Sub-category</label>
                    <select  name="subCate" class="form-select">
                        <?php
                        $selSub = "select * from subcate";
                        $selCatequery = mysqli_query($conn,$selSub);
                        while($sub = mysqli_fetch_assoc($selCatequery)){

                    
                        
                        ?>
                    
                      <option> <?php echo $sub['subcatename'] ?></option>
                      <?php 
                      
                        }
                      
                      ?>
                    </select>
                  </div>


                  <div class="col-sm-6 mb-3">
                    <label class="form-label">Status</label>
                    <select  name="status" class="form-select">
                      <?php
                      if($products['status'] ==0)
                      {
                      ?>
                       <option value="0"> Pending</option>
                      <option value="1"> Active</option>
                     
                    
                      <?php 
                      }else{

                    
                      
                      ?>
                   
                      <option value="1"> Active</option>
                      <option value="0"> Pending</option>

                      <?php
                      }
                      ?>
                      
                    </select>
                  </div>
                  <div class="mb-4">
                
                    <input class="form-control" type="text">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </form>
      </section>

      <?php @include "../php/admin/footer.php" ?>