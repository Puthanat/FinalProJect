<?php
include('server.php');

$id=$_POST['id'];
$query="SELECT * FROM checkpoint WHERE Ch_Chapter = $id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
echo json_encode($row);
?>