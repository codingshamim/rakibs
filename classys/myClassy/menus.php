<?php
      include "../php/admin/header.php";
      $err = false;
      $succ = false;
      if(isset($_POST['addMenu'])){
        $addMenu = mysqli_real_escape_string($conn,$_POST['menuInp']);

        $addMenu = "INSERT INTO `menus` ( `menu`) VALUES ( '$addMenu')";
        if(mysqli_query($conn,$addMenu)){
            $succ = true;
            $succMsg = "Menu Created Successfully";
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
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add New Menu</h5>
        <form action="menus.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Menu Name" name="menuInp">
    
  </div>
 
  <button name="addMenu" type="submit" class="mt-3 btn btn-primary">Add Menu</button>
</form>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Menus</h5>
        <?php
        $selMenu = "select * from menus";
        $selMenuQuery = mysqli_query($conn,$selMenu);
        while($menus = mysqli_fetch_assoc($selMenuQuery)){


        
        
        ?>
       <div class="menu-box shadow p-3 mb-5 bg-white rounded d-flex justify-content-between align-items-center">
        <div class="menu-name">
            <h6><?php echo $menus['menu'] ?></h6>
        </div>
        <div class="menu-name">
            <a href="menus.php?menus=<?php echo $menus['id'] ?>" style="cursor:pointer">Delete</a>
        </div>
       </div>

       <?php 
       }

       if(isset($_GET['menus'])){
        $menuId = $_GET['menus'];
        $deleteMenu = "delete  from menus where id = '$menuId'";
        mysqli_query($conn,$deleteMenu);
       }
       
       ?>
      </div>
    </div>
  </div>
</div>
      </section>
      <?php
      include "../php/admin/footer.php"
      
      ?>