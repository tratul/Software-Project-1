<?php
  
  session_start();
  $db = mysqli_connect("localhost","root","","carebookdb");
  
   if(isset($_POST['submit']))
		  {
		  	   $Demail = $_POST['doctorEmail'];
		  	   $date = $_POST['date'];

		  	 
			   $file = $_FILES["file"]["name"];
			   $tmp_name = $_FILES["file"]["tmp_name"];
			   $path = "../storage/".$file;
			   $file1 = explode(".", $file);
			   $ext = $file1[1];
			   $allowed = array("jpg","png","gif","pdf","PDF");

				  
				
				  if(in_array($ext, $allowed)){
			   		move_uploaded_file($tmp_name, $path);

			   		$Pemail = $_SESSION['login_email'];

				 	$sql = "INSERT INTO prescription(PatientEmail,OldPDF,Date,DoctorEmail) VALUES('$Pemail','$file','$date','$Demail')";
		
					  mysqli_query($db , $sql);
					  header("location:../../view/Patient/Index.php");
					   
					 }
					 else
					 	 header("location:../../view/Patient/Archive.php");
                      					  
					
				  
				else
					echo "error in adding";
			
				
		  }
		 
  
?>







