<?php
session_start();
require_once('../../model/db.php');
$author = $_SESSION['login_email'];
$val = $_REQUEST['val'];
$sql = "select * from prescription where PrescriptionID = $val and  PatientEmail  = '$author'";
//echo $sql;
$res = get_result($sql);
while($row = mysqli_fetch_assoc($res))
{
    $patem = $row['DoctorEmail'];
    $id = $row['PrescriptionID'];
    $title = $row['PDF'];
    $sql = "select * from doctor where Email = '$patem'";
    $res2 = get_resultfirstName($sql);
    $row2 = mysqli_fetch_assoc($res2);
    $docname = $row2['firstName'];
    echo $id."||".$title."||".$docname;
    exit;
}
echo "not found";


?>