<?php
  session_start();
   
  if (!(isset($_SESSION['login_email']))){
      header("location:../index.html");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CareBook</title>
  <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/CareBookHomeStyle.css">
  <link rel="stylesheet" href="../CSS/PatientHomeStyle.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-inverse bg-light">
    <a class="navbar-brand" href="#">CareBook</a>


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

  <?php

        session_start();
        require '../../model/Patient/config.php';
        $email = $_SESSION['login_email'];
    
        $heading=$summertext='';


            $statement="select * from patient where Email='$email'";
            $result = mysqli_query($conn, $statement);

           
                while($row = mysqli_fetch_assoc($result))
                {
                    
                     
                     $name=$row['Name'];
                     $email=$row['Email'];
                     $nid=$row['NID'];
                     $phone=$row['PhoneNo'];
                    
                    
                }
       /* $_SESSION['name']=$name;
        $_SESSION['email']=$email;
          $_SESSION['area']=$area;
        $_SESSION['phone']=$phone;*/
            
            mysqli_close($conn);
    ?>
     <fieldset>
    <legend><b>PROFILE</b></legend>
  <form>
    <br/>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><?php echo $name; ?></td>
      </tr>   
      <tr><td colspan="3"><hr/></td></tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo $email; ?></td>
      </tr>   
      <tr><td colspan="3"><hr/></td></tr>
      <tr>
        <td>NID</td>
        <td>:</td>
        <td><?php echo $nid; ?></td>
      </tr>   
      <tr><td colspan="3"><hr/></td></tr>
      <tr>
        <td>Phone</td>
        <td>:</td>
        <td><?php echo $phone; ?></td>
      </tr>   
      
    </table>  
        <hr/>
        <a href="edit_profileOW.php">Edit Profile</a>
  </form>
</fieldset> 

</body>
</html>
