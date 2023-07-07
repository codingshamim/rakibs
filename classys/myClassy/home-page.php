<?php 

$succ = false;

$err = false;

include "../php/admin/header.php";
include "../php/admin/home-page-slider.php";
// fetch the  home slider
$selHomeSlider = "select * from homepage";
$selHomeSlQuery = mysqli_query($conn,$selHomeSlider);
$sliderOne = mysqli_fetch_assoc($selHomeSlQuery);


if(isset($_POST['saveSliderOne'])){
    $homeSlImgName = $_FILES['homeSlImg']['name'];
    $homeSlImgTName = $_FILES['homeSlImg']['tmp_name'];
    // declare variable for slider img 
    $homeSTitle = mysqli_real_escape_string($conn,$_POST['homeSTitle']);
    $homslTitle = mysqli_real_escape_string($conn,$_POST['homslTitle']);
    $homeSlDes = mysqli_real_escape_string($conn,$_POST['homeSlDes']);
    $homeSlImgs = mysqli_real_escape_string($conn,$_POST['homeSlImgs']);
    $bgColorHome1 = mysqli_real_escape_string($conn,$_POST['bgColorHome1']);
    $h1mTitles = mysqli_real_escape_string($conn,$_POST['h1mTitles']);
    $folderSl = "assets/imgs/home/";
    

    $ext = pathinfo($homeSlImgName, PATHINFO_EXTENSION);
    if ($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg' || $homeSlImgName == "") {
       $up = move_uploaded_file($homeSlImgTName, $folderSl.$homeSlImgName);
       if($homeSlImgName == ""){
        $upSql = "UPDATE `homepage` SET `homeSubTitle1` = '$homeSTitle', `homeTitle1` = '$homslTitle', `homeDes1` = '$homeSlDes', `homeSlImg1` = '$homeSlImgs', `homeSl1Color` = '$bgColorHome1', `h1mTitles` = '$h1mTitles' WHERE `homepage`.`id` = 1";
        if(mysqli_query($conn,$upSql)){
            $succ = true;
            $succMsg = "Home Updated Successfully";
        }
    }else{
        if($up){
            $upSql = "UPDATE `homepage` SET `homeSubTitle1` = '$homeSTitle', `homeTitle1` = '$homslTitle', `homeDes1` = '$homeSlDes', `homeSlImg1` = '$homeSlImgName', `homeSl1Color` = '$bgColorHome1', `h1mTitles` = '$h1mTitles' WHERE `homepage`.`id` = 1";
            if(mysqli_query($conn,$upSql)){
                $succ = true;
                $succMsg = "Home Updated Successfully";
            }
           }
    }
     
    }else{
     $err = true;
     $errMsg = "Only Jpg Jpeg And Png Format Supported";
    }
    
}
// fetch the banner 
$bannerSql = "SELECT * FROM `bannerhome`";
$bannerQuery = mysqli_query($conn,$bannerSql);
$banners = mysqli_fetch_assoc($bannerQuery);
?>
<section class="content-main">
<form action="home-page.php" method="post"  class="mb-3" enctype="multipart/form-data">
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
        <h5 class="card-title">Home Page Slider img 1</h5>
        <input type="file" class="form-control-sm form-control" name="homeSlImg">
        <input type="hidden" class="form-control-sm form-control" name="homeSlImgs" value="<?= $sliderOne['homeSlImg1']?>">
        <div class="form-group">
            <label for="">Home Slider Sub Title 1</label>
            <input name="homeSTitle" type="text" class="form-control" value="<?=$sliderOne['homeSubTitle1']?>" required>
        </div>
      
        <div class="form-group">
            <label for="">Home Slider Title 1</label>
            <input name="homslTitle" type="text" class="form-control" value="<?=$sliderOne['homeTitle1']?>" required>
        </div>
        <div class="form-group">
            <label for="">Home Slider Main Title 1</label>
            <input name="h1mTitles" type="text" class="form-control" value="<?=$sliderOne['h1mTitles']?>" required>
        </div>
        <div class="form-group">
            <label for="">Home Slider 1 Background Color</label>
            <input name="bgColorHome1" type="text" class="form-control" value="<?=$sliderOne['homeSl1Color']?>" required>
        </div>
        <div class="form-group d-flex justify-content-center  flex-column">
            <label for="">Home Slider Description 1</label>
            <textarea name="homeSlDes" id="" cols="30" rows="10" class="form-control" required><?=$sliderOne['homeDes1']?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Preview Slider Image 1</h5>
        <img src="assets/imgs/home/<?=$sliderOne['homeSlImg1']?>">
      </div>
      
    </div>
  

