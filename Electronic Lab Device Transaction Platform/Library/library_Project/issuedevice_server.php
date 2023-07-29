<?php

include("data_class.php");

$device=$_POST['device'];
$userselect= $_POST['userselect'];
$getdate= date("d/m/Y");
$days= $_POST['days'];

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->issuedevice($device,$userselect,$days,$getdate,$returnDate);
