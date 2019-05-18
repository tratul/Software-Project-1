<?php
session_start();
unset($_SESSION['pat_name']);
unset($_SESSION['pat_em']);
unset($_SESSION['pat_age']);
header("location: ../view/Doctor/prescription/prescription.php");
?>