</div>
<button class="btn btn-primary mb-3" name="saveSliderOne">Save Changes</button>
</form>
<form action="home-page.php" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Home Page Slider 2</h5>
        <input type="file" class="form-control-sm form-control" name="homeSlImgTwo">
        <input type="hidden" class="form-control-sm form-control" name="imgsDef" value="<?=$sliderOne['home2Slider']?>">
        <div class="form-group">
            <label for="">Home Slider Sub Title 2</label>
            <input type="text" class="form-control" value="<?=$sliderOne['h2SubTitle']?>" name="homeSlSubTwoTitle">
        </div>
       
        <div class="form-group">
            <label for="">Home Slider Title 2</label>
            <input type="text" class="form-control" value="<?=$sliderOne['h2MTitle']?>" name="homeSlTwoTitle">
        </div>
        <div class="form-group">
            <label for="">Home Slider Main Title 2</label>
            <input type="text" class="form-control" value="<?=$sliderOne['h2mTitles']?>" name="h2mTitles">
        </div>
        <div class="form-group">
            <label for="">Home Slider 2 Background Color</label>
            <input type="text" class="form-control" value="<?=$sliderOne['color2']?>" name="colorslTwo">
        </div>
        <div class="form-group d-flex justify-content-center  flex-column">
            <label for="">Home Slider Description 2</label>
            <textarea name="homeSlTwoDes" id="" cols="30" rows="10" class="form-control"><?=$sliderOne['h2Desc']?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Preview Slider Image 2</h5>
        <img src="assets/imgs/home/<?=$sliderOne['home2Slider']?>" class="img-fluid" alt="Responsive image">
      </div>
    </div>
  
</div>
<button class="btn btn-primary" type="submit" name="homeSlTwoSub">Save Changes</button>
</form>


</div>

<div class="card mt-3">
  <div class="card-header">
   <h4>Home Page Banner 1</h4>
  </div>
  <div class="card-body">
  <form action="home-page.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 1 Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b1Title']?>" name="b1Title">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 1 Sub Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b1Sub']?>" name="b1SubTitle">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b1Img']?>" name="b1ImgsBox">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 1 Background Color</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b1Color']?>" name="b1Color">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 1 Description</label>
   <textarea name="b1Des" id="" cols="30" rows="10" class="form-control"><?=$banners['b1Des']?></textarea>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 1 Image</label>
  <input type="file" name="b1Img"  class=" mt-1 form-control form-control-sm">
   
  </div>
  <button name="bannerOne" type="submit" class="btn btn-primary mt-3">Save Changes</button>
</form>
  </div>

  <div class="card mt-3">
  <div class="card-header">
   <h4>Home Page Banner 2</h4>
  </div>
  <div class="card-body">
  <form action="home-page.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 2 Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b2Title']?>" name="b2Title">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 2 Sub Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b2SubTitle']?>" name="b2SubTitle">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b2Img']?>" name="b2ImgsBox">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 2 Background Color</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$banners['b2Color']?>" name="b2Color">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 2 Description</label>
   <textarea name="b2Des" id="" cols="30" rows="10" class="form-control"><?=$banners['b2Des']?></textarea>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Banner 2 Image</label>
  <input type="file" name="b2Img"  class=" mt-1 form-control form-control-sm">
   
  </div>
  <button name="bannerTwo" type="submit" class="btn btn-primary mt-3">Save Changes</button>
</form>
  </div>
</div>


</section>


<?php include "../php/admin/footer.php" ?>