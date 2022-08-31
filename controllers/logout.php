<?php
include_once '../helpers/http.php';

session_start();
session_unset();
session_destroy();
//redirect to login page
redirect('../views/login.php');
?>