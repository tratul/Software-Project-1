<?php
    require_once('../../../model/db.php');
    $sql = "select value from medicines";
    $res = get_result($sql);
    $values = array();
    while($row = mysqli_fetch_assoc($res))
    {
        // echo $row['value'];
    	array_push($values, $row['value']);
    }
    echo implode("||", $values);
?>