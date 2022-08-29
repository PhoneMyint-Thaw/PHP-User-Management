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

        <h1 class="h3 mb-4">Register</h1>
        <form action="actions/create.php" method="post">
            <input type="text"
                name="name"
                class="form-control mb-3"
                placeholder="name"
                required>

                <input type="email"
                name="email"
                class="form-control mb-3"
                placeholder="email"
                required>

                <input type="text"
                name="phone"
                class="form-control mb-3"
                placeholder="phone"
                required>

                <textarea name="address" 
                    class="form-control mb-3"
                    placeholder="address"
                    required></textarea>
                
                <input type="password"
                    name="password"
                    class="form-control mb-3"
                    placeholder="password"
                    required>
                
                <button type="submmit" class="btn btn-lg btn-primary w-100 mb-2">Register</button>
        </form>

        <a href="index.php">Login</a>
    </div>
    

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>