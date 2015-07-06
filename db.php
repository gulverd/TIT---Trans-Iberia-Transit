<?php
	
	$conn = mysqli_connect('localhost','root','','trans');

	if($conn){
		//echo 'connected!';
	}else{
		echo "Something goes wrong";
	}