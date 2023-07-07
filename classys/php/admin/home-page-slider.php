<?php


    if(isset($_POST['homeSlTwoSub'])){
        $homeSlImgTwoName = $_FILES['homeSlImgTwo']['name'];
        $homeSlImgTwoTmp = $_FILES['homeSlImgTwo']['tmp_name'];
        $dir = "assets/imgs/home/";
        $extes = pathinfo($homeSlImgTwoName, PATHINFO_EXTENSION);

        /// declare home slider two variable
        $homeSlSubTwoTitle = mysqli_real_escape_string($conn,$_POST['homeSlSubTwoTitle']);
        $homeSlTwoTitle = mysqli_real_escape_string($conn,$_POST['homeSlTwoTitle']);
        $homeSlTwoDes = mysqli_real_escape_string($conn,$_POST['homeSlTwoDes']);
        $imgsDef = mysqli_real_escape_string($conn,$_POST['imgsDef']);
        $colorslTwo = mysqli_real_escape_string($conn,$_POST['colorslTwo']);
        $h2mTitles = mysqli_real_escape_string($conn,$_POST['h2mTitles']);

        if($extes == 'jpg' || $extes == 'jpeg' || $extes == 'png' || $extes == ''){
            if($homeSlImgTwoName == ""){
                $updateSlTwoSql =   "UPDATE `homepage` SET `home2Slider` = '$imgsDef', `h2SubTitle` = '$homeSlSubTwoTitle', `h2MTitle` = '$homeSlTwoTitle', `h2Desc` = '$homeSlTwoDes', `color2` = '$colorslTwo', `h2mTitles` = '$h2mTitles' WHERE `homepage`.`id` = 1";
                if(mysqli_query($conn,$updateSlTwoSql)){
                  $succ = true;
                  $succMsg = "Home Page Slider Two Updated Successfully";
                }
            }else{
                $upTwo =   move_uploaded_file($homeSlImgTwoTmp, $dir.$homeSlImgTwoName);
                if($upTwo){
                  $updateSlTwoSql =   "UPDATE `homepage` SET `home2Slider` = '$homeSlImgTwoName', `h2SubTitle` = '$homeSlSubTwoTitle', `h2MTitle` = '$homeSlTwoTitle', `h2Desc` = '$homeSlTwoDes', `color2` = '$colorslTwo', `h2mTitles` = '$h2mTitles' WHERE `homepage`.`id` = 1";
                  if(mysqli_query($conn,$updateSlTwoSql)){
                    $succ = true;
                    $succMsg = "Home Page Slider Two Updated Successfully";
                  }
                }
            }
          
        }else{
            $err = true;
            $errMsg = "Only Jpg, Jpeg Or Png Format are Supported";
        }
        
    }


    // banner one update
    if(isset($_POST['bannerOne'])){
        $b1Img = $_FILES['b1Img']['name'];
        $b1ImgTmp = $_FILES['b1Img']['tmp_name'];
        $b1Title = mysqli_real_escape_string($conn,$_POST['b1Title']);
        $b1SubTitle = mysqli_real_escape_string($conn,$_POST['b1SubTitle']);
        $b1Color = mysqli_real_escape_string($conn,$_POST['b1Color']);
        $b1Des = mysqli_real_escape_string($conn,$_POST['b1Des']);
        $b1ImgsBox = mysqli_real_escape_string($conn,$_POST['b1ImgsBox']);
        $bdirOne = "assets/imgs/home/";
        $fileEx = pathinfo($b1Img, PATHINFO_EXTENSION);
        if($fileEx == "jpg" || $fileEx == "png" || $fileEx == "jpeg" || $fileEx == ""){
            if($b1Img == ""){
                $upDateB1 = "UPDATE `bannerhome` SET `b1Title` = '$b1Title', `b1Sub` = '$b1SubTitle', `b1Des` = '$b1Des', `b1Img` = '$b1ImgsBox', `b1Color` = '$b1Color' WHERE `bannerhome`.`id` = 1";
            if(mysqli_query($conn,$upDateB1)){
                $succ = true;
                $succMsg = "Banner One Updated Successfully";
            }
            }else{
          if(move_uploaded_file($b1ImgTmp, $bdirOne.$b1Img)){
            $upDateB1 = "UPDATE `bannerhome` SET `b1Title` = '$b1Title', `b1Sub` = '$b1SubTitle', `b1Des` = '$b1Des', `b1Img` = '$b1Img', `b1Color` = '$b1Color' WHERE `bannerhome`.`id` = 1";
            if(mysqli_query($conn,$upDateB1)){
                $succ = true;
                $succMsg = "Banner One Updated Successfully";
            }
          }

        }

        }
        


    }


    // banner two update 
    if(isset($_POST['bannerTwo'])){
        $b2Img = $_FILES['b2Img']['name'];
        $b2ImgTmp = $_FILES['b2Img']['tmp_name'];
        $b2Title = mysqli_real_escape_string($conn,$_POST['b2Title']);
        $b2SubTitle = mysqli_real_escape_string($conn,$_POST['b2SubTitle']);
        $b2Color = mysqli_real_escape_string($conn,$_POST['b2Color']);
        $b2Des = mysqli_real_escape_string($conn,$_POST['b2Des']);
        $b2ImgsBox = mysqli_real_escape_string($conn,$_POST['b2ImgsBox']);
        $bdirTwo = "assets/imgs/home/";
        $fileExTwo = pathinfo($b2Img, PATHINFO_EXTENSION);
        if($fileExTwo == "jpg" || $fileExTwo == "png" || $fileExTwo == "jpeg" || $fileExTwo == ""){
            if($b2Img == ""){
                $upDateB2 = "UPDATE `bannerhome` SET `b2Title` = '$b2Title', `b2SubTitle` = '$b2SubTitle', `b2Des` = '$b2Des', `b2Img` = '$b2ImgsBox', `b2Color` = '$b2Color' WHERE `bannerhome`.`id` = 1";
            if(mysqli_query($conn,$upDateB2)){
                $succ = true;
                $succMsg = "Banner One Updated Successfully";
            }
            }else{
          if(move_uploaded_file($b2ImgTmp, $bdirTwo.$b2Img)){
            $upDateB2 = "UPDATE `bannerhome` SET `b2Title` = '$b2Title', `b2SubTitle` = '$b2SubTitle', `b2Des` = '$b2Des', `b2Img` = '$b2Img', `b2Color` = '$b2Color' WHERE `bannerhome`.`id` = 1";
            if(mysqli_query($conn,$upDateB2)){
                $succ = true;
                $succMsg = "Banner Two Updated Successfully";
            }
          }

        }

        }
        


    }

?>