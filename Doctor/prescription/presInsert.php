<?php 
	session_start();
	require_once('../../../model/db.php');

	if(isset($_POST['save']))
	{
		$pat = $_REQUEST['pat'];
		$sql = "insert into prescription (PatientEmail) values ('$pat')";
		$pres_id = exe_query_id($sql);
		$symRow = $_SESSION['sym_row'];
		$tesRow = $_SESSION['tes_row'];
		$medRow = $_SESSION['med_row'];
		
		for($i = 1; $i <= $symRow; $i++)
		{
			if(!empty($_POST['s_field_'.$i]))
			{
				$sql = "insert into symtoms_data (prescription_id, value) values ($pres_id, '".$_POST['s_field_'.$i]."')";
				$stat = exe_query($sql);
			}
			
			// echo $_POST['s_field_'.$i]."<br>";

		}
		for($i = 1; $i <= $tesRow; $i++)
		{
			if(!empty($_POST['t_field_'.$i]))
			{
				$sql = "insert into test_data (test_value, Prescription_Id) values ('".$_POST['t_field_'.$i]."', $pres_id)";
				$stat = exe_query($sql);
			}
			
			// echo $_POST['s_field_'.$i]."<br>";

		}
		for($i = 1; $i <= $medRow; $i++)
		{
			if(!empty($_POST['medicineName_'.$i]))
			{
				$morning= $afternoon = $evening = $night = null; 
				if(empty($_POST['morning_'.$i]))
					$morning = 0;
				else
					$morning = $_POST['morning_'.$i];
				if(empty($_POST['afternoon_'.$i]))
					$afternoon = 0;
				else
					$afternoon = $_POST['afternoon_'.$i];
				if(empty($_POST['evening_'.$i]))
					$evening = 0;
				else
					$evening = $_POST['evening_'.$i];
				if(empty($_POST['night_'.$i]))
					$night = 0;
				else
					$night = $_POST['night_'.$i];
				$sql = "insert into medicine_data (Prescription_Id, value, days, morning, afternoon, evening, night, comment) values ($pres_id, '".$_POST['medicineName_'.$i]."', ".$_POST['days_'.$i].", $morning, $afternoon, $evening, $night, '".$_POST['comment_'.$i]."')";
				$stat = exe_query($sql);
				
			}
			// echo $_POST['s_field_'.$i]."<br>";

		}
		$date = date('y-m-d');
		$author = $_SESSION['login_email']; 
		$sql = "update prescription set Date = '$date', DoctorEmail='$author' where prescriptionID = $pres_id";
		$stat = exe_query($sql);
		$stat = exe_query($sql);
		echo $sql."<br>".$stat;
		header('location: ../index.php');
	}elseif(isset($_POST['discard']))
	{
		header('location: ../index.php');
	}
	
?>