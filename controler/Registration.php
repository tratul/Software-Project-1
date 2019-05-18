<?php
  
  session_start();
  //$db = mysqli_connect("localhost","root","","carebook");
  
   if(isset($_POST['submit']))
		  {
		  
			   $_SESSION['firstName'] = $_POST['firstName'];
			   $_SESSION['lastName'] = $_POST['lastName'];
			   $_SESSION['email'] = $_POST['email'];
			   $_SESSION['phoneno'] = $_POST['phoneno'];
			   $_SESSION['birthDate'] = $_POST['birthDate'];
			   $_SESSION['password'] = $_POST['pass'];
			   $_SESSION['address'] = $_POST['address'];
			   $_SESSION['gender'] = $_POST['gender'];
			   /*$password2 = $_POST['password2'];*/
			   $user_type = $_POST['usertype'];
			   $_SESSION['usertype'] =$user_type;
			  

				  if($user_type == "Patient")
				  {
				  	header("location:../view/PatientSignUp.html");
				  }

				  elseif($user_type == "Doctor")
				  {
				  	header("location:../view/DoctorSignUp.html");
				  }
				  elseif($user_type == "Technation")
				  {
				  	header("location:../view/TechSignUp.html");
				  }
				  else
				  	echo "Error in user type";

			
				
		  }
		  else
		  	echo "error in adding";
		 
  
?>







