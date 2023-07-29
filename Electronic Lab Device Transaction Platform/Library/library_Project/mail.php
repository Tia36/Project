<?php
	$to="ce19036@mbstu.ac.bd";
	$subject="I am emran";
	$msg="hello! 2nd test.";
	$from="From: csemb36@gmail.com";

	if(mail($to,$subject,$msg,$from)){
		echo "email sent.";

	}
	else{
		echo "not sent";
	}
?>