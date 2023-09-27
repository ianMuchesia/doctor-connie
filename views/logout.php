<?php


session_start();
unset($_SESSION['user_id']);
unset($_SESSION['name']);
session_abort();
header('Location:../doctor/views/login.php');