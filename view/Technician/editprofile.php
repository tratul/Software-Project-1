
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/admin.css">
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


         <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
               <center><h2>Edit Profile</h2></center>
            
            </div>
            
            <div class="form">
                <form name="form1" method="post" action="editProfile.php">
                    
			<table border="1" align='center'>
				<tr>
					<td colspan='3' align='center' height='70px'><b><font size="5">PERSON PROFILE</font></ </td>

				</tr>
				<tr>
					<td>Name </td>
					<td><input type="text" name="Name" value="" size="30"  /></td>
					<td width='70px'></td>
				</tr>
				<tr>
					<td>PhoneNo </td>
					<td><input type="text" name="PhoneNo" value="" size="30"  /></td>
					<td></td>
				</tr>
				<tr>
					<td>Area </td>
					<td>
						<input type="text" name="area" value="" /></td>
					<td></td>
				</tr>
				<form method="post" action=<?="editProfile.php"?>>
                    
                    </table>
					<td><center><button type="submit" style="color:#0073f7;" id="submit" name="submit">Update</button></center></td>
                    
					
                </form>
                
            </div>
        </div>
    </div>
</body>
