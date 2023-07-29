<?php
//addserver_page.php
include("data_class.php");



$devicename=$_POST['devicename'];
$devicequantity=$_POST['devicequantity'];
$devicecategory=$_POST['devicecategory'];


if (move_uploaded_file($_FILES["devicephoto"]["tmp_name"],"uploads/" . $_FILES["devicephoto"]["name"])) {

    $devicepic=$_FILES["devicephoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->adddevice($devicepic,$devicename,$devicequantity,$devicecategory);
  } 
  else {
     echo "File not uploaded";
  }