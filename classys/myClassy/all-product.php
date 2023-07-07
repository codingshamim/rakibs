
<?php @include "../php/admin/header.php";
$succ = false;
$err = false;

?>
      <section class="content-main">
      <div class="container">
  <div class="row">
    <div class="col-12">
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
      <table class="table table-bordered">

        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Product name</th>
            <th scope="col">Action</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $slno = 0;
            $selProduct = "select * from product";
            $productQuery = mysqli_query($conn, $selProduct);
            while($product = mysqli_fetch_assoc($productQuery)){
                $slno++;
           
            
            ?>
          <tr>
            <th scope="row"><?php echo $slno ?></th>
            <td><?php echo $product['title']  ?></td>
            <td>
              <?php
              if($product['status']==0){
                
             
              
              ?>
            <div class="col-lg-2 col-sm-2 col-4 col-status"><span class="badge rounded-pill alert-warning">Pending</span></div>
            <?php
            }
            
            ?>
        <?php
              if($product['status']==1){
                
             
              
              ?>
            <div class="col-lg-2 col-sm-2 col-4 col-status"><span class="badge rounded-pill alert-success">Active</span></div>
            <?php
            }
            
            ?>
    
          
            </td>
            <td>
            <img style="width: 40px; height:40px; object-fit:cover" src="assets/imgs/product/<?php echo $product['thumb'] ?>" alt="">


            </td>
            <td>
           
              <a href="edit-product.php?edit=<?php echo $product['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
            <a href="all-product.php?deleteP=<?php echo $product['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
         <?php
          }

          //delete the product 
          if(isset($_GET['deleteP'])){
            $deletpid = $_GET['deleteP'];
            $deleteproduct = "DELETE FROM `product` WHERE `product`.`id` = '$deletpid'";
            $deleteProduct = mysqli_query($conn,$deleteproduct);
            if($deleteProduct){
              $succ = true;
              $succMsg = "Product Deleted Successfullu";
            }
          }
         ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
      </section>
     
      <?php @include "../php/admin/footer.php" ?>