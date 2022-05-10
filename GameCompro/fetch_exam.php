<?php
include('server.php');

$id=$_POST['id'];
$query="SELECT * FROM question WHERE Q_ID = $id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
echo json_encode($row);
?>