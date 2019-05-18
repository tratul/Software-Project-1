
<?php
session_start();
   
  if (!(isset($_SESSION['login_email']))){
      header("location:../index.html");
  }
$db=mysqli_connect("localhost","root","","carebookdb");
$email = $_SESSION['login_email'];
$query=mysqli_query($db,"select * from prescription where PatientEmail = '$email'");
$rowcount = mysqli_num_rows($query);

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
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Archive</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php"><?php echo $_SESSION['login_email']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../controler/logout.php">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <table class="homeTable" height="500px" width="100px" >
      <tr>
          <td id="slideCell" class="align-top">
            <div >
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">AUTHOR</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                <?php for($i=1; $i<=$rowcount; $i++) { 
                  $row =mysqli_fetch_array($query);

                ?>
                  <tr>
                    <td scope="row"><?php echo $row["PrescriptionID"] ?></td>
                    <td><?php echo $row["PDF"] ?></td>
                    <td> jhb</td>
                    <td><a class="btn btn-primary" href="../../storage/<?php echo $row["PDF"] ?>" role="button">View</a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </td>
          <td id="formCell" class="align-top "  height="300px">
            <form class="form-horizontal" role="form" method="post" action="../controler/PatientController/Insert.php" enctype="multipart/form-data">
              <h2>Upload Old pdf:</h2>

              <div style="pading-left:10%; height:16%">
                <input type="file" name="oldpdf">
                <div style="pading:10%; height:16%; text-align: center">
                  <a class="btn btn-primary" href="" role="button">Upload</a>
                </div>
              </div>
              <div style="pading:5%; height:16%">
                <input type="text" name="doctorEmail" placeholder="Doctor Email">
              </div>
              <div style="pading:5%; height:16%">
                <input type="date" name="date">
              </div>
              <input type="submit" name="submit" value="submit">
            </form>  
          </td>
      </tr>
  </table>
</body>
</html>
