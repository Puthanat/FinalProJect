<?php
include('connection.php');


$whereField = $_POST['whereField'];
$whereCondition = $_POST['whereCondition'];



$sql = "delete from question where".$whereField."='".$whereCondition."'";
$result = mysqli_query($connect, $sql);


?>