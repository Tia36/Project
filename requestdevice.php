<?php

include("data_class.php");

$userid=$_GET['userid'];
$deviceid=$_GET['deviceid'];





$obj=new data();
$obj->setconnection();
$obj->requestdevice($userid,$deviceid);

?>