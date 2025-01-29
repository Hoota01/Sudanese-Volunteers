<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM posts WHERE id_jobpost='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM apply_post WHERE id_jobpost='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: active-voluntree_Opportunities.php");
		exit();
	} else {
		echo "Error";
	}
}