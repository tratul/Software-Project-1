<?php
    session_start();
    // if(!isset($_REQUEST['srow']) || !isset($_REQUEST['trow']) || !isset($_REQUEST['mrow']))
    // {
    //     header("location: prescription.php");
    //     exit;
    // }

    $_SESSION['sym_row'] = $_REQUEST['srow'];
    $_SESSION['tes_row'] = $_REQUEST['trow'];
    $_SESSION['med_row'] = $_REQUEST['mrow'];
    echo "success";
?>