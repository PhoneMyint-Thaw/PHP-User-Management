<?php

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();


$name = $_FILES['photo']['name'];
$error = $_FILES['photo']['error'];
$type = $_FILES['photo']['type'];
$tmp = $_FILES['photo']['tmp_name'];

$table = new UsersTable(new MySQL());

if($error){
    HTTP::redirect('/profile.php', 'error=file');
};

if ($type === "image/jpeg" or $type === "image/png"){
    $table->updatePhoto($auth->id, $name);
    move_uploaded_file($tmp, "photos/$name");

    $auth->photo = $name;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect('/profile.php', 'error=type');
}

