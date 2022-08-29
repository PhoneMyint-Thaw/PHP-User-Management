<?php
    include("vendor/autoload.php");

    use Helpers\Auth;

    $user = Auth::check();
    print_r($auth);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>

    <div class="container" id="warp">

            <h1 class="h3 mb-3">
                <?= $user->name?>
                <span class="text-muted">(<?= $user->role?>)</span>
            </h1>

            <?php if(isset($_GET["error"])) : ?>
                <div class="alert alert-warning">
                    Cannot upload this file
                </div>
            <?php endif ?>

            <?php if($user->photo) : ?>
                    <img src="actions/photos/<?= $user->photo ?>" 
                    alt="Profile Photo"
                    class="img-thumbnail" width="200px">
            <?php endif ?>

            <form action="actions/upload.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="photo">
                    <button class="btn btn-primary">Upload</button>
                </div>
            </form>

        <ul class="list-group mb-3">
            <li class="list-group-item">
                <b>Email:</b> <?= $user->email?>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <?= $user->phone?>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <?= $user->address?>
            </li>
        </ul>

        <a href="admin.php" class="btn btn-success btn-lg">Manage User</a>
        <a href="actions/logout.php" class="btn btn-danger btn-lg">Logout</a>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>