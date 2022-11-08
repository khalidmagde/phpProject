<?php

function register($username , $email , $password , $img){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = "INSERT INTO `user`(`name`,`email`,`password` , `img`) VALUES ('$username' , '$email' , '$password' , '$img' )";
    mysqli_query($conn,$sql);
   $res = mysqli_affected_rows($conn);

   if ($res == 1){
    return true;

   }else
   {return false;}
}

function login($email , $password){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = "SELECT * FROM `user` WHERE `email` ='$email' AND `password` = '$password' ";
   $myq = mysqli_query($conn,$sql);
   $res = mysqli_fetch_assoc($myq);

   return $res;

}

function AllData(){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = ("SELECT `id` , `name` , `email`, `img` FROM `user`");
   $myq = mysqli_query($conn,$sql);
   $data = [];
   while($res = mysqli_fetch_assoc($myq)){
      $data[] = $res;
   }

   return $data;
}

function delete($id){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = "DELETE FROM `user` WHERE `id` = $id";
    mysqli_query($conn,$sql);
   $res = mysqli_affected_rows($conn);

   if ($res == 1){
    return true;

   }else
   {return false;}
}
function update($id,$name,$email,$password,$img){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = "UPDATE `user` SET ";
   if(!empty($name)){
      $sql .= ", `name` = $name";
   }
   if(!empty($email)){
      $sql .= ", `email` = $email";
   }
   if(!empty($password)){
      $newpass = hash_pass($password);
      $sql .= ", `password` = $newpass";
   }
   if(!empty($img)){
      $sql .= ", `img` = $img";
   }
   $sql .= ", WHERE `id` = $id";

  echo $sql;die;
    mysqli_query($conn,$sql);
   $res = mysqli_affected_rows($conn);
   

   if ($res == 1){
    return true;

   }else
   {return false;}
}

function getUserbyid($id){
   $conn = mysqli_connect("localhost", "root" , "" , "first_pro");
   $sql = ("SELECT `id` , `name` , `email`, `img` FROM `user` WHERE `id` = $id");
   $myq = mysqli_query($conn,$sql);
   $res = mysqli_fetch_assoc($myq);
      return $res;
   
   
}

function hash_pass($password){
   return sha1($password);
}

function userRole(){
   return $_SESSION['user']['user_role'];
}

