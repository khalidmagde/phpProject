<?php
session_start();

if(!empty($_SESSION['user'])){
    header("LOCATION: index.php");
}

include "lib.php";

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $newpassword = hash_pass($password);

    $userdata = login($email , $newpassword);

    if(!empty($userdata)){
        $_SESSION['user'] = $userdata;//بيانات كلها بتا اللوجن تم تخزينها في اللسيشن عشانا استخدمها في كل الصفح عادي من خلال استدعاء السشن

        header("LOCATION: index.php");
    }else{
        echo "invalid user and password";
    }
}

require "design/login.html";