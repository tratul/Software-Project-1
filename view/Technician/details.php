<?php
	
	session_start();
	require_once('../../model/db.php');

	$id = $_POST['Prescription'];

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
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SignUp.html">Upload Test Documents</a>
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
    <script type="text/javascript">
        
    </script>
    Prescription id: <?=$id?>
    <table>
    	
    	<?php
    		$sql = "select * from test_data where Prescription_Id='$id'";
    		//echo $sql;
    		$res = get_result($sql);
    		while($row = mysqli_fetch_assoc($res))
    		{
    			?>
    			<tr>
    				<td><?=$row['Test_value']?></td>
    				<td>
    					<form class="form-horizontal" role="form" method="post" action="../../controler/TechInsert.php?id=<?=$row['id']?>" enctype="multipart/form-data">
    						 <input type="file" name="oldpdf">
				                <div style="pading:10%; height:16%; text-align: center">
				                  <input type="submit" name="submit" value='Submit'>
				                </div>
    					</form>
    				</td>
    			</tr>
    			<?php
    		}
    	?>
    </table>

</body>
</html>