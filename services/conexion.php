<?php 

function conectar(){

	$con = new mysqli('localhost','root','','coomotranstur');
	mysqli_set_charset($con,"utf8");

	if ($con->connect_errno) {
		print "Ocurrió un error: ".$con->connect_error;
	}
	return $con;
}
?>