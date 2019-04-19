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
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notofication</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Archive.php">Archive</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="SignUp.html">Mr/Ms</a>
        </li>
    <li class="nav-item active">
          <a class="nav-link" href="SignUp.html">log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <?php

        require '../../model/Patient/config.php';
        //$id = $_SESSION['id'];
    
        $heading=$summertext='';


            $statement="select * from userinfo where id='$id'";
            $result = mysqli_query($conn, $statement);

           
                while($row = mysqli_fetch_assoc($result))
                {
                    
                     
                     $name=$row['name'];
                    
                     $email=$row['email'];
                     $area=$row['area'];
                     $phone=$row['phone'];
                    
                    
                }
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
          $_SESSION['area']=$area;
        $_SESSION['phone']=$phone;
            
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
        <td>Area</td>
        <td>:</td>
        <td><?php echo $area; ?></td>
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
