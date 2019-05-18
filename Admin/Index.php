<?php
session_start();
 require_once("../../model/db.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    	<meta charset="utf-8">
    	<title>admin-homepage</title>
    	<link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="../CSS/DoctorHomeStyle.css">
</head>
<body>
    	<nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      	<a class="navbar-brand" href="#">CareBook</a>
      
      	<button class="navbar-toggler toggler-example purple darken-3" type="button" 	data-toggle="collapse"data-target="#navbarSupportedContent41" aria-controls   ="navbarSupportedContent41" aria-expanded="false"
        	aria-label="Toggle navigation"><span class="white-text"><i class="fas fa-bars fa-1x"></i></span>
      	</button>

      	<div class="collapse navbar-collapse" id="navbarNav">
        	<ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminlist.php">Admins</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doctorlist.php">Doctors List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="patientlist.php">Patient List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">profile</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../../controler/logout.php">Logout</a>
              </li>
        	</ul>
      	</div>
    	</nav>
		<nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      
      	<button class="navbar-toggler toggler-example purple darken-3" type="button" 			data-toggle="collapse"
        			data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
        			aria-label="Toggle navigation"><span class="white-text"><i class="fas fa-bars fa-1x"></i></span>
      	</button>

      	<div id="nav1" align="left">
        	<ul class="navbar-nav ml-auto">
          		<li class="nav-item">
            		<a class="nav-link" href="index.php">Home</a>
          		</li>
          		<li class="nav-item">
            		<a class="nav-link" href="adminlist.php">Admins</a>
          		</li>
		  		    <li class="nav-item">
            		<a class="nav-link" href="doctorlist.php">Doctors List</a>
          		</li>
          		<li class="nav-item">
            		<a class="nav-link" href="patientlist.php">Patient List</a>
          		</li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">profile</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../../controler/logout.php">Logout</a>
              </li>

        	</ul>
      	</div>
    	</nav>
    <!----footer1 part start---->
    
    
        <table border="1" align="center">
            <tr>
                <th width="30%"><center>Name</center></th>
                <th width="40%"><center>Email</center></th>
                <th width="40%"><center>User type</center></th>
                <th width="50%"><center>Action</center></th>
            </tr>

        



            <?php

            $sql="select * from login where status= 'APPLIED'";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td>
                        <center>
                      <?php
                      $sql2 = "select Email from login where Email='".$row['Email']."'";
                      $email = get_result($sql2);
                      $email = mysqli_fetch_assoc($email);
                      echo $email['Email'];
                      ?>
                  	</center>
                    </td>
                    <td>
                        <center>
                        <?php
                            echo $row['Role'];
                        ?>
                    </center>
                    </td>

                    <td>
                        <center>
                        <form  method="post" action="indexdb.php?Email=<?=$row['Email']?>">
                            <input type = 'submit' class="button" name='accept' value='Accept'>
                            <input type = 'submit' class="button" name='reject' value='Reject'>
                        </form>
                    </center>
                    </td>

                </tr>
            <?php
            }

            ?>
        </table>





</body>
</html>
