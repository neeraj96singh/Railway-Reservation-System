<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center"><h1>Railway Management System</h1></div>
                <div class="panel-body">
                    <p class="text-warning" style="text-align: center"><h2>Login to your account</h2></p>
                    <form method="post" action="login_check.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" placeholder="User ID" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" pattern=".{6,}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="panel-footer">Don't have an account? Register <a href="Sign Up.php">here</a></div>
            </div>
        </div>
    </body>
</html>
