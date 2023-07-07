<?php

@include "conn.php";
$err = false;
$succ = false;
if(isset($_POST['signup'])){
   
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNb = mysqli_real_escape_string($conn, $_POST['phoneNb']);
    $orPass = mysqli_real_escape_string($conn, $_POST['pass']);
    $orRepass = mysqli_real_escape_string($conn, $_POST['repass']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $repass = mysqli_real_escape_string($conn, md5($_POST['repass']));
    // validate the sign up form

    if(empty($fName)){
        $err = true;
        $errMsg = "Please Fill The Full Name";
    }else if(empty($email)){
        $err = true;
        $errMsg = "Please Fill The Email Address";
    }else if(empty($phoneNb)){
        $err = true;
        $errMsg = "Please Fill The Phone Number";
    }else if(empty($pass)){
        $err = true;
        $errMsg = "Please Fill The Password";
    }else if(empty($repass)){
        $err = true;
        $errMsg = "Please Fill The Repassword";
    }else if(strlen($fName)<3){
        $err = true;
        $errMsg = "Full Name Must Be 3 Character";
    }
    else if(strlen($email)<8){
        $err = true;
        $errMsg = "Email Address Must Be 8 Character";
    }
    else if(strlen($phoneNb)<10){
        $err = true;
        $errMsg = "Phone Number Must Be 10 Character";
    }
    else if(strlen($orPass)<6){
        $err = true;
        $errMsg = "Password Must Be 6 Character";
    }
    else if(strlen($orRepass)<6){
        $err = true;
        $errMsg = "Re Password Must Be 6 Character";
    }else if($pass !== $repass){
        $err = true; 
        $errMsg =  "Password Are Not Matched";
    }else if(!is_numeric($phoneNb)){
        $err = true; 
        $errMsg =  "only number allows";
    }else {
        // insert the user 
        $userSqls = "select * from users where email = '$email'";
        $userQuerys = mysqli_query($conn,$userSqls);
       
        if(mysqli_num_rows($userQuerys)>0){
            $err = true;
            $errMsg = "This User Already Registered";
        }else{
            $userSql = "INSERT INTO `users` ( `fName`, `email`, `phone`, `pass`, `repass`) VALUES ('$fName', '$email', '$phoneNb', '$pass', '$repass')";
            $userQuery = mysqli_query($conn, $userSql);
            if($userQuery){
                $succ = true;
                $succMsg = "Account Created Successfully Please Login";
            }
        }
       
    }
}

?>
