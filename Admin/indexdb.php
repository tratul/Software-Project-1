<?php
session_start();
require_once("../../model/db.php");
if(isset($_POST["accept"]))
{
	$email = $_GET['Email'];
	$sql="update login set status='APPROVED' where Email='$email'";
	$status = exe_query($sql);
	header("location: index.php");
}
elseif(isset($_POST["reject"])) {
	$email = $_GET['Email'];
	$sql="update login set status='REJECT' where Email='$email'";
	$status = exe_query($sql);
	header("location: index.php");
}

?>