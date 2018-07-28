<?php
require 'common.php';
$name = mysqli_real_escape_string($con,$_POST['name']);
$id = mysqli_real_escape_string($con,$_POST['id']);
$pwd = mysqli_real_escape_string($con,$_POST['password']);
$contact = mysqli_real_escape_string($con,$_POST['contact']);
$age = mysqli_real_escape_string($con,$_POST['Age']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$check="SELECT User_ID  FROM signup WHERE User_ID = 'id'";
$check_submit= mysqli_query($con, $check) or die(mysqli_error($con));
$check_row= mysqli_num_rows($check_submit);
if($check_row>=1)
{
    $message = "User already exists.";
    echo "<script type='text/javascript'>alert('$message'); window.location='Sign UP.php';</script>";
}
else
{
    $user_registration_query = "insert into signup(Name, User_ID, Password, Contact, Age, Address) values ('$name', '$id', '$pwd', '$contact', '$age', '$address')";
    $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    $message = "User registered successfully.";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}
?>