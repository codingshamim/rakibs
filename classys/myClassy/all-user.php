<?php include "../php/admin/header.php" ?>
      <section class="content-main">
        <div class="content-header">
          <div>
            <h2 class="content-title card-title">Users List</h2>
            <p>You Have 5 users</p>
          </div>
      
        </div>
        <div class="card mb-4">
         
          <!-- card-header end//-->
          <div class="card-body">
            <?php 
            $userSql = "select * from users";
            $userQuery = mysqli_query($conn,$userSql);
            $slno = 0;
           while($users = mysqli_fetch_assoc($userQuery)){
            $slno++;
        
            
            ?>
            <article class="itemlist">
              <div class="row align-items-center">
                <div class="col col-check flex-grow-0">
                  <div class="form-check">
                   <?php echo $slno ?>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name"><a class="itemside" href="#">
                    <div class="left"><img class="img-sm img-thumbnail" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="Item"></div>
                    <div class="info">
                      <h6 class="mb-0"><?php echo $users['fName'] ?></h6>
                    </div></a></div>
                    
                <div class="col-lg-2 col-sm-2 col-4 col-price"><span><?php
                echo $users['status']
                
                ?></span></div>
                
                
                <?php
                if($users['action']==1){

              
                
                ?>
                
                <div class="col-lg-2 col-sm-2 col-4 col-status"><span class="badge rounded-pill alert-success">Active</span></div>
                <?php 
                
            }else{

           
                
                ?>
                 <div class="col-lg-2 col-sm-2 col-4 col-status"><span class="badge rounded-pill alert-danger">Pending</span></div>
                 <?php
                  }
                 
                 ?>
                 
                <div class="col-lg-2 col-sm-2 col-4 col-action text-end"><a class="btn btn-sm font-sm rounded btn-brand mr-5" href="edit-user.php?edit=<?php echo $users['uniqueId'] ?>"><i class="fa-solid fa-pencil"></i> Edit</a><a class="btn btn-sm font-sm btn-light rounded" href="all-user.php?deleteUser=<?php echo $users['uniqueId'] ?>"><i class="fa-solid fa-trash"></i>Delete</a></div>
              </div>

              <?php
              if(isset($_GET['deleteUser'])){
                $deleUserId = $_GET['deleteUser'];
                $deleteUser = "DELETE FROM users WHERE `users`.`uniqueId` = '$deleUserId'";
                if(mysqli_query($conn,$deleteUser)){
                    $succ = true;
                    $succMsg = "User Deleted Successfully";
                }
              }
              ?>
              <!-- row .//-->
              <!-- itemlist  .//-->
            </article>
         <?php 
           }
         
         ?>
          </div>
        </div>
        <!-- card end//-->
        
      </section>
      <?php include "../php/admin/footer.php" ?>