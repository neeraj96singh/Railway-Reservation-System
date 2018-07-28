<!DOCTYPE html>
<?php
require 'common.php';
?>
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
                    <p class="text-warning" style="text-align: center"><h2>Passengers opted for Cabs</h2></p>
                <?php
                $query="select cabID, Name, City, Contact, Type, Date, Time FROM cab inner join signup on cab.User_ID=signup.User_ID order by City";
                $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
                $numrows= mysqli_num_rows($query_result);
                if($numrows==0)
                {
                    echo "No Users Found";
                }
                else
                {   ?>
                    <table class="table">
                <thead>
                    <tr>
                        <th>Cab ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Contact</th>
                        <th>Type of Cab</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead><?php
                while ($row= mysqli_fetch_array($query_result))
                    {?>
                        <tbody>
                            <tr>  
                                <td><?php echo $row['cabID']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['City']; ?></td>
                                <td><?php echo $row['Contact']; ?></td>
                                <td><?php echo $row['Type']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['Time']; ?></td>
                          <?php }?>
                        </tbody>
                    <?php } ?>
                        
            </table>
                
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