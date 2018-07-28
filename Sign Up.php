<!DOCTYPE html>
<html>
    <head>
        <title>Sign UP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="signup.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center"><h1>Railway Management System</h1></div>
                <div class="panel-body">
                    <p class="text-warning" style="text-align: center"><h2>Sign UP</h2></p>
            <form method="post" action="signup_submit.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="id" name="id" placeholder="User ID" pattern=".{6}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password (Minimum 6 characters)" pattern=".{6,}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Age" name="Age" placeholder="Age" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
            </div>
        </div>
    </body>
</html>
