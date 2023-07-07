<?php include "../php/admin/header.php" ?>
      <section class="content-main">
        <div class="content-header">
          <div>
            <?php 
            $err =  false;
            $succ = false;
             $selSellerSqlCount = "select * from seller";
             $sellerQueryCount = mysqli_query($conn,$selSellerSqlCount);
             $countSell = mysqli_num_rows($sellerQueryCount);

          
$length = 6;
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(rand(ord(1), ord(9)));
    }
if(isset($_POST['addSeller'])){
    
    $fName = mysqli_real_escape_string($conn,$_POST['fName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $userSql = "select * from users where email = '$email'";

    $userQuery = mysqli_query($conn,$userSql);

    $userCount = mysqli_num_rows($userQuery);
    if($userCount>0){
        $err = true;
        $errMsg  = "This User Already Registered";
    }else{
        $sellPass = mysqli_real_escape_string($conn, md5($_POST['sellPass'])); 
        $inSell = "INSERT INTO `users` (`pass`, `fName`, `email`, `phone`, `repass`) VALUES ( '$sellPass', '$fName', '$email', '$phone', '$sellPass')";
        mysqli_query($conn,$inSell);
        $tempPass = $_POST['sellPass'];
        if($inSell){
             $succ = true;
            $succMsg = "Seller Register Successfully And This Seller Temporary Password Is ".$tempPass." ";
        }
    }

  
}

         

?>
            <h2 class="content-title card-title">Seller Request</h2>
            <p>You Have <?php echo $countSell ?> Seller Request </p>
          </div>
         
        <div class="card mb-4">
          <header class="card-header">
           
            
            
            
              </div>
            </div>
          </header>
          <!-- card-header end//-->
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
            <?php
            $slNo = 0;
            $selSellerSql = "select * from seller";
            $sellerQuery = mysqli_query($conn,$selSellerSql);
        
            while($seller = mysqli_fetch_assoc($sellerQuery)){
                $slNo++;
          
            
            ?>
            <form action="seller-apply.php" method="post">
            <article class="itemlist">
   
              <div class="row align-items-center">
                <div class="col col-check flex-grow-0">
                  <div class="form-check">
                  <div class="col-lg-1 col-sm-2 col-4 col-date"><span><?php echo $slNo?></span></div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name"><a class="itemside" href="">
                 
                    <div class="info">
                      <h6 class="mb-0"><?php echo $seller['name'] ?></h6>
                      <input name="fName" type="hidden" value="<?php echo $seller['name'] ?>">
                    </div></a></div>
                <div class="col-lg-2 col-sm-2 col-4 col-price"><span><?php echo $seller['email'] ?></span>
                <input name="email"  type="hidden" value="<?php echo $seller['email'] ?>">
                <input name="sellPass" type="hidden" value="<?php echo $random ?>">
            </div>
                
               
                <div class="col-lg-1 col-sm-2 col-4 col-date"><span><?php echo $seller['phone'] ?></span>
                <input name="phone" type="hidden" value="<?php echo $seller['phone'] ?>">
            </div>
                <div class="col-lg-1 col-sm-2 col-4 col-date"><span><?php echo $seller['country'] ?></span>
              <input type="hidden" value="<?php echo $seller['country'] ?>">
            </div>
                <div class="col-lg-2 col-sm-2 col-4 col-action text-end"><button type="submit" class="btn btn-sm font-sm rounded btn-brand mr-5" name="addSeller"><i class="fa-solid fa-check"></i> Approve</button><a class="btn btn-sm font-sm btn-light rounded" href="seller-apply.php?seller=<?php echo $seller['id'] ?>"><i class="fa-solid fa-trash"></i> Delete</a></div>
              </div>
              <?php
              if(isset($_GET['seller'])){
                $sellerId  = $_GET['seller'];
                $delete = "DELETE FROM `seller` WHERE `seller`.`id` = '$sellerId'";
                if(mysqli_query($conn,$delete)){
                    $succ = true;
                    $succMsg = "Application Deleted Successfully";
                }
              }
              
              ?>
              <!-- row .//-->
              <!-- itemlist  .//-->
            </article>
            </form>
           <?php 
             }
           
           ?>
          </div>
        </div>
        <!-- card end//-->
      
      </section>
      <?php include "../php/admin/footer.php" ?>