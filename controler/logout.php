<?php
session_start();
Session_destroy();
header("location:../view/index.html");

?>