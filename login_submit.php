<!DOCTYPE html>
<html>
    <head>
        <title>Booked Ticket</title>
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
                    <p class="text-warning" style="text-align: center"><h2>Book Ticket</h2></p>
            <form method="post" action="trains.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="Source" name="Source" placeholder="Source" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Destination" name="Destination" placeholder="Destination" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="date" name="date" placeholder="date(dd/mm/yyyy)" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="pass" name="pass" placeholder="No of Passengers" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
                <br>
            </form>
        </div>
                <div class="panel-footer">View Booked Ticket <a href="history.php">here</a></div>
            </div>
            <a href="logout.php">Logout</a>
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
              url: "ajax.php",
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
            url: "ajax.php",
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