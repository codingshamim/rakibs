<?php
error_reporting(0);
include "../php/admin/header.php";
if(isset($_POST['submitMiddle'])){
    $middleTitle = mysqli_real_escape_string($conn,$_POST['middleTitle']);
    $delOffer = mysqli_real_escape_string($conn,$_POST['delOffer']);

    $updateMTitle = "UPDATE `header` SET `mtitle` = '$middleTitle', `typeDel` = '$delOffer' WHERE `header`.`id` = 1";
    if(mysqli_query($conn,$updateMTitle)){
        $succ = true;
        $succMsg = "Header Updated Successfully";
    }
}
// fetch the header title data
$headerSql = "select * from header";
$headerQuery = mysqli_query($conn,$headerSql);
$headers = mysqli_fetch_assoc($headerQuery);

// update the cellphone number header
if(isset($_POST['callSubmit'])){
    $callNum = mysqli_real_escape_string($conn,$_POST['callNum']);
    $callNumDel = mysqli_real_escape_string($conn,$_POST['callNumDel']);
   $callUpdateSql =  "UPDATE `header` SET `callNum` = '$callNum', `typeCall` = '$callNumDel' WHERE `header`.`id` = 1";
   if(mysqli_query($conn,$callUpdateSql)){
    $succ = true;
    $succMsg = "Header Updated Successfully";
   }
}
// update the currency for site
if(isset($_POST['currencySubmit'])){
    $currency = mysqli_real_escape_string($conn,$_POST['currency']);
    $symbol = mysqli_real_escape_string($conn,$_POST['symbol']);

    $updateCurrency = "UPDATE `header` SET `currency` = '$currency', `symbol` = '$symbol' WHERE `header`.`id` = 1";
    if(mysqli_query($conn,$updateCurrency)){
        $succ =  true;
        $succMsg = "Header Updated Successfully";
    }
}

?>
<section class="content-main">
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
<div class="card">
  <div class="card-header mb-0">
  <h5 class="card-title">Edit Header</h5>
  </div>
  <div class="card-body">
  <form action="header-page.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Free Delivery Offer</label>
    <input name="middleTitle" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $headers['mtitle'] ?>">

<div class="form-check">
  <input value="1" class="form-check-input" type="radio" name="delOffer" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Enable Free Delivery Offer
  </label>
</div>
<div class="form-check">
  <input value="0" class="form-check-input" type="radio" name="delOffer" id="flexRadioDefault2" required>
  <label class="form-check-label" for="flexRadioDefault2">
   Disable Free Delivery Offer
  </label>
</div>
  </div>
 
  <button name="submitMiddle" type="submit" class="btn-xs mt-3 btn btn-primary">Save Changes</button>
</form>
    
  </div>
</div>



<div class="card">

  <div class="card-body">
  <form action="header-page.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Call Number</label>
    <input name="callNum" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $headers['callNum'] ?>" required>

<div class="form-check">
  <input value="1" class="form-check-input" type="radio" name="callNumDel" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Enable Call Number
  </label>
</div>
<div class="form-check">
  <input value="0" class="form-check-input" type="radio" name="callNumDel" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   Disable Call Number
  </label>
</div>
  </div>
 
  <button name="callSubmit" type="submit" class="btn-xs mt-3 btn btn-primary">Save Changes</button>
</form>
    
  </div>
</div>



<div class="card">

  <div class="card-body">
  <form action="header-page.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Site Currency</label>
    <input name="currency" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $headers['currency'] ?>" required>
    <label class="mt-2" for="exampleInputEmail1">Currency Symbol</label>
    <input name="symbol" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $headers['symbol'] ?>" required>

 
  <button name="currencySubmit" type="submit" class="btn-xs mt-3 btn btn-primary">Save Changes</button>
</form>
    
  </div>
</div>
</section>
<?php include "../php/admin/footer.php" ?>