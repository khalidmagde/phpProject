<?php

session_start();
require "lib.php";

if(empty($_SESSION['user'])){
    header("LOCATION: login.php");
}


$userid = $_SESSION['user']['id'];
if($userid == $_GET['id']){
    echo "you permission is invalid";
    //header("LOCATION: index.php");
}else{
    $res = delete($_GET['id']);

    if($res == true){
        header("LOCATION: index.php");
}

}

