<?php
session_start();
require_once('../../model/db.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CareBook</title>
    <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/DoctorHomeStyle.css">
    <style>
    
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
            <a class="nav-link" href="../../controler/logout.php">Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <form> 
        <input type="text" name="search" id="search1" placeholder="write prescription id">
        <div id='notfound'></div>
        <input type="button" value="Search" class="button" onclick="searchPres()">
        Today <input type="radio" name="date" id="date1" onclick="today()">
        
      </form>
    </div>
    
  <div class="">
  <table id="table1">
      <?php
          $author = $_SESSION['login_email'];
          $sql = "select * from prescription where 	DoctorEmail = '$author' order by PrescriptionID desc";
          //echo $sql;
          $res = get_result($sql);
          while($row = mysqli_fetch_assoc($res))
          {
            //print_r($row);
            $sql2 = "select Name from patient where Email = '".$row['PatientEmail']."'";
            //echo $sql2;
            $res2 = get_result($sql2);
            $row2 = mysqli_fetch_assoc($res2);
      ?>
        <tr>
          <td><?=$row2['Name']?></td>
          <td><?=$row['Date']?></td>
          <td>
            <form action="prescription/viewPres.php?id=<?=$row['PrescriptionID']?>" method='post'>
              <button type="submit" class='button'>View</button>
            </form>
          </td>
        </tr>
      <?php
          }
      ?>
    </table>
  </div>
   <script>

    function today()
    {
      var table = document.getElementById('table1');
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd;
              
      for(var i=table.rows.length-1; i>=0; i--)
      {
        table.deleteRow(i);
      }
      var xhttp = new XMLHttpRequest();
      var url = "today.php?val="+today;
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText;
            console.log(res);
            if(res == "not found")
            {
              document.getElementById('notfound').innerHTML = "No prescription has found.";
            }else{
              var table = document.getElementById('table1');
              
              for(var i=table.rows.length-1; i>=0; i--)
              {
                table.deleteRow(i);
              }
              $resArr = res.split('||');
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = $resArr[0];
              cell2.innerHTML = $resArr[1];
              console.log($resArr[1]);
              cell3.innerHTML = "<form action='prescription/viewPres.php?id="+$resArr[2]+"' method='post'> <button type='submit' class='button'>View</button></form>";
            }
          }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    // function lastweek()
    // {
    //   var table = document.getElementById('table1');
    //   var days = 7; // Days you want to subtract
    //   var date = new Date();
    //   var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
    //   var day =last.getDate();
    //   var month=last.getMonth()+1;
    //   var year=last.getFullYear();

    //   today = year + '-' + month + '-' + day;
              
    //   for(var i=table.rows.length-1; i>=0; i--)
    //   {
    //     table.deleteRow(i);
    //   }
    //   var xhttp = new XMLHttpRequest();
    //   var url = "lastweek.php?val="+today;
    //     xhttp.onreadystatechange = function() {
    //       if (this.readyState == 4 && this.status == 200) {
    //         var res = this.responseText;
    //         console.log(res);
    //         if(res == "not found")
    //         {
    //           document.getElementById('notfound').innerHTML = "No prescription has found.";
    //         }else{
    //           var table = document.getElementById('table1');
              
    //           for(var i=table.rows.length-1; i>=0; i--)
    //           {
    //             table.deleteRow(i);
    //           }
    //           $resArr = res.split('||');
    //           var row = table.insertRow(0);
    //           var cell1 = row.insertCell(0);
    //           var cell2 = row.insertCell(1);
    //           var cell3 = row.insertCell(2);
    //           cell1.innerHTML = $resArr[0];
    //           cell2.innerHTML = $resArr[1];
    //           console.log($resArr[1]);
    //           cell3.innerHTML = "<form action='prescription/viewPres.php?id="+val+"' method='post'> <button type='submit' class='button'>View</button></form>";
    //         }
    //       }
    //     };
    //     xhttp.open("GET", url, true);
    //     xhttp.send();
    // }
     function searchPres()
     {
        console.log('search');
        var xhttp = new XMLHttpRequest();
        var val = document.getElementById('search1').value;
        if(val == "")
          return false;
        console.log(val);
        var url = "search.php?val="+val;
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText;
            console.log(res);
            if(res == "not found")
            {
              document.getElementById('notfound').innerHTML = "No prescription has found with this id.";
            }else{
              var table = document.getElementById('table1');
              
              for(var i=table.rows.length-1; i>=0; i--)
              {
                table.deleteRow(i);
              }
              $resArr = res.split('||');
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = $resArr[0];
              cell2.innerHTML = $resArr[1];
              console.log($resArr[1]);
              cell3.innerHTML = "<form action='prescription/viewPres.php?id="+val+"' method='post'> <button type='submit' class='button'>View</button></form>";
            }
          }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
     }
   </script>

  </body>
</html>
