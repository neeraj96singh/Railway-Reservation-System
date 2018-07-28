<?php
require 'common.php';
$id = mysqli_real_escape_string($con, $_POST['id']);
$pwd = mysqli_real_escape_string($con, ($_POST['password']));
if($id=="admin")
{
    header('location: Admin.php');    
}
 else {
$login_query="SELECT User_ID  FROM `signup` WHERE `User_ID` = '$id' AND `Password` = '$pwd'";
$check_query= mysqli_query($con, $login_query) or die (mysqli_error($con));
$check_row= mysqli_num_rows($check_query);
if($check_row>=1)
{
    $query1="SELECT Name FROM `signup` WHERE `User_ID` ='$id'";
    $check_query1= mysqli_query($con, $query1) or die (mysqli_error($con));
    $name = mysqli_fetch_array($check_query1);
    $row= mysqli_fetch_array($check_query);
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    header('location: login_submit.php');
}
else
{
    $message = "Incorrect email or password.";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}
 }
?>