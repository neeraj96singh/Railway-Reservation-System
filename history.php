<!DOCTYPE html>
<?php
require 'common.php';
$name2=$_SESSION['name'];
$name1 = implode(" ", $name2);
$name = explode(" ",$name1)[0];
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
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center"><h1>Railway Management System</h1></div>
                <div class="panel-body">
                    <p class="text-warning" style="text-align: center"><h2>Booked Trains</h2></p>
                    <table class="table">
                <thead>
                    <tr>
                        <th>PNR</th>
                        <th>Name</th>
                        <th>Train No</th>
                        <th>Train Name</th>
                        <th>Boarding Station</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>No of Seats</th>
                        <th>Price</th>
                        <th>Cab</th>
                    </tr>
                </thead>
                <?php
                $query="select Name, PNR, reservation.Train_no, Train_name, Source, Destination, Cab, Date, passengers FROM reservation inner join trains on reservation.Train_no=trains.Train_no where reservation.Name='$name' order by Date";
                $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
                $numrows= mysqli_num_rows($query_result);
                if($numrows==0)
                {
                    echo "No Bookings Found";
                }
                else
                {   
                while ($row= mysqli_fetch_array($query_result))
                    {?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['PNR']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Train_no']; ?></td>
                                <td><?php echo $row['Train_name']; ?></td>
                                <td><?php echo $row['Source']; ?></td>
                                <td><?php echo $row['Destination']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                                <td><?php echo $row['passengers']; ?></td>
                                <td><?php echo $row['passengers']*800; ?></td>
                                <td><?php echo $row['Cab']; ?></td>
                            </tr>
                          <?php }?>
                        </tbody>
                    <?php } ?>
                        
            </table>
                <a href="login_submit.php">Home</a>
                </div>
            </div>
            <a href="logout.php">Logout</a>
                </div>
    </body>
</html>