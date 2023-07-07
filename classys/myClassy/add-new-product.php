<?php @include "../php/admin/header.php" ?>
<?php @include "../php/admin/add-product.php" ?>
      <section class="content-main">
        <div class="row">
          <div class="col-9">
            <div class="content-header">
              <h2 class="content-title">Add New Product</h2>
              
            </div>
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
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Basic</h4>
              </div>
              <div class="card-body">
                <form action="add-new-product.php" method="post"  enctype="multipart/form-data">
                  <div class="mb-4">
                    <label class="form-label" for="product_name">Product title</label>
                    <input name="pTitle" class="form-control" id="product_name" type="text" placeholder="Type here" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Full description</label>
                    <textarea name="pDes" class="form-control" placeholder="Type here" rows="4" required></textarea>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="mb-4">
                        <label class="form-label">Regular price</label>
                        <div class="row gx-2"></div>
                        <input name="rPrice" class="form-control" placeholder="$" type="text" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="mb-4">
                        <label class="form-label">Promotional price</label>
                        <input name="prPrice" class="form-control" placeholder="$" type="text" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label class="form-label">Currency</label>
                      <select name="currency" class="form-select">
                        <option> USD</option>
                        <option> EUR</option>
                        <option> RUBL</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Tax rate</label>
                    <input name="taxRate" class="form-control" id="product_name" type="text" placeholder="%" required>
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
                      <input name="shipFee" class="form-control" id="product_name" type="text" placeholder="$" required>
                    </div>
                  </div>
                  <div>
             
                <button name="addProduct"  type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
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
                      <option value="<?php echo $category['id'] ?>"> <?php echo $category['cateName'] ?></option>
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