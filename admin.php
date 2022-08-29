<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$all = $table->getAll();

// echo"<pre>";
// die(var_dump($all));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <div style = "float: right">
            <a href="profile.php" class="btn btn-primary">Profile</a> 
            <a href="actions/logout.php" class="btn btn-danger">Logout</a>
        </div>

        <h1 class="h3 mt-5 mb-5">
           Mansgr user
           <small class="badge text-white bg-danger"><?=count($all) ?></small>
        </h1>

        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php foreach($all as $user) : ?>
                <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->phone ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->address ?></td>
                    <td>
                       <?php if($user->value === 1) :?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>
                        <?php elseif($user->value === 2): ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>
                        <?php else :?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if($auth->value >1) : ?>
                            <div class="btn-group">
                                <a href="#" class="btn btn-outline-success dropdown-toggle"
                                data-bs-toggle="dropdown">
                                    Change Role
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <a href="actions/role.php?id=<?=$user->id?>&role=1" class="dropdown-item">User</a>
                                    <a href="actions/role.php?id=<?=$user->id?>&role=2" class="dropdown-item">Manager</a>
                                    <a href="actions/role.php?id=<?=$user->id?>&role=3" class="dropdown-item">Admin</a>
                                </div>
                               <?php if($user->suspended) :?>
                                    <a href="actions/suspended.php?id=<?= $user->id ?>" class="btn btn-outline-secondary">
                                    Suspended
                                    </a>
                                <?php else :?>
                                    <a href="actions/suspended.php?id=<?= $user->id ?>&suspended=1" class="btn btn-outline-primary">
                                        Active
                                    </a>
                                <?php endif ?>
                               <?php if($user->id !== $auth->id) :?>
                                    <a href="actions/delete.php?id=<?= $user->id?>" class="btn btn-outline-danger">
                                    Delete
                                    </a>
                                <?php endif?>
                            </div>
                        <?php endif?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>