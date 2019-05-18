
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
            <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Serial</a>
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

  <table class="homeTable" height="500px" width="100px" >
      <tr>
          <td id="slideCell" class="align-top">
            <div >
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Patient Name</th>
                   
                  </tr>
                </thead>
                <tbody>
               
                  <tr>
                    <td scope="row">1</td>
                    <td>abcd</td>
                  </tr>
                  <tr>
                    <td scope="row">2</td>
                    <td>abcd</td>
                  </tr>
                
                </tbody>
              </table>
            </div>
          </td>
         <!--  <td id="formCell" class="align-top "  height="300px">
            <form>
              <h2>Upload Old pdf:</h2>

              <div style="pading-left:10%; height:16%">
                <input type="file" name="oldpdf">
                <div style="pading:10%; height:16%; text-align: center">
                  <a class="btn btn-primary" href="" role="button">Upload</a>
                </div>
              </div>
              <div style="pading:5%; height:16%">
                <input type="text" name="">
              </div>
            </form>  
          </td> -->
      </tr>
  </table>
</body>
</html>
