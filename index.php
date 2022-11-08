<?php
session_start();
require "lib.php";

if(empty($_SESSION['user'])){
    header("LOCATION: login.php");
}

$userrole = userRole();//1 OR 2 Go to index design

 $data = AllData();

 /* echo '<pre>';
 print_r($data); */

 require "design/index.php";
