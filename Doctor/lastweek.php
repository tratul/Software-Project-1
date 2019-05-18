<?php
session_start();
require_once('../../model/db.php');
$author = $_SESSION['login_email'];
$val = $_REQUEST['val'];
$sql = "select * from prescription where PrescriptionID = $val and DoctorEmail = '$author' and Date >= '$val'";
$res = get_result($sql);
while($row = mysqli_fetch_assoc($res))
{
    $patem = $row['PatientEmail'];
    $date = $row['Date'];
    $sql = "select Name from patient where Email = '$patem'";
    $res2 = get_result($sql);
    $row2 = mysqli_fetch_assoc($res2);
    $patname = $row2['Name'];
    echo $patname."||".$date;
    exit;
}
//echo "not found";
echo $sql;
?>