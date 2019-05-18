<?php
session_start();
$id = $_REQUEST['id'];
require_once('../../../model/db.php');
$sql = "select * from prescription where PrescriptionID = $id";
$res = get_result($sql);
$row = mysqli_fetch_assoc($res);
$docmail = $row['DoctorEmail'];
$patemail = $row['PatientEmail'];
$date = $row['Date'];
$sql = "select * from doctor where Email = '$docmail'";
$res = get_result($sql);
$row = mysqli_fetch_assoc($res);
$docnamef = $row['firstName'];
$docnamel = $row['lastName'];   
$adress = $row['Address'];
$phoneno = $row['Phone'];
$sql = "select * from patient where Email = '$patemail'";
//echo $sql."<br>";
$res = get_result($sql);
$row = mysqli_fetch_assoc($res);
$patname = $row['Name'];
$patdob = $row['DoB'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prescription</title>
    <link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/autocomplete.css">
		<link rel="stylesheet" href="../../CSS/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../CSS/DoctorHomeStyle.css">
    <style>
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
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td {
        border: 1px solid #05d1ff;
        text-align: left;
        padding: 0px;
      }

      tr:nth-child(even) {
        background-color: #a3eeff;
      }
      .button {
        background-color: #0260f7;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>
<body>
	<!------------------- header part start------------------------->
   <nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <a class="navbar-brand" href="../index.php">CareBook</a>
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
        		<form action="../../controler/showPres.php" method="post">
        			<button type="submit" class="btn btn-primary btn-lg">Write prescription</button>
        		</form>
        	</li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mr X <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Parsonal Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Change Area</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="SignUp.html">Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
    <!------------------- header part end-------------------------> 
      <!------------------------------------ doctor info block--------------------------->
        <div class="full-wrapper prescription-bg">
            <div class="wrapper prescription-item">
               <div class="prescription-header">
                  <h2>Prescription</h2>
               </div>
               <div class="prescription1">
               	<?=$docnamef." ".$docnamel?> <br>
		        <?=$adress?> <br>
		        <?=$phoneno?><br>
                   
               </div> 
               <!-- doctor info block end-->
               <div class="prescription2">
                   
               </div> 
               <!-- prescription info block start-->
               <div class="prescription3">
               	   <div id="date_val">
               	   	<?=$date?>
               	   </div><br>
		           
		           <b>Prescription id:</b> <?=$id?><br>
                   
               </div> 
               <!-- prescription info block end-->
               <div class="clr"></div>

        
        <!--- patient info block-->
        <div class="patient1">
        	<table border="0" align="center">
            <form action="patientData.php" method="post">
				<tr>
					<td>Patient email:</td>
					<td> <?=$patemail?></td>
				 <td></td>
				</tr>
				<tr>
				<td>Patient Name:</td>
				<td><?=$patname?></td>
				<td></td>
			   </tr>
				<tr>
				 <td>DoB</td>
				 <td colspan="2"><?=$patdob?> </td>
				</tr>
				
				</form>
				
			
		   </table>
                   
               </div>  
            
               <!-- patient info block end-->
               <div class="clr"></div>

               <!--- main prescription info block-->
        	
							 
              <table>
								
              	<tr>
              		<td>
              			<table>
              				<tr>
              					<td>
              						<div class="mainp2">
                                          <b>Symtoms:</b>
                                          <table>
                                        <?php
                                            $sql = "select * from symtoms_data where prescription_id = $id";
                                            $res = get_result($sql);
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                            <tr>
                                                <td><?=$row['value']?></td>
                                            </tr>
                                        <?php
                                            }  
                                          
                                        ?>
                                        </table>
                                    </div>             					
                                </td>
              				</tr>
              				<tr>
              					<td>
              						<div class="mainp3">
                                          <b>Tests:</b>
                                          <table>
                                          <?php
                                            $sql = "select * from test_data where prescription_id = $id";
                                            $res = get_result($sql);
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                            <tr>
                                                <td><?=$row['Test_value']?></td>
                                                <td>
                                                        <input type="button" value="View result" class="button" onclick="popup('../../../storage/<?php echo $row["Document"] ?>')" name='view'>
                                                    
                                                </td>
                                            </tr>
                                        <?php
                                            }  
                                          
                                        ?>      
                                        </table>                         
                                    </div>	
              					</td>
              				</tr>
              			</table>
              		</td>
              		<td>
              			<div class="mainp4" id="medicine_block">
		             		<table id="med_table">
		             		<?php
                                $sql = "select * from medicine_data where prescription_id = $id";
                                $res = get_result($sql);
                                while($row = mysqli_fetch_assoc($res))
                                {
                            ?>
                                <tr>
                                    <td><?=$row['value']?></td>
                                    <td><?=$row['days']?> days</td>
                                </tr>
                                <tr>
                                    <td><?=$row['morning']?>-<?=$row['afternoon']?>-<?=$row['evening']?>-<?=$row['night']?></td>
                                    <td><?=$row['comment']?></td>
                                </tr>
                            <?php
                                }  
                                
                            ?>    
		             		</table>
		             		
						</div>
              		</td>
              	</tr>
              </table>
             <div id="footer_block">
             	
		
				
	
	
	</div>
	<div id="action_block">
		
		<tr><td>
            <br>
			    <!-- <input type="submit" class="btn btn-danger" name="Edit" value="Edit"> -->
		</td>
		</tr>
		</form>
	</div>
  <div class="bg-modal">
      <div class="modal-content">
        <div class="close">+</div>
        <div class="container">
          <div id="viewpdf"></div>
        </div>
      </div>
    </div>
    <script src="../../JS/jquery.min.js"></script>
    <script src="../../JS/pdfobject.min.js"></script>
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
	<!-- <script src="pres.js"></script> -->
</body>
</html>