<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 

	$id = isset($_GET['id'])?$_GET['id'] : "";
	$stmt = $db->prepare("select * from inward where id=?");
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$row = $stmt->fetch();
	header('Content-Type:'.$row['mime']);
	echo $row['filedata'];
?>