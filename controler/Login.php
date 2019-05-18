<?php
require '../model/config.php';
session_start();



        if (isset($_POST['submit']))
        {
        	$email=$_POST['email'];
			$pw=$_POST['password'];
			$_SESSION['login_email'] = $email;
			$sql1= "  select * from login where Email='$email' and Password='$pw' AND Role='Patient' ";
			$result1=mysqli_query($conn , $sql1);
			$count1=mysqli_num_rows($result1);
					
			if($count1 == 1)
			{      
		      
					header("location:../view/Patient/index.php");						
			}else{
				$sql1= "  select * from login where Email='$email' and Password='$pw' AND Role='Doctor' ";
				$result1=mysqli_query($conn , $sql1);
				$count1=mysqli_num_rows($result1);
						
				if($count1 == 1)
				{      
			      
						header("location:../view/Doctor/index.php");						
				}
				else
				{
					$sql1= "  select * from login where Email='$email' and Password='$pw' AND Role='Technation' ";
					$result1=mysqli_query($conn , $sql1);
					$count1=mysqli_num_rows($result1);
							
						if($count1 == 1)
						{      
					      
								header("location:../view/Technician/home.php");						
						}
				}
			}
		}	
         else
        {
            echo "User Name or Password is empty !!!!";
        }
          

 ?>