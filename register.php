<?php
session_start();

if(!empty($_SESSION['user'])){
    header("LOCATION: index.php");
}
require "lib.php";

if(isset($_POST['username'])){

    $tmp = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    $imgname = $_FILES['img']['name'];
    $username = $_POST['username'];//khalid
    $email = $_POST['email'];//klood@gamil
    $password = $_POST['password'];//123
    $typeofar = explode("/",$type);
    $ext = $typeofar[1];
    $imgfullname = $username.".".$ext;
    

    $newpassword = hash_pass($password);

   $re =  register($username , $email , $newpassword , $imgfullname);
   if ($re == true){
    move_uploaded_file($tmp,'userimg/'.$username.".".$ext);
    echo "user added succsuflly";
   }else{
    echo "failed adedd";
   }
}

include "design/register.html";

