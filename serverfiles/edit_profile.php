<?php

include("db_connection.php");
$id= $_SESSION['Auth_id'];

$ok = false;
$messages = array();

$name = isset($_POST['name']) ? $_POST['name'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
$last_donation = isset($_POST['last_donation']) ? $_POST['last_donation'] : '';
$b_group = strtoupper(isset($_POST['b_group']) ? $_POST['b_group'] : '');

$conn=OpenCon();

$sql_select=mysqli_query($conn,"SELECT * FROM `profiles` WHERE id='".$id."'");
$select_row= mysqli_fetch_assoc($sql_select);
if($select_row){

    $sql="UPDATE `profiles` SET `name`='$name',`b_group`='$b_group',`dob`='$dob',`last_donation`='$last_donation',`phone`='$phone' WHERE id='$id'";
    $getResult = mysqli_query($conn,$sql);
    header("location: ../profile/myprofile.php");

}else{

    $sql="INSERT INTO `profiles`(`id`, `name`, `b_group`, `dob`, `last_donation`, `phone`) VALUES ('$id','$name','$b_group','$dob','$last_donation','$phone');";
    $result = mysqli_query($conn, $sql);
    header("location: ../profile/myprofile.php");
}


?>