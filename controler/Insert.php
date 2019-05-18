<?php
  
  session_start();
  $db = mysqli_connect("localhost","root","","carebookdb");
  
   if(isset($_POST['submit']))
		  {
		  	   $firstName = $_SESSION['firstName'];
			   $lastName = $_SESSION['lastName'];
			   $email = $_SESSION['email'];
			   $phoneno = $_SESSION['phoneno'];
			   $birthDate = $_SESSION['birthDate'];
			   $password = $_SESSION['password'];
			   $address = $_SESSION['address'];
			   $gender = $_SESSION['gender'];
			   $usertype = $_SESSION['usertype'];


			   $file = $_FILES["file"]["name"];
			   $tmp_name = $_FILES["file"]["tmp_name"];
			   $path = "../storage/".$file;
			   $file1 = explode(".", $file);
			   $ext = $file1[1];
			   $allowed = array("jpg","png","gif","JPG");

				  
				if($usertype == "Patient")  
				  {

				  if(in_array($ext, $allowed)){
			   		move_uploaded_file($tmp_name, $path);

			   		$nid = $_POST['nid'];


				 $sql = "INSERT INTO patient(Email,Name,DoB,Gender,PhoneNo,NID,Address,Image) VALUES('$email','$firstName','$birthDate','$gender','$phoneno','$nid','$address','$file')";
		
					  mysqli_query($db , $sql);

					  $sql1 = "INSERT INTO login ( Email,Role,Password) VALUES( '$email','$usertype','$password')";
		
					  mysqli_query($db , $sql1);
					  Session_destroy();
					  header("location:../view/index.html");
					   
					 }
					 else
					 	 header("location:../view/PatientSignUp.html");
                      
					  
					}
				  
				  
				  elseif($usertype == "Doctor")  
				  {
				  	//echo "found";
				  	 if(in_array($ext, $allowed)){
			   		move_uploaded_file($tmp_name, $path);

				  	$nid = $_POST['nid'];
				  	$bmdc = $_POST['bmdc'];

				  


				 $sql = "INSERT INTO doctor(Email,firstName,lastName,DoB,Gender,BMDC,NIDNo,Phone,Address,Image) VALUES( '$email','$firstName','$lastName','$birthDate','$gender','$bmdc','$nid','$phoneno','$address','$file')";
		
					  mysqli_query($db , $sql);

					  $sql1 = "INSERT INTO login ( Email,Role,Password) VALUES( '$email','$usertype','$password')";
		
					  mysqli_query($db , $sql1);
					  Session_destroy();
					  header("location:../view/index.html");
                      
					  
					}
					else
					 	 header("location:../view/DoctorSignUp.html");
				}
				elseif($usertype == "Technation")  
				  {
				  	//echo "found";
				  	 if(in_array($ext, $allowed)){
			   		move_uploaded_file($tmp_name, $path);

				  	$center = $_POST['center'];
				  	

				  


				 $sql = "INSERT INTO technician(Email,Name,DoB,Gender,CenterNo,Address,Image) VALUES( '$email','$firstName','$birthDate','$gender','$center','$address','$file')";
		
					  mysqli_query($db , $sql);

					  $sql1 = "INSERT INTO login ( Email,Role,Password) VALUES( '$email','$usertype','$password')";
		
					  mysqli_query($db , $sql1);
					  Session_destroy();
					  header("location:../view/index.html");
                      
					  
					}
					else
					 	 header("location:../view/TechSignUp.html");
				}
				else
					echo "error in adding";
			
				
		  }
		 
  
?>







