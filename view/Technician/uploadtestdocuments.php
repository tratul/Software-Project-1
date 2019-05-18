<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Volunteer Home</title>
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
    <script type="text/javascript">
        
    </script>
    <!-----header part start----->
     <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo.png" width="70px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="upload test documents.php">Upload Test </a></li>
					<li><a href="profile.php">Profile</a></li>
                    <li><a href="../logout.php">Logout</a></li>
					
					
					
					
                </ul>
            </div>
			
			<div class="form">
                <form name="form1" method="post" action="uploadtestdocument.php">
				    <table>
                    <tr>
					<td><font size="5">Files</font></td>
					
					<td><center><input type="file" name="Name" value="" size="30"  /></center></td>
					</tr>
			<div class="submit">
					<table>
                    <tr>
					<td><center><button type="submit" style="color:#0073f7;" id="submit" name="submit">Submit</button></center></td>
                   </tr>
				   </div> 
			
				
				</table>
			
			
			
			
<div class="clr"></div>
	
     

</body>
</html>