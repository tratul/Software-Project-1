<?php
session_start();
require_once('../../../model/db.php');
if(isset($_POST['pat_search'])){
	$id = $_POST['patientId'];
	$sql = "select * from patient where Email='$id'";
	$res = get_result($sql);
	$row = mysqli_fetch_assoc($res);
	$_SESSION['pat_name'] = $row['Name'];
	$_SESSION['pat_em'] = $id;
	$dob = $row['DoB'];
	$currentdate = date('Y-m-d');
    $arr =  datechk($date, $currentdate);
    $_SESSION['pat_age']= $arr['year'];
	header('location: prescription.php');
}elseif(isset($_POST['history'])){
	//echo "asce";
	$id = $_POST['patientId'];
	header("location: patArchive.php?id=".$id);
}

function datechk($date1, $date2)
{
    $dec = strtotime($date1) - strtotime($date2);
    $diff = abs($dec);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if($dec < 0)
        $dec = '-';
    else 
        $dec = '+';
    $diffarr = array('year'=>$years, 'month'=>$months, 'day'=>$days, 'flag'=>$dec);
    //printf("%d years, %d months, %d days\n", $years, $months, $days);
    return $diffarr;
}
?>