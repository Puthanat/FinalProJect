<?php
include('server.php');

$id  = $_POST['id'];
$id2 = $_POST['id1'];
$id3 = $_POST['id2'];

$query = "SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = $id3";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
echo json_encode($row);
?>