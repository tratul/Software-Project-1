<?php
  $db=mysqli_connect("localhost","root","","carebookdb");
  //mysql_select_db("carebookdb");
  $query=mysqli_query($db,"select * from prescription");
  $rowcount = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CareBook</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/CareBookHomeStyle.css">
    <link rel="stylesheet" href="../CSS/PatientHomeStyle.css">
    <style type="text/css">
      .bg-modal{
        width:100%;
        height:100%;
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
      }
      .modal-content{
        width:800px;
        height: 600px;
        background-color: white;
        border-radius: 4px;
        text-align: center;
        position: relative;
      }
      .close{
        position: absolute;
        top:0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <a class="navbar-brand" href="#">CareBook</a>
      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <button class="navbar-toggler toggler-example purple darken-3" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
        aria-label="Toggle navigation"><span class="white-text"><i class="fas fa-bars fa-1x"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" >
            <a href="prescription.php">Go back to prescription</a>
          </li>
          
        </ul>
      </div>
    </nav>

   <!-- main table for home page -->
    <table class="homeTable" height="500px" width="100px" >
        <tr>
            <td id="slideCell" class="align-top">
              <div>
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
                      <td> jhb</td> <?php $x = $row["PDF"];?>
                      <td><a class="btn btn-primary" id="button" onclick="popup('../../storage/<?php echo $row["PDF"] ?>')"  href=# role="button">View</a></td>
                    </tr>
                    <?php } ?> 
                  <tbody>
                </table>
              </div>
            </td>
            <td id="formCell" class="align-top bg-info "  height="300px">

              <h3>Filter:</h3>

              <div style="pading-left:10%; height:16%">
                <input type="number" placeholder="Prescription Id" name="patientId" min='1'><a class="btn btn-primary" href="" role="button">Search</a>
              </div>
              <div style="pading-left:10%; height:16%">
                <input type="date" name="Date"><a class="btn btn-primary" href="" role="button">Search</a>
              </div>
              <div style="pading:5%; height:16%">
                <input type="text" placeholder="Doctor Name" name="Doctor"><a class="btn btn-primary" href="" role="button">Search</a>
              </div>
              <div style="pading:5%; height:16%">
                <select>
                  <option value="">-select-</option>
                  <option value="saab">Prescription</option>
                  <option value="mercedes">Report</option>
                </select> <a class="btn btn-primary" href="" role="button">Search</a>
              </div>
            </td>
        </tr>
    </table>

    <div class="bg-modal">
      <div class="modal-content">
        <div class="close">+</div>
        <div class="container">
          <div id="viewpdf"></div>
        </div>
      </div>
    </div>
    

    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/pdfobject.min.js"></script>
    <script>
        /*var viewer = $('#viewpdf');
        PDFObject.embed('sample.pdf', viewer);*/
        function popup(txt){
          document.querySelector('.bg-modal').style.display = "flex";
          var viewer = $('#viewpdf');
        PDFObject.embed(txt, viewer);
        }
    </script>
    <script type="text/javascript">
      /*document.getElementById('button').addEventListener("click", function() {
      document.querySelector('.bg-modal').style.display = "flex";
      });*/

      document.querySelector('.close').addEventListener("click", function() {
      document.querySelector('.bg-modal').style.display = "none";
      });
      
    </script>
   

  </body>
    
</html>
