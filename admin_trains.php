<!DOCTYPE html>
<?php
require 'common.php';
$train_no=mysqli_real_escape_string($con, $_POST['TrainNumber']);
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
                    <p class="text-warning" style="text-align: center"><h2>Passengers in Train <?php echo $_POST['TrainNumber']?></h2></p>
                <?php
                $query="select Name, PNR, Source, Destination, Train_name, Date, passengers FROM reservation inner join trains on reservation.Train_no=trains.Train_no where reservation.Train_no='$train_no' order by Date";
                $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
                $numrows= mysqli_num_rows($query_result);
                $query1="select Contact, Age from signup inner join reservation on signup.User_ID=reservation.User_ID";
                $query_result1= mysqli_query($con, $query1) or die(mysqli_error($con));
                $numrows1= mysqli_num_rows($query_result1);
                $row1= mysqli_fetch_array($query_result1);
                if($numrows==0)
                {
                    echo "No Bookings Found";
                }
                else
                {   ?>
                    <table class="table">
                <thead>
                    <tr>
                        <th>PNR</th>
                        <th>Name</th>
                        <th>Train Name</th>
                        <th>Boarding Station</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>No of seats</th>
                        <th>Price</th>
                        <th>Contact No</th>
                        <th>Age</th>
                    </tr>
                </thead><?php
                while ($row= mysqli_fetch_array($query_result))
                    {?>
                        <tbody>
                            <tr>  
                                <td><?php echo $row['PNR']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Train_name']; ?></td>
                                <td><?php echo $row['Source']; ?></td>
                                <td><?php echo $row['Destination']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['passengers']; ?></td>
                                <td><?php echo $row['passengers']*800; ?></td>
                                <td><?php echo $row1['Contact']; ?></td>
                                <td><?php echo $row1['Age']; ?></td>
                            </tr>
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