<?php
  
  session_start();
  //$db = mysqli_connect("localhost","root","","carebook");
  
   if(isset($_POST['submit']))
		  {
		  
			   /*$_SESSION['name'] = $_POST['fullname'];
			   $_SESSION['email'] = $_POST['email'];
			   $_SESSION['phone'] = $_POST['phone'];
			   $_SESSION['area'] = $_POST['area'];
			   $_SESSION['password'] = $_POST['password'];*/
			   //$password2 = $_POST['password2'];
			   $user_type = $_POST['usertype'];
			   $_SESSION['usertype'] =$user_type;
			   /*$_SESSION['check']=0; 
			   $_SESSION['check1']=0;*/ 
				  
				  
				  
			   /*if($password == $password2)
				  {
				 $sql = "INSERT INTO userinfo ( name, email, area,user_type, phone, password) VALUES( '$name','$email','$area','$user_type','$phone','$password')";
		
					  mysqli_query($db , $sql);
					  header("location:login.html");
                      
					  
					  }
				  
				  
				  else{
					  
					  echo "passwords are not matched please try again!!!!";
				  }*/

				  if($user_type == "Patient")
				  {
				  	header("location:../view/PatientSignUp.html");
				  }

				  if else($user_type == "Doctor")
				  {
				  	header("location:../view/DoctorSignUp.html");
				  }
				  if else($user_type == "Technation")
				  {
				  	header("location:../view/TechSignUp.html");
				  }
			
				
		  }
		  else
		  	echo "error in adding";
		 
  
?>







