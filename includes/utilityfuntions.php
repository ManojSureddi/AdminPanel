<?php
function uniqueKeyGenerator($name,$salt){
	$temp=hash("SHA256",$salt.$name.$salt);
	$key=substr($temp,rand(0,strlen($temp)-6),6);
	return $key;
	}
?>