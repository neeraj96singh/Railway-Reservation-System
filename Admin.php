<!DOCTYPE html>
<html>
    <head>
        <title>Book Ticket</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="signup.css" type="text/css">
        <link rel="stylesheet" href="chat.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center"><h1>Railway Management System</h1></div>
                <div class="panel-body">
                    <p class="text-warning" style="text-align: center"><h2>Admin Panel</h2></p>
                <form method="post" action="admin_trains.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="train" name="TrainNumber" placeholder="Train Number" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Get Passenger in Train</button>
            </form>
                <form method="post" action="admin_cabs.php">
                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Customers Opted for Cabs</button>
            </form>
        </div>
                
            </div>
        </div>
        <?php
            include 'chat.php';
        ?>
    </body>
</html>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    displayFromDatabase();
    setInterval(displayFromDatabase(), 1);
        $("#btn-chat").click(function(){
            var message=$("#btn-input").val();
            $.ajax({
              url: "adminajax.php",
              type: "POST",
              async: false,
              data: {
                  "done" : 1,
                  "messages" : message
              },
              success: function(data){
                  displayFromDatabase();
                  $("#btn-input").val('');
              }
            });
        });
        setInterval(function(){
            $('display_area').load(displayFromDatabase()).fadeIn("slow");
        }, 1000);
    });
    function displayFromDatabase(){
        $.ajax({
            url: "adminajax.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(d){
                $("#display_area").html(d);
            }
        });
    }
    </script>