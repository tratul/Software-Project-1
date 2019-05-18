<?php 
	echo $_GET['srow'];
	$slen = $_GET['srow'];
	for($i = 1; $i<=$slen; $i++)
	{
		echo $_POST['s_field_'.$i];
	}
?>