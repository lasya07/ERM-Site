<?php
include 'connect.php';
include 'header.php';
session_start();
session_destroy();
header('location: ../google_login/index.php')

?>