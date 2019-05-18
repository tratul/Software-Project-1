<?php
  session_start();
   
  if (!(isset($_SESSION['login_email']))){
      header("location:../index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>CareBook</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/CareBookHomeStyle.css">
	<link rel="stylesheet" href="css/Volunteer.css">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #05d1ff;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #a3eeff;
}
</style>   
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <a class="navbar-brand" href="#">CareBook</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="profile.php"><?php echo $_SESSION['login_email']?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../controler/logout.php">log Out</a>
          </li>
        </ul>
      </div>
    </nav>
    <script type="text/javascript">
        
    </script>
    <form class="form-horizontal" role="form" method="post" action="details.php" enctype="multipart/form-data">
                <div  id="main">
                <div class="form-group">
                    <label for="Prescription" >Prescription Id:</label>
                      <input type="text" id="Prescription" placeholder="Prescription Id"  name="Prescription">
                </div>
            
                <input type="submit" name ="submit" value= "Search">
                
              </div>
      </form>
     

</body>
</html>