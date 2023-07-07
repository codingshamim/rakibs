<?php include "../php/admin/header.php" ?>

<section class="content-main">


<div class="card mb-4">
    <?php
    $succ = false;
    $cateSqlTwo = "select * from category";
    $cateQueryTwo = mysqli_query($conn,$cateSqlTwo);
    $countCate  = mysqli_num_rows($cateQueryTwo);
    if(isset($_GET['deleteCate'])){
      $getCateid = $_GET['deleteCate'];
      $deleteCate = "DELETE FROM `category` WHERE `category`.`id` = '$getCateid'";
    if(mysqli_query($conn,$deleteCate)){
      $succ = true;
      $succMsg = "Category Deleted Successfully";
    }
  }
    ?>
                <header class="card-header">
                    <h4 class="card-title">All Category</h4>
                    <div class="row align-items-center">
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                         <p>You Have  <?php echo $countCate ?> Category</p>
                        </div>
                       
                    </div>
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                        <div class="container">
 

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
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Image</th>
            <th scope="col">Created</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
            // select  the  category
            $selCate  = "SELECT * FROM `category`";
            $selCatQuery = mysqli_query($conn,$selCate);
            $cateSl = 0;
            while($cate = mysqli_fetch_assoc($selCatQuery)){
            $cateSl++;
                

            
            
            ?>
          <tr>
            <th scope="row"><?php  echo  $cateSl ?></th>
            <td><?php echo $cate['cateName'] ?></td>
            <td>
                <img style="width: 40px;  height:40px; object-fit:cover" src="assets/imgs/cate/<?php echo $cate['cateImg'] ?>" alt="">
            </td>
            <td>2.846</td>
            <td>
            
              
            <a href="all-category.php?deleteCate=<?php echo $cate['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>

          <?php 
          
        }

      
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
                        </div>
                    </div>
                    <!-- table-responsive end//-->
                </div>
            </div>

            </section>
            <?php include "../php/admin/footer.php" ?>
