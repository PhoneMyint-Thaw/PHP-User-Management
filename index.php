<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        #warp{
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>
<body class="text-center">

    <div class="container" id="warp">

        <h1 class="h3 mb-4">Log in</h1>

        <?php if(isset($_GET['register'])) : ?>
            <div class="alert alert-warning">
                Accunt created. Please login.
            </div>
        <?php endif ?>

        <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                You can't Create account.
            </div>
        <?php endif ?>

        <?php if(isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password.
            </div>
        <?php endif ?>

        <?php if(isset($_GET['suspended'])) : ?>
            <div class="alert alert-warning">
                Your account suspended.
            </div>
        <?php endif ?>
        
        <form action="actions/login.php" method="post">

            <input type="email"
                name="email"
                class="form-control mb-3" 
                placeholder="email"
                required>

                <input type="password"
                name="password"
                class="form-control mb-3" 
                placeholder="password"
                required>
            
                <button class="btn btn-lg btn-primary w-100 mb-3">Sign in</button>

        </form>

        <a href="register.php">Register</a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>