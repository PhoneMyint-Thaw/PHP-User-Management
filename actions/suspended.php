<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();

$id = $_GET['id'];
$suspend = $_GET['suspended'];

$table = new UsersTable(new MySQL());

if($suspend == 1){
    $table->suspend($id);
} else {
    $table->unsuspend($id);
}

HTTP::redirect("/admin.php");
