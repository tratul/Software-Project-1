<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CareBook</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/CareBookHomeStyle.css">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <a class="navbar-brand" href="#">CareBook</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="serial.php">Serial</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="SignUp.html">Mr/Ms</a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="../index.php">log Out</a>
          </li>
        </ul>
      </div>
    </nav>

  <div style="height: 500px; padding: 50px">
 <form class="form-horizontal" role="form" method="post" onsubmit="return submitValid()" action="../controler/Registration.php">
                <div  id="main">
                <div class="form-group">
                    <label for="firstName" >Patient Id:</label>
                      <input type="number" id="firstName" placeholder="Patient Id"  name="firstName" onblur="getFName()" >
                </div>
                <div class="form-group">
                    <label for="firstName" >Doctor Id:</label>
                      <input type="number" id="firstName" placeholder="Doctor Id"  name="firstName" onblur="getFName()" >
                </div>
                <div class="form-group">
                    <label for="firstName" >Amount:</label>
                      <input type="number" id="firstName" placeholder="Amount"  name="firstName" onblur="getFName()" >BDT
                </div>
                <input type="submit" name ="submit" value= "Add to serial">
                
        </div>
      </form>
  </div>
   
  </body>
    
</html>
