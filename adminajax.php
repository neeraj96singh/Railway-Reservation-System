<?php
require 'common.php';
if(isset($_POST['done'])){
    $message= mysqli_real_escape_string($con, $_POST['messages']);
    $query = "insert into messages(u_email, sender, message) values ('nskrsk', 'admin', '$message')";
    $submit = mysqli_query($con, $query) or die(mysqli_error($con));
    exit();
}
if(isset($_POST['display'])){
                ?>
                
                    <ul class="chat">
                <?php
                $query = "select sender, message from messages where u_email='nskrsk' order by no";
                $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
                $numrows= mysqli_num_rows($query_result);
                if($numrows==0)
                {
                    echo "Send Message to Start.";
                }
                else
                {    
                while ($row= mysqli_fetch_array($query_result))
                    { if(strcmp($row['sender'], "admin")==0) {?>  
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/55C1E7/fff&text=A" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="pull-right primary-font">Admin</strong>
                                </div><br>
                                <p style="text-align:right">
                                    <?php echo $row['message'];?>
                                </p>
                            </div>
                        </li>
                    <?php } 
                    else {?>
                            <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/FA6F57/fff&text=US" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">User</strong>
                                </div>
                                <p>
                                    <?php echo $row['message'];?>
                                </p>
                            </div>
                        </li>
                     <?php }
} } }
                     ?>
                        </ul>
<?php}