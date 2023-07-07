<?php 
@include '../conn.php';
$userId = $_SESSION['uniqueId'];
$uploadCheck  = false;
$err = false;
$succ = false;
if(isset($_POST['addProduct'])){
    $pTitle = mysqli_real_escape_string($conn,$_POST['pTitle']);
    $pDes = mysqli_real_escape_string($conn,$_POST['pDes']);
    $rPrice = mysqli_real_escape_string($conn,$_POST['rPrice']);
    $prPrice = mysqli_real_escape_string($conn,$_POST['prPrice']);
    $currency = mysqli_real_escape_string($conn,$_POST['currency']);
    $taxRate = mysqli_real_escape_string($conn,$_POST['taxRate']);
    $shipFee = mysqli_real_escape_string($conn,$_POST['shipFee']);
    $cate = mysqli_real_escape_string($conn,$_POST['cate']);
    $subCate = mysqli_real_escape_string($conn,$_POST['subCate']);

    $thumbname = $_FILES['thumb']['name'];
    $thumbtname = $_FILES['thumb']['tmp_name'];
    $target = "assets/imgs/product/";
    $ext = pathinfo($thumbname, PATHINFO_EXTENSION);
  
    if($ext == "png" || $ext == "jpg" || $ext == "jpeg"){
        $uploads = move_uploaded_file($thumbtname, $target.$thumbname);
        $uploadCheck = true;
    }
    if($thumbname == ""){
        $err = true;
        $errMsg = "Media Image Required";
    }
   
    
if($uploadCheck){
    // insert the data
    $inserProduct = "INSERT INTO `product` ( `title`, `des`,  `rp`, `pr`, `currency`, `tax`, `feeShip`, `cate`, `subcate`,`thumb`, `user`) VALUES ( '$pTitle', '$pDes', '$rPrice', '$prPrice', '$currency', '$taxRate', '$shipFee', '$cate', '$subCate', '$thumbname', '$userId')";
 if(mysqli_query($conn,$inserProduct)){
    $succ = true;
    $succMsg = "Product Added Successfully";
 }

}else{
    $err = true;
       $errMsg = "Only Png Jpg Jpeg File Are Allowed";
}

  
}
   
?>