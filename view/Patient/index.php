<?php
  session_start();
   
  if (!(isset($_SESSION['login_email']))){
      header("location:../index.html");
  }

  $db=mysqli_connect("localhost","root","","carebookdb");
  //mysql_select_db("carebookdb");
  $email = $_SESSION['login_email'];
  $query=mysqli_query($db,"select * from prescription where PatientEmail  = '$email'");
  $rowcount = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CareBook</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
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
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <!-- </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.html">Notification</a>
          </li> -->
          <li class="nav-item dropdown active">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;">Notification</span></a>
             <ul class="dropdown-menu"></ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Archive.php">Archive</a>
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

   <!-- main table for home page -->
    <table class="homeTable" height="500px" width="100px" >
        <tr>
            <td id="slideCell" class="align-top">
              <div>
    					  <table class="table table-striped" id="table_data">
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
								<input type="number" placeholder="Prescription Id" id="presId" name="patientId" min='1'>
                <button type="button"  onclick="search()" class="btn btn-primary">Search</button>
							</div>
              <div style="pading-left:10%; height:16%">
        				<input type="date" name="Date"><a class="btn btn-primary" href="" role="button">Search</a>
        			</div>
        			<div style="pading:5%; height:16%">
        				<input type="text" placeholder="Doctor Name" name="Doctor">
                <button type="button"  onclick="DoctorSearch()" class="btn btn-primary">Search</button>
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
    <script>

    function search()
    {
      var value = document.getElementById('presId').value;
      console.log(value);
      var xhttp = new XMLHttpRequest();
      
        if(value == "")
          return false;
        var url = "search.php?val="+value;
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText;
            console.log(res);
              var table = document.getElementById('table_data');
              
              for(var i=table.rows.length-1; i>0; i--)
              {
                table.deleteRow(i);
              }
              $resArr = res.split('||');
              var row = table.insertRow(1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              cell1.innerHTML = $resArr[0];
              cell2.innerHTML = $resArr[1];
              console.log($resArr[1]);
              cell3.innerHTML = $resArr[2];
              cell4.innerHTML = "<a class='btn btn-primary' id='button' onclick='popup('../../storage/<?php echo $row['PDF'] ?>')'  href=# role='button'>View</a>";
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }


    function DoctorSearch()
    {
      var value = document.getElementById('presId').value;
      console.log(value);
      var xhttp = new XMLHttpRequest();
      
        if(value == "")
          return false;
        var url = "search1.php?val="+value;
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText;
            console.log(res);
              var table = document.getElementById('table_data');
              
              for(var i=table.rows.length-1; i>0; i--)
              {
                table.deleteRow(i);
              }
              $resArr = res.split('||');
              var row = table.insertRow(1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              cell1.innerHTML = $resArr[0];
              cell2.innerHTML = $resArr[1];
              console.log($resArr[1]);
              cell3.innerHTML = $resArr[2];
              cell4.innerHTML = "<a class='btn btn-primary' id='button' onclick='popup('../../storage/<?php echo $row['PDF'] ?>')'  href=# role='button'>View</a>";
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }



    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"fetch.php",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {
        $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0)
        {
         $('.count').html(data.unseen_notification);
        }
       }
      });
     }
     
     load_unseen_notification();
     
     /*$('#comment_form').on('submit', function(event){
      event.preventDefault();
      if($('#subject').val() != '' && $('#comment').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         $('#comment_form')[0].reset();
         load_unseen_notification();
        }
       });
      }
      else
      {
       alert("Both Fields are Required");
      }
     });*/
     
     $(document).on('click', '.dropdown-toggle', function(){
      $('.count').html('');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification();; 
     }, 5000);
     
    });
</script>

   

  </body>
    
</html>
