<?php
//fetch.php;
/*if(isset($_POST["view"]))
{*/
  session_start();
  $email = $_SESSION['login_email'];
 include("../../model/config.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE prescription SET comment_status=1 WHERE comment_status=0 and PatientEmail = '$email' ";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT * FROM prescription ORDER BY PrescriptionID DESC LIMIT 5";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["PDF"].'</strong><br />
     <small><em>'.$row["Date"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM prescription WHERE comment_status=0 and PatientEmail = '$email' ";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
//}
?>