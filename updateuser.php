<?php

session_start();
require "lib.php";

if(empty($_SESSION['user'])){
    header("LOCATION: login.php");
}

if(isset($_POST['username'])){
    $id = $_POST['id'];
    $username = $_POST['username'];//khalid
    $email = $_POST['email'];//klood@gamil
    $password = $_POST['password'];//123
    //img
    echo "<pre>";
    if(!empty($_FILES['img']['tmp_name'])){
    $tmp = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    $imgname = $_FILES['img']['name'];
    $typeofar = explode("/",$type);
    $ext = $typeofar[1];
    $imgfullname = $username.".".$ext;
    move_uploaded_file($tmp , "userimg/".$imgfullname);

    
    }else{
        $imgfullname = '';
    }
   // update($id,$username,$email,$password,$imgfullname);
  $res= update($id,$username,$email,$password,$imgfullname);
  if($res == true){
    header("LOCATION:index.php");

  }

}else{
    $userid = $_GET['id'];//id =7

 $userdata = getUserbyid($userid);

}






require "design/update.php";