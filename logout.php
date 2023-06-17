<?php
include_once("connect.php");
session_start();
unset($_SESSION['email']);
unset($_SESSION['user_name']);
header("location:index.php");
?>