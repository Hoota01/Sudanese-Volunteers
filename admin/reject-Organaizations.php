<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Organizations using id and redirect
	$sql = "UPDATE Organizations SET active='0' WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: Organaizations.php");
		exit();
	} else {
		echo "Error";
	}
}