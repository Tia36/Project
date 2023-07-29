<?php
include("data_class.php");

$deletedeviceid=$_GET['deletedeviceid'];


$obj=new data();
$obj->setconnection();
$obj->deletedevice($deletedeviceid);