<?php
require 'common.php';
$source = mysqli_real_escape_string($con,$_POST['Source']);
$destination = mysqli_real_escape_string($con,$_POST['Destination']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
?>
<html>
    <head>
        <title>Trains</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="signup.css" type="text/css">
        <link rel="stylesheet" href="chat.css" type="text/css">
    </head>
    <body>
        <form method="post" action="trains_submit.php">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center"><h1>Railway Management System</h1></div>
                <div class="panel-body">
                    <p class="text-warning" style="text-align: center"><h2>Trains</h2></p>
                    <table class="table">
                <thead>
                    <tr>
                        <th>Train No</th>
                        <th>Train Name</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Distance</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Seats Available</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php
                $query="select Train_no, Train_name, Source, Destination, Distance, Departure, Arrival, seats FROM trains where Source='$source' and Destination='$destination'";
                $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
                $numrows= mysqli_num_rows($query_result);
                if($numrows==0)
                {
                    echo "No Trains Found";
                }
                else
                {
                    ?><form action="">
                <?php    
                while ($row= mysqli_fetch_array($query_result))
                    {?>
                        <tbody>
                            <tr>  
                                <td><?php if($row['seats']>=$pass)
                                {?>
                                    <input type="radio" name="trname" value="<?php echo $row['Train_no']." ".$date." ".$pass?>">
                                <?php }?>
                                <?php echo $row['Train_no']; ?></td>
                                <td><?php echo $row['Train_name']; ?></td>
                                <td><?php echo $row['Source']; ?></td>
                                <td><?php echo $row['Destination']; ?></td>
                                <td><?php echo $row['Distance']; ?></td>
                                <td><?php echo $row['Departure']; ?></td>
                                <td><?php echo $row['Arrival']; ?></td>
                                <td><?php echo $row['seats']; ?></td>
                                <td><?php echo $pass*800;?></td>
                            </tr>
                <?php }?>
                        </tbody>
                        </form>
                <?php } ?>
            </table>
                <p class="text-warning" style="text-align: center"><h2>Want a Cab?</h2></p>
                    <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Base Fare</th>
                        <th>Rate</th>
                        <th>Date</th>
                    </tr>
                </thead>
                        <tbody>
                            <tr>
                                <td><input type="radio" name="type" value="Micro">Micro</td>
                                <td>&#x20B9; 40</td>
                                <td>&#x20B9; 7/km</td>
                                <td><?php echo $date ?></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="Mini">Mini</td>
                                <td>&#x20B9; 55</td>
                                <td>&#x20B9; 9/km</td>
                                <td><?php echo $date ?></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="Sedan">Sedan</td>
                                <td>&#x20B9; 65</td>
                                <td>&#x20B9; 11/km</td>
                                <td><?php echo $date ?></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="No Cabs">No Cabs. Thank You!!</td>
                            </tr>
                        </tbody>
            </table>
                <p class="text-warning" style="text-align: center"><h2>Choose Payment Option</h2></p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><input type="radio" name="pay" value="Credit Card">&nbsp;&nbsp;Credit Card</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="pay" value="Debit Card">&nbsp;&nbsp;Debit Card</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="pay" value="Net Banking">&nbsp;&nbsp;Net Banking</td>
                            </tr>
                        </tbody>
            </table>
                <button type="submit" class="btn btn-primary">Book Ticket</button>
                </div>
            </div>
        </div>
            <a href="logout.php">Logout</a>
        </form>
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