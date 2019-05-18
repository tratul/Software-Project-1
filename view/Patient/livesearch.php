<?php

include('../../model/config.php');


$q=$_GET["q"];

$result=mysqli_query($conn,"SELECT PrescriptionID, PDF FROM prescription where  PrescriptionID=1 ");

$rows=mysqli_num_rows($result);
if ($rows> 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<p><a href='#' class='leftborder'><b>".$row['PDF']."</b></a></p>";
    }

}
else
{
    echo "No post found according to this search term";
}