<?php
  
  session_start();
  $db = mysqli_connect("localhost","root","","carebookdb");
  
   if(isset($_POST['submit']))
		  {
		  		$id= $_REQUEST['id'];

			   $file = $_FILES["file"]["name"];
			   $tmp_name = $_FILES["file"]["tmp_name"];
			   $path = "../storage/".$file;
			   $file1 = explode(".", $file);
			   $ext = $file1[1];
			   $allowed = array("jpg","png","gif","pdf","PDF");

				  
				
				  if(in_array($ext, $allowed)){
			   		move_uploaded_file($tmp_name, $path);

			   		$email = $_SESSION['login_email'];

				 	$sql = "Update test_data set Document= '$file' where id = '$id' ";
		
					  mysqli_query($db , $sql);
					  header("location:../view/Technician/home.php");
					   
					 }
					 else
					 	 header("location:../view/Technician/home.php");
                      					 
			
				
		  }
		 
  
?>







