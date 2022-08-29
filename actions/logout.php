<?php 

include("../vendor/autoload.php");

use Helpers\HTTP;

session_start();

unset($_SESSION['users']);

HTTP::redirect("/index.php");



