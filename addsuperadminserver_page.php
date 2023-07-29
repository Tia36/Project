<?php

include("data_class.php");

$addnames=$_POST['addname'];

$addemail= $_POST['addemail'];
$addpass= $_POST['addpass'];
//$type= $_POST['type'];
if (move_uploaded_file($_FILES["addphoto"]["tmp_name"],"uploads/" . $_FILES["addphoto"]["name"])) {

    $addpic=$_FILES["addphoto"]["name"];



$obj=new data();
$obj->setconnection();
$obj->addnewadmin($addnames,$addemail,$addpass,$addpic);
  } 
  else {
     echo "File not uploaded";
  }
