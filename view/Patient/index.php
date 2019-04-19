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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.html">Notification</a>
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

   <!-- main table for home page -->
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

    </body>
</html>